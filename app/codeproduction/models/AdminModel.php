<?php
namespace codeproduction\models;

use \php\models\AbstractModel as AbstractModel;

class AdminModel extends AbstractModel{
  public function __construct($control, $action){
    parent::__construct($control, $action);
  }

  public function getInstructeurs() {
    $stmnt = $this->dbh->prepare("
      SELECT *
      FROM persons
      WHERE role = 'instructeur';
    ");
    $stmnt->execute();
    return $stmnt->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__.'\db\Persoon');
  }

  public function getLeden() {
    $stmnt = $this->dbh->prepare("
      SELECT *
      FROM persons
      WHERE role = 'lid';
    ");
    $stmnt->execute();
    return $stmnt->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__.'\db\Persoon');
  }

  public function verwijderGebruiker() {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $stmnt = $this->dbh->prepare("
      DELETE FROM persons
      WHERE id = :id;
    ");
    $stmnt->bindParam(':id', $id);
    $stmnt->execute();
  }

  public function instToevoegen() {
    $vn = filter_input(INPUT_POST, 'vn');
    $tv = filter_input(INPUT_POST, 'tv');
    $an = filter_input(INPUT_POST, 'an');
    $gbd = filter_input(INPUT_POST, 'gbd');
    $em = filter_input(INPUT_POST, 'em');
    $ad = filter_input(INPUT_POST, 'ad');
    $gs = filter_input(INPUT_POST, 'gs');
    $sl = filter_input(INPUT_POST, 'sl');
    $st = filter_input(INPUT_POST, 'st');
    $pc = filter_input(INPUT_POST, 'pc');
    $pl = filter_input(INPUT_POST, 'pl');
    $gbr = filter_input(INPUT_POST, 'gbr');
    $ww = filter_input(INPUT_POST, 'ww');

    if ($vn === NULL || $tv === NULL || $an === NULL || $gbd === NULL || $em === NULL || $ad === NULL || $gs === NULL || $sl === NULL || $st === NULL || $pc === NULL || $pl === NULL || $gbr === NULL || $ww === null) {
      return REQUEST_FAILURE_DATA_INVALID;
    }

    $stmnt = $this->dbh->prepare("
      INSERT INTO persons (firstname, preprovision, lastname, dateofbirth, emailaddress, hire_date, gender, salary, street, postal_code, place, loginname, password, role) VALUES
      (:vn, :tv, :an, :gbd, :em, :ad, :gs, :sl, :st, :pc, :pl, :gbr, :ww, 'instructeur');
    ");
    $stmnt->bindParam(':vn', $vn);
    $stmnt->bindParam(':tv', $tv);
    $stmnt->bindParam(':an', $an);
    $stmnt->bindParam(':gbd', $gbd);
    $stmnt->bindParam(':em', $em);
    $stmnt->bindParam(':ad', $ad);
    $stmnt->bindParam(':gs', $gs);
    $stmnt->bindParam(':sl', $sl);
    $stmnt->bindParam(':st', $st);
    $stmnt->bindParam(':pc', $pc);
    $stmnt->bindParam(':pl', $pl);
    $stmnt->bindParam(':gbr', $gbr);
    $stmnt->bindParam(':ww', $ww);

    try {
      $stmnt->execute();
    }
    catch(\PDOEXception $e) {
        echo $e;
        return REQUEST_FAILURE_DATA_INVALID;
    }

    $aantalGewijzigd = $stmnt->rowCount();
    if($aantalGewijzigd===1) {
        return REQUEST_SUCCESS;
    }
    return REQUEST_NOTHING_CHANGED;
  }

  public function gebruikerWijzigen() {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $vn = filter_input(INPUT_POST, 'vn');
    $tv = filter_input(INPUT_POST, 'tv');
    $an = filter_input(INPUT_POST, 'an');
    $gbd = filter_input(INPUT_POST, 'gbd');
    $em = filter_input(INPUT_POST, 'em');
    $ad = filter_input(INPUT_POST, 'ad');
    $gs = filter_input(INPUT_POST, 'gs');
    $sl = filter_input(INPUT_POST, 'sl');
    $st = filter_input(INPUT_POST, 'st');
    $pc = filter_input(INPUT_POST, 'pc');
    $pl = filter_input(INPUT_POST, 'pl');
    $gbr = filter_input(INPUT_POST, 'gbr');
    $ww = filter_input(INPUT_POST, 'ww');

    if ($id === NULL || $vn === NULL || $tv === NULL || $an === NULL || $gbd === NULL || $em === NULL || $ad === NULL || $gs === NULL || $sl === NULL || $st === NULL || $pc === NULL || $pl === NULL || $gbr === NULL || $ww === null) {
      return REQUEST_FAILURE_DATA_INVALID;
    }

    $stmnt = $this->dbh->prepare("
      UPDATE persons
      SET firstname = :vn,
      preprovision = :tv,
      lastname = :an,
      dateofbirth = :gbd,
      emailaddress = :em,
      hire_date = :ad,
      gender = :gs,
      salary = :sl,
      street = :st,
      postal_code = :pc,
      place = :pl,
      loginname = :gbr,
      password = :ww
      WHERE id = :id;
    ");
    $stmnt->bindParam(':id', $id);
    $stmnt->bindParam(':vn', $vn);
    $stmnt->bindParam(':tv', $tv);
    $stmnt->bindParam(':an', $an);
    $stmnt->bindParam(':gbd', $gbd);
    $stmnt->bindParam(':em', $em);
    $stmnt->bindParam(':ad', $ad);
    $stmnt->bindParam(':gs', $gs);
    $stmnt->bindParam(':sl', $sl);
    $stmnt->bindParam(':st', $st);
    $stmnt->bindParam(':pc', $pc);
    $stmnt->bindParam(':pl', $pl);
    $stmnt->bindParam(':gbr', $gbr);
    $stmnt->bindParam(':ww', $ww);

    try {
      $stmnt->execute();
    }
    catch(\PDOEXception $e) {
        echo $e;
        return REQUEST_FAILURE_DATA_INVALID;
    }

    $aantalGewijzigd = $stmnt->rowCount();
    if($aantalGewijzigd===1) {
        return REQUEST_SUCCESS;
    }
    return REQUEST_NOTHING_CHANGED;
  }

  public function getInstructeur() {
    $id = filter_input(INPUT_GET, 'id');

    $stmnt = $this->dbh->prepare("
      SELECT * FROM persons WHERE id = :id;
    ");
    $stmnt->bindParam(':id', $id);
    $stmnt->execute();
    return $stmnt->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__.'\db\Persoon');
  }

  public function getTrainingsVormen() {
    $stmnt = $this->dbh->prepare("
      SELECT * FROM trainings;
    ");
    $stmnt->execute();
    return $stmnt->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__.'\db\Training');
  }

  public function getTrainingsVorm() {
    $id = filter_input(INPUT_GET, 'id');
    $stmnt = $this->dbh->prepare("
      SELECT * FROM trainings WHERE id = :id;
    ");
    $stmnt->bindParam(':id', $id);
    $stmnt->execute();
    return $stmnt->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__.'\db\Training');
  }

  public function trainingsVormToevoegen() {
    $bs = filter_input(INPUT_POST, 'bs');
    $dr = filter_input(INPUT_POST, 'dr');
    $ek = filter_input(INPUT_POST, 'ek');

    if ($bs === NULL || $dr === NULL || $ek === NULL) {
      return REQUEST_FAILURE_DATA_INVALID;
    }

    $stmnt = $this->dbh->prepare("
      INSERT INTO trainings (description, duration, extra_costs) VALUES
      (:bs, :dr, :ek);
    ");
    $stmnt->bindParam(':bs', $bs);
    $stmnt->bindParam(':dr', $dr);
    $stmnt->bindParam(':ek', $ek);

    try {
      $stmnt->execute();
    }
    catch(\PDOEXception $e) {
        echo $e;
        return REQUEST_FAILURE_DATA_INVALID;
    }

    $aantalGewijzigd = $stmnt->rowCount();
    if($aantalGewijzigd===1) {
        return REQUEST_SUCCESS;
    }
    return REQUEST_NOTHING_CHANGED;
  }

  public function trainingsVormrWijzigen() {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $bs = filter_input(INPUT_POST, 'bs');
    $dr = filter_input(INPUT_POST, 'dr');
    $ek = filter_input(INPUT_POST, 'ek');

    if ($id === NULL || $bs === NULL || $dr === NULL || $ek === NULL) {
      return REQUEST_FAILURE_DATA_INVALID;
    }

    $stmnt = $this->dbh->prepare("
      UPDATE trainings
      SET description = :bs,
      duration = :dr,
      extra_costs = :ek
      WHERE id = :id;
    ");
    $stmnt->bindParam(':id', $id);
    $stmnt->bindParam(':bs', $bs);
    $stmnt->bindParam(':dr', $dr);
    $stmnt->bindParam(':ek', $ek);

    try {
      $stmnt->execute();
    }
    catch(\PDOEXception $e) {
        echo $e;
        return REQUEST_FAILURE_DATA_INVALID;
    }

    $aantalGewijzigd = $stmnt->rowCount();
    if($aantalGewijzigd===1) {
        return REQUEST_SUCCESS;
    }
    return REQUEST_NOTHING_CHANGED;
  }

  public function verwijderTrainingsVorm() {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $stmnt = $this->dbh->prepare("
      DELETE FROM trainings
      WHERE id = :id;
    ");
    $stmnt->bindParam(':id', $id);
    $stmnt->execute();
  }
}
