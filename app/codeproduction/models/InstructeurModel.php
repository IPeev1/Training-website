<?php
/**
 * Created by PhpStorm.
 * User: sanjay
 * Date: 30-3-2017
 * Time: 12:27
 */

namespace codeproduction\models;

use \php\models\AbstractModel as AbstractModel;

class InstructeurModel extends AbstractModel {
    public function __construct($control, $action){
        parent::__construct($control, $action);
    }
    public function getGebruikers(){
        $sql= "SELECT * FROM persons WHERE role='instructeur'";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return  $sth->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Persoon');
    }

    public function getGebruikerById(){
        $id= filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

        $sql= "SELECT * FROM persons WHERE id=:id";
        $sth= $this->dbh->prepare($sql);
        $sth->bindParam(':id',$id);
        $sth->execute();
        $gebruiker = $sth->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Persoon');
        return  $gebruiker[0];
    }

    public function getLesById(){
        $id= filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

        $sql="SELECT * FROM lessons WHERE id=:id";
        $sth= $this->dbh->prepare($sql);
        $sth->bindParam(':id',$id);
        $sth->execute();
        $les = $sth->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Lesson');
        return  $les[0];
    }

    public function getTraining(){
        $sql="SELECT * FROM trainings";
        $sth= $this->dbh->prepare($sql);
        $sth->execute();
        $trainingnamen = $sth->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Training');
        return $trainingnamen;
    }

    public function verwijderGebruiker(){
        $id= filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

        if($id===null) {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }
        if($id===false) {
            return REQUEST_FAILURE_DATA_INVALID;
        }

        $sql= "DELETE FROM persons WHERE id=:id";
        $sth= $this->dbh->prepare($sql);
        $sth->bindParam(':id',$id);
        $sth->execute();
    }

    public function addGebruiker(){
        $login   = filter_input(INPUT_POST, 'usn');
        $password  = filter_input(INPUT_POST, 'ww');
        $fname = filter_input(INPUT_POST, 'voornaam');
        $pname = filter_input(INPUT_POST, 'tussenvoegsel');
        $lastname = filter_input(INPUT_POST, 'achternaam');
        $dateofbirth  = filter_input(INPUT_POST, 'geboortedatum');
        $gender = filter_input(INPUT_POST, 'formGender');
        $email = filter_input(INPUT_POST, 'email');
        $hiredate = filter_input(INPUT_POST, 'fwd');
        $salary  = filter_input(INPUT_POST, 'salaris');
        $street = filter_input(INPUT_POST, 'straat');
        $postalcode = filter_input(INPUT_POST, 'postcode');
        $place = filter_input(INPUT_POST, 'stad');
        $role = filter_input(INPUT_POST, 'rol');

        $sql="INSERT INTO `persons` ( `loginname`, `password`, `firstname`, `preprovision`, `lastname`, `dateofbirth`, `gender`, `emailaddress`, `hire_date`, `salary`, `street`, `postal_code`, `place`, `role`)
                   VALUES ( :login, :password, :fname, :pname, :lastname, :dateofbirth, :gender, :email, :hiredate, :salary, :street, :postalcode, :place, :role)";

        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':login', $login);
        $stmnt->bindParam(':password', $password);
        $stmnt->bindParam(':fname', $fname);
        $stmnt->bindParam(':pname',$pname);
        $stmnt->bindParam(':lastname',$lastname);
        $stmnt->bindParam(':dateofbirth',$dateofbirth);
        $stmnt->bindParam(':gender',$gender);
        $stmnt->bindParam(':email',$email);
        $stmnt->bindParam(':hiredate',$hiredate);
        $stmnt->bindParam(':salary',$salary);
        $stmnt->bindParam(':street',$street);
        $stmnt->bindParam(':postalcode',$postalcode);
        $stmnt->bindParam(':place',$place);
        $stmnt->bindParam(':role',$role);

