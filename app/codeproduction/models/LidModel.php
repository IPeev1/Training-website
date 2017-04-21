<?php

namespace codeproduction\models;

use \php\models\AbstractModel as AbstractModel;

class LidModel extends AbstractModel {
    public function __construct($control, $action){
        parent::__construct($control, $action);
    }

    public function updateGebruiker()
    {
        $login = filter_input(INPUT_POST, 'usn');
        $password = filter_input(INPUT_POST, 'ww');
        $fname = filter_input(INPUT_POST, 'voornaam');
        $pname = filter_input(INPUT_POST, 'tussenvoegsel');
        $lastname = filter_input(INPUT_POST, 'achternaam');
        $dateofbirth = filter_input(INPUT_POST, 'geboortedatum');
        $gender = filter_input(INPUT_POST, 'formGender');
        $email = filter_input(INPUT_POST, 'email');
        $hire_date = filter_input(INPUT_POST, 'fwd');
        $street = filter_input(INPUT_POST, 'straat');
        $postalcode = filter_input(INPUT_POST, 'postcode');
        $place = filter_input(INPUT_POST, 'stad');
        /*$role = filter_input(INPUT_POST, 'rol');*/

        $sql = " UPDATE `persons` SET `loginname` =:login,
                                    password=:password,
                                    firstname=:fname,
                                    preprovision=:pname,
                                    lastname=:lastname,
                                    dateofbirth=:dateofbirth,
                                    gender=:gender,
                                    emailaddress=:email,
                                    hire_date=:hire_date,
                                    street=:street,
                                    postal_code=:postalcode,
                                    place=:place

                               WHERE `persons`.`id` = :id";
        $stmnt = $this->dbh->prepare($sql);
        $gebruiker = $this->getGebruiker();
        $id=$gebruiker->getId();
        $stmnt->bindParam(':id', $id);
        $stmnt->bindParam(':login', $login);
        $stmnt->bindParam(':password', $password);
        $stmnt->bindParam(':fname', $fname);
        $stmnt->bindParam(':pname', $pname);
        $stmnt->bindParam(':lastname', $lastname);
        $stmnt->bindParam(':dateofbirth', $dateofbirth);
        $stmnt->bindParam(':gender', $gender);
        $stmnt->bindParam(':email', $email);
        $stmnt->bindParam(':hire_date', $hire_date);
        $stmnt->bindParam(':street', $street);
        $stmnt->bindParam(':postalcode', $postalcode);
        $stmnt->bindParam(':place', $place);
        /*$stmnt->bindParam(':role',$role);*/

        try {
            $stmnt->execute();
        } catch (\PDOEXception $e) {
            echo "<pre>";
            echo $e;
            return REQUEST_FAILURE_DATA_INVALID;
            echo "</pre>";
        }

    }

    public function getOverzicht()
    {
      $sql='SELECT DATE_FORMAT(lessons.date, "%Y-%m-%d") as `date`,
                  lessons.time,
                  lessons.max_persons as`max_persons`,
                  lessons.training_id as `training_id`
                  trainings.description,
                  trainings.duration,
                  trainings.extra_costs,
                  registrations.member_id,
                  COUNT(lesson.id) as `aanmeldingen`
             FROM `lessons`
             JOIN trainings on lessons.training_id = trainings.id
             JOIN registrations on lessons.id = registrations.lesson_id
             GROUP BY lessons.id
             WHERE registrations.member_id= :id
             AND `lessons`.datum > CURDATE()';

       $gebruiker = $this->getGebruiker();
       $id=$gebruiker->getId();

       $stmnt = $this->dbh->prepare($sql);
       $stmnt->bindParam(':id',$id );
       $stmnt->execute();
       $getOverzicht = $stmnt->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Lesson');
       return $getOverzicht;
    }

    public function getRegistraties() {
      $id = $this->getGebruiker()->getId();
      $stmnt = $this->dbh->prepare("
        SELECT DATE_FORMAT(l.date, '%Y-%m-%d') as 'date', DATE_FORMAT(l.time, '%H:%i') as 'time', l.max_persons as 'max_persons', l.training_id as 'training_id', t.description as 'description',
        t.duration as 'duration', t.extra_costs as 'extra_costs', r.member_id as 'member_id'
        FROM registrations r
        INNER JOIN lessons l ON r.lesson_id = l.id
        INNER JOIN trainings t ON l.training_id = t.id
        WHERE member_id = :id;
      ");
      $stmnt->bindParam(':id', $id);
      $stmnt->execute();
      return $stmnt->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__.'\db\Lesson');
    }

    public function verwijderLes(){
        $id= filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

        if($id===null) {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }
        if($id===false) {
            return REQUEST_FAILURE_DATA_INVALID;
        }

        $sql= "DELETE FROM lessons WHERE id=:id";
        $stmnt= $this->dbh->prepare($sql);
        $stmnt->bindParam(':id',$id);
        $stmnt->execute();
    }

    public function getGebruikerById(){
        $gebruiker = $this->getGebruiker();
        $id=$gebruiker->getId();

        /*$id= filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);*/

        $sql= "SELECT * FROM persons WHERE id=:id";
        $sth= $this->dbh->prepare($sql);
        $sth->bindParam(':id',$id);
        $sth->execute();
        $gebruiker = $sth->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Persoon');
        return  $gebruiker[0];
    }

    public function islesaangemeld(){
        $gebruiker = $this->getGebruiker();
        $id=$gebruiker->getId();

        /*$id= filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);*/

        $sql= "SELECT * FROM `registrations` WHERE `lesson_id`=:id";
        $sth= $this->dbh->prepare($sql);
        $sth->bindParam(':id',$id);
        $sth->execute();
        $gebruiker = $sth->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Registration');
        return  $gebruiker[0];
    }
    public function lessonOverzicht(){
        $sql = "SELECT lessons.id, COUNT(lessons.id)AS  'aantalaangemeld', lessons.date,
                        lessons.location, lessons.max_persons,
                        trainings.description, trainings.duration,
                        trainings.extra_costs
                FROM `lessons`
                JOIN trainings on lessons.training_id = trainings.id
                RIGHT JOIN registrations on lessons.id = registrations.lesson_id
                GROUP BY lessons.id";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return  $sth->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Lesson');
    }

    public function deelnemerAanmelden(){
        $lesid  = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
        $id = $this->getGebruiker()->getId();
        if($lesid===null)
        {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }
        if($lesid===false)
        {
            return REQUEST_FAILURE_DATA_INVALID;
        }

        $sql="INSERT INTO `registrations` ( `member_id`, `lesson_id`)
              VALUES (:id, :lesid)";

        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':id', $id);
        $stmnt->bindParam(':lesid', $lesid);


        try {
            $stmnt->execute();
        } catch (\PDOEXception $e) {
            echo "<pre>";
            echo $e;
            return REQUEST_FAILURE_DATA_INVALID;
            echo "</pre>";
        }

    }
}
