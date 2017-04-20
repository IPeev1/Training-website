<?php
namespace codeproduction\models;

use \php\models\AbstractModel as AbstractModel;

class BezoekerModel extends  AbstractModel{
   public function __construct($control, $action){
        parent::__construct($control, $action);
    }

    public function controleerInloggen(){
        $usn=   filter_input(INPUT_POST,'usn');
        $ww=    filter_input(INPUT_POST,'ww');

        if( ($usn!==null) && ($ww!==null) ){
            $sql= "SELECT * FROM persons WHERE loginname = :usn AND password = :ww";
            $sth = $this->dbh->prepare($sql);
            $sth->bindParam(':usn',$usn);
            $sth->bindParam(':ww',$ww);
            $sth->execute();
            $result = $sth->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Persoon');

            if(count($result)===1){
                $this->startSession();
                $_SESSION['gebruiker']=$result[0];
                return REQUEST_SUCCESS;
            }
            return REQUEST_FAILURE_DATA_INVALID;
        }
        return REQUEST_FAILURE_DATA_INCOMPLETE;
    }

    public function registreren()
    {
       $loginname= filter_input(INPUT_POST, 'loginname');
       $password= filter_input(INPUT_POST, 'password');
       $password2= filter_input(INPUT_POST,'password2');
       $firstname= filter_input(INPUT_POST, 'firstname');
       $preprovision=filter_input(INPUT_POST, 'preprovision');
       $lastname=filter_input(INPUT_POST, 'lastname');
       $gender=filter_input(INPUT_POST, 'gender');
       $dateofbirth=filter_input(INPUT_POST,'dateofbirth');
       $email=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
       $street=filter_input(INPUT_POST,'street');
       $postalcode=filter_input(INPUT_POST,'postalcode');
      /* $place=filter_input(INPUT_POST,'place');*/

       if($firstname===null || $password===null ||  $password2===null || $lastname===null || $gender===null ||$dateofbirth===null ||$email===null){
         return REQUEST_FAILURE_DATA_INCOMPLETE;
       }

       if(empty($firstname) || empty($password) ||  empty($password2) || empty($lastname) || empty($gender) ||empty($dateofbirth) ||empty($email)){
         return REQUEST_FAILURE_DATA_INCOMPLETE;
       }

       if($_POST['password']!==$_POST['password2'])
       {
           return REQUEST_FAILURE_DATA_INVALID;
       }

       $sql=   "INSERT INTO `persons`  (loginname,firstname,password,preprovision,lastname,dateofbirth,gender,emailaddress,postal_code,street,role)
       VALUES (:loginname,:firstname,:password,:preprovision,:lastname,:dateofbirth,:gender,:email,:postalcode,:street,'lid') ";

       $stmnt = $this->dbh->prepare($sql);
       $stmnt->bindParam(':loginname', $loginname);
       $stmnt->bindParam(':firstname', $firstname);
       $stmnt->bindParam(':password', $password);
       $stmnt->bindParam(':lastname', $lastname);
       $stmnt->bindParam(':preprovision', $preprovision);
       $stmnt->bindParam(':gender', $gender);
       $stmnt->bindParam(':dateofbirth', $dateofbirth);
       $stmnt->bindParam(':street', $street);
       $stmnt->bindParam(':email', $email);
       $stmnt->bindParam(':postalcode', $postalcode);
      /* $stmnt->bindParam(':place', $place);*/

       try{
         $stmnt->execute();
       }
       catch(\PDOEXception $e){
         echo $e;
         return REQUEST_FAILURE_DATA_INVALID;
       }

       $aantalGewijzigd = $stmnt->rowCount();
       if($aantalGewijzigd===1){
         return REQUEST_SUCCESS;
       }
       return REQUEST_NOTHING_CHANGED;
    }


}
