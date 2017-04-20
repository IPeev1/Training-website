<?php
namespace codeproduction\controls;

use \php\error as ERROR;
use \php\controls\AbstractController as AbstractController;

class AdminController extends AbstractController {
  public function __construct($control, $action){
    parent::__construct($control, $action);
  }

  public function defaultAction() {
    $typegebruiker = $this->model->getGebruikerRecht();
    $this->view->set('typegebruiker', $typegebruiker);
    $instructeurs = $this->model->getInstructeurs();
    $this->view->set('instructeurs', $instructeurs);
  }

  public function ledenAction() {
    $typegebruiker = $this->model->getGebruikerRecht();
    $this->view->set('typegebruiker', $typegebruiker);
    $leden = $this->model->getLeden();
    $this->view->set('leden', $leden);
  }

  public function trainingsvormenAction() {
    $typegebruiker = $this->model->getGebruikerRecht();
    $this->view->set('typegebruiker', $typegebruiker);
    $trainingsvormen = $this->model->getTrainingsVormen();
    $this->view->set('trainingsvormen', $trainingsvormen);
  }

  public function addinstAction() {
    $typegebruiker = $this->model->getGebruikerRecht();
    $this->view->set('typegebruiker', $typegebruiker);
    if ($this->model->isPostLeeg()) {
      $this->view->set('note', 'Nieuwe instructeur toevoegen');
    } else {
      $result = $this->model->instToevoegen();
      switch($result) {
        case REQUEST_SUCCESS:
          $this->view->set('note', 'Lid toegevoegd');
          break;
        case REQUEST_NOTHING_CHANGED:
          $this->view->set('note', 'Niets veranderd');
          break;
        case REQUEST_FAILURE_DATA_INVALID:
          $this->view->set('note', 'Er is iets misgegaan');
          break;
      }
      $this->forward('default', 'admin');
    }
  }

  public function editinstAction() {
    $typegebruiker = $this->model->getGebruikerRecht();
    $this->view->set('typegebruiker', $typegebruiker);
    $instructeur = $this->model->getInstructeur();
    $this->view->set('instructeur', $instructeur[0]);
    if ($this->model->isPostLeeg()) {
      $this->view->set('note', 'Instructeur wijzigen');
    } else {
      $result = $this->model->gebruikerWijzigen();
      switch($result) {
        case REQUEST_SUCCESS:
          $this->view->set('note', 'Lid gewijzigd');
          break;
        case REQUEST_NOTHING_CHANGED:
          $this->view->set('note', 'Niets veranderd');
          break;
        case REQUEST_FAILURE_DATA_INVALID:
          $this->view->set('note', 'Er is iets misgegaan');
          break;
      }
      $this->forward('default', 'admin');
    }
  }

  public function deleteinstAction() {
    $this->model->verwijderGebruiker();
    $this->forward('default', 'admin');
  }

  public function addtrainAction() {
    $typegebruiker = $this->model->getGebruikerRecht();
    $this->view->set('typegebruiker', $typegebruiker);
    if ($this->model->isPostLeeg()) {
      $this->view->set('note', 'Nieuwe trainingsvorm toevoegen');
    } else {
      $result = $this->model->trainingsVormToevoegen();
      switch($result) {
        case REQUEST_SUCCESS:
          $this->view->set('note', 'Trainingsvorm toegevoegd');
          break;
        case REQUEST_NOTHING_CHANGED:
          $this->view->set('note', 'Niets veranderd');
          break;
        case REQUEST_FAILURE_DATA_INVALID:
          $this->view->set('note', 'Er is iets misgegaan');
          break;
      }
      $this->forward('trainingsvormen', 'admin');
    }
  }

  public function edittrainAction() {
    $typegebruiker = $this->model->getGebruikerRecht();
    $this->view->set('typegebruiker', $typegebruiker);
    $trainingsvorm = $this->model->getTrainingsVorm();
    $this->view->set('trainingsvorm', $trainingsvorm[0]);
    if ($this->model->isPostLeeg()) {
      $this->view->set('note', 'Trainingsvorm wijzigen');
    } else {
      $result = $this->model->trainingsVormrWijzigen();
      switch($result) {
        case REQUEST_SUCCESS:
          $this->view->set('note', 'Trainingsvorm gewijzigd');
          break;
        case REQUEST_NOTHING_CHANGED:
          $this->view->set('note', 'Niets veranderd');
          break;
        case REQUEST_FAILURE_DATA_INVALID:
          $this->view->set('note', 'Er is iets misgegaan');
          break;
      }
      $this->forward('trainingsvormen', 'admin');
    }
  }

  public function deletetrainAction() {
    $this->model->verwijderTrainingsVorm();
    $this->forward('trainingsvormen', 'admin');
  }

  public function deletelidAction() {
    $this->model->verwijderGebruiker();
    $this->forward('leden', 'admin');
  }
}
