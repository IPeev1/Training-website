<?php
namespace codeproduction\controls;

use \php\error as ERROR;
use \php\controls\AbstractController as AbstractController;

class BezoekerController extends AbstractController {
    public function __construct($control, $action){
        parent::__construct($control, $action);
    }
    public function defaultAction() {
      $typegebruiker = $this->model->getGebruikerRecht();
      $this->view->set('typegebruiker', $typegebruiker);

        $gebruiker = $this->model->getGebruiker();
            $this->view->set('gebruiker',$gebruiker);

      if($this->model->isPostLeeg()) {
        $this->view->set("note","vul uw gegevns in");
      } else {
        $this->login();
      }
    }

    public function registerAction() {
      $typegebruiker = $this->model->getGebruikerRecht();
      $this->view->set('typegebruiker', $typegebruiker);

      if($this->model->isPostLeeg())
      {
         $this->view->set("note","vul uw gegevens in");
      }
      else
      {
          $result=$this->model->registreren();
          switch($result)
          {
              case REQUEST_SUCCESS:
                   $this->view->set("note","U bent successvol geregistreerd!");
                   $this->forward("default");
                   //   $this->login();
                   break;
              case REQUEST_FAILURE_DATA_INVALID:
                   $this->view->set("note","emailadres niet correct of gebruikersnaam bestaat al");
                   break;
              case REQUEST_FAILURE_DATA_INCOMPLETE:
                   $this->view->set("note","Niet alle gegevens ingevuld");
                   break;
          }
      }
    }

    public function trainingsAction() {
      $typegebruiker = $this->model->getGebruikerRecht();
      $this->view->set('typegebruiker', $typegebruiker);

      $lesnamen=$this->model->getTraining();
      $this->view->set('lesnamen',$lesnamen);

      if($this->model->isPostLeeg()) {
        $this->view->set("note","vul uw gegevns in");
      } else {
        $this->login();
      }
    }

    public function gedragsregelsAction() {
      $typegebruiker = $this->model->getGebruikerRecht();
      $this->view->set('typegebruiker', $typegebruiker);
      if($this->model->isPostLeeg()) {
        $this->view->set("note","vul uw gegevns in");
      } else {
        $this->login();
      }
    }

    public function contactAction() {
      $typegebruiker = $this->model->getGebruikerRecht();
      $this->view->set('typegebruiker', $typegebruiker);
      if($this->model->isPostLeeg()) {
        $this->view->set("note","vul uw gegevns in");
      } else {
        $this->login();
      }
    }

    public function login() {
      $resultInlog=$this->model->controleerInloggen();
      switch($resultInlog){
          case REQUEST_SUCCESS:
              $this->view->set("note","Welkom ".$_SESSION['gebruiker']->getFirstname());
              $recht = $this->model->getGebruikerRecht();
              $this->forward("default", $recht);
              break;
          case REQUEST_FAILURE_DATA_INVALID:
              $this->view->set("note","Gegevens kloppen niet, probeer het opnieuw");
              break;
          case REQUEST_FAILURE_DATA_INCOMPLETE:
              $this->view->set("note","Gebruikersnaam en of wachtwoord zijn niet ingevuld");
              break;

      }
    }
}