        $stmnt->execute();
       /* return  $stmnt->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Persoon');*/
    }

    public function updateGebruiker(){
        $id= filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

        $login   = filter_input(INPUT_POST, 'usn');
        $password  = filter_input(INPUT_POST, 'ww');
        $fname = filter_input(INPUT_POST, 'voornaam');
        $pname = filter_input(INPUT_POST, 'tussenvoegsel');
        $lastname = filter_input(INPUT_POST, 'achternaam');
        $dateofbirth  = filter_input(INPUT_POST, 'geboortedatum');
        $gender = filter_input(INPUT_POST, 'formGender');
        $email = filter_input(INPUT_POST, 'email');
        $hire_date = filter_input(INPUT_POST, 'fwd');
        $salary  = filter_input(INPUT_POST, 'salaris');
        $street = filter_input(INPUT_POST, 'straat');
        $postalcode = filter_input(INPUT_POST, 'postcode');
        $place = filter_input(INPUT_POST, 'stad');
        /*$role = filter_input(INPUT_POST, 'rol');*/

        $sql=" UPDATE `persons` SET `loginname` =:login,
                                    password=:password,
                                    firstname=:fname,
                                    preprovision=:pname,
                                    lastname=:lastname,
                                    dateofbirth=:dateofbirth,
                                    gender=:gender,
                                    emailaddress=:email,
                                    hire_date=:hire_date,
                                    salary=:salary,
                                    street=:street,
                                    postal_code=:postalcode,
                                    place=:place
                                    /*,role=:role*/
                               WHERE `persons`.`id` = :id";
        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':id',$id);
        $stmnt->bindParam(':login', $login);
        $stmnt->bindParam(':password', $password);
        $stmnt->bindParam(':fname', $fname);
        $stmnt->bindParam(':pname',$pname);
        $stmnt->bindParam(':lastname',$lastname);
        $stmnt->bindParam(':dateofbirth',$dateofbirth);
        $stmnt->bindParam(':gender',$gender);
        $stmnt->bindParam(':email',$email);
        $stmnt->bindParam(':hire_date',$hire_date);
        $stmnt->bindParam(':salary',$salary);
        $stmnt->bindParam(':street',$street);
        $stmnt->bindParam(':postalcode',$postalcode);
        $stmnt->bindParam(':place',$place);
        /*$stmnt->bindParam(':role',$role);*/

        try {
            $stmnt->execute();
        }
        catch(\PDOEXception $e) {
            echo "<pre>";
            echo $e;
            return REQUEST_FAILURE_DATA_INVALID;
            echo "</pre>";
        }
        $aantalGewijzigd = $stmnt->rowCount();
        if($aantalGewijzigd===1) {
            return REQUEST_SUCCESS;
        }
        return REQUEST_NOTHING_CHANGED;
    }

    public function lessonOverzicht(){
        $sql = "SELECT  lessons.id,
                        DATE_FORMAT(lessons.date, '%Y-%m-%d') as `date`,
                        DATE_FORMAT(lessons.time,'%H:%i') as `time`,
                        lessons.location,
                        lessons.max_persons,
                        trainings.description, trainings.duration,
                        trainings.extra_costs,
                        registrations.member_id,
                COUNT(lessons.id) AS 'aanmeldingen'
                FROM `lessons` 
                join trainings on lessons.training_id = trainings.id 
                LEFT JOIN registrations on lessons.id = registrations.lesson_id 
                GROUP BY lessons.id";
      
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return  $sth->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Lesson');
    }

    public function  updateles(){
        $id= filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

        $datum  = filter_input(INPUT_POST, 'datum');
        $tijd   = filter_input(INPUT_POST, 'time');
        $tipe   = filter_input(INPUT_POST, 'tipe');
        $maximum= filter_input(INPUT_POST, 'maximum');

        $sql=  "UPDATE lessons
                SET `date`=:datum,`time`=:tijd, max_persons=:maximum, training_id=:tipe
                WHERE id=:id";

        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':id',$id);
        $stmnt->bindParam(':datum', $datum);
        $stmnt->bindParam(':tijd', $tijd);
        $stmnt->bindParam(':tipe', $tipe);
        $stmnt->bindParam(':maximum',$maximum);

        try {
            $stmnt->execute();
        }
        catch(\PDOEXception $e) {
            echo "<pre>";
            echo $e;
            return REQUEST_FAILURE_DATA_INVALID;
            echo "</pre>";
        }

        $aantalGewijzigd = $stmnt->rowCount();
        if($aantalGewijzigd===1) {
            return REQUEST_SUCCESS;
        }
        return REQUEST_NOTHING_CHANGED;
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
        $sth= $this->dbh->prepare($sql);
        $sth->bindParam(':id',$id);
        $sth->execute();
    }

    public function  getAlleDeelnemers(){
        $id= filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

              $sql="SELECT    lessons.id AS 'lessonid',
                        persons.firstname AS 'firstname',
                        persons.preprovision AS 'preprovision',
                        persons.lastname AS 'lastname',
                        trainings.description AS 'trainingsnaam'
                        FROM `lessons`
                        join registrations on registrations.lesson_id = lessons.id
                        join persons on registrations.member_id = persons.id
                        JOIN trainings on lessons.training_id = trainings.id
                        WHERE lessons.id=:id";
        $sth= $this->dbh->prepare($sql);
        $sth->bindParam(':id',$id);
        $sth->execute();
        $deelnemers = $sth->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Lesson');
        return $deelnemers;
    }

    public function addles(){
        $datum      = filter_input(INPUT_POST, 'datum');
        $tijd       = filter_input(INPUT_POST,'time');
        $location   = filter_input(INPUT_POST, 'location');
        $maximum    = filter_input(INPUT_POST, 'maximum');
        $tipe       = filter_input(INPUT_POST, 'tipe');
        $instructeur= filter_input(INPUT_POST,  'instructeur');

        $sql="  INSERT INTO `lessons` (`id`, `time`, `date`, `location`, `max_persons`, `training_id`, `instructor_id`)
                VALUES (NULL, :tijd, :datum, :locatie, :maximum, :tipe, :instructeur);";

        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':tijd', $tijd);
        $stmnt->bindParam(':datum', $datum);
        $stmnt->bindParam(':locatie', $location);
        $stmnt->bindParam(':maximum',$maximum);
        $stmnt->bindParam(':tipe', $tipe);
        $stmnt->bindParam(':instructeur',$instructeur);

        try {
            $stmnt->execute();
        }
        catch(\PDOEXception $e) {
            echo "<pre>";
            echo $e;
            return REQUEST_FAILURE_DATA_INVALID;
            echo "</pre>";
        }

        $aantalGewijzigd = $stmnt->rowCount();
        if($aantalGewijzigd===1) {
            return REQUEST_SUCCESS;
        }
        return REQUEST_NOTHING_CHANGED;

    }
}
