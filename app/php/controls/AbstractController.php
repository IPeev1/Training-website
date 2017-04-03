<?php
namespace php\controls;
use php\error as ERROR;

abstract class AbstractController implements IController {
  protected $control;
  protected $action;
  protected $view;
  protected $model;

  public function __construct($control, $action) {
    $this->control = $control;
    $this->action = $action;
    $this->view = new \php\view\View();
    $modelClassName = BASE_NAMESPACE.'models\\'.ucfirst($this->control)."Model";

    if(!class_exists($modelClassName)) {
      throw new ERROR\FrameworkException("klasse $modelClassName bestaat niet!!!");
    }

    if(!is_subclass_of($modelClassName,'php\\models\\AbstractModel')) {
      throw new ERROR\FrameworkException("klasse $modelClassName erft niet van framework AbstractModel");
    }

    $this->model = new $modelClassName($control, $action);
    $gebruikersRecht = $this->model->getGebruikerRecht();

    if($gebruikersRecht!==$this->control) {
      $this->model->stopSession();
      $this->view->set('boodschap','je doet rare dingen met deze applicatie. Gebruik de gewone formulieren');
      $this->forward('default', DEFAULT_ROLE);
    }
  }

  public function execute() {
    $opdracht = $this->action."Action";
    if(method_exists($this, $opdracht)){
      $this->$opdracht();
      $this->view->setAction($this->action);
      $this->view->setControl($this->control);
      $this->view->toon();
    } else {
      $this->forward('default');
    }
  }

  protected function forward($action, $control = null) {
    $action = strtolower(trim($action));
    if(isset($control)) {
      $klasseNaam = BASE_NAMESPACE.'controls\\'.ucFirst($control).'Controller';
      if(!class_exists($klasseNaam)) {
        throw new ERROR\FrameworkException("klas $klasseNaam bestaat niet!!!");
      }
      if(!is_subclass_of($klasseNaam, 'php\\controls\\AbstractController')) {
        throw new ERROR\FrameworkException("klas $klasseNaam erft niet van framework AbstractController");
      }
      $controller = new $klasseNaam($control, $action);
    } else {
      $controller = $this;
      $this->action = $action;
      $this->model->setAction($this->action);
    }
    $controller->execute();
    exit();
  }

  public function logoutAction()
  {
        $this->model->stopSession();
        $this->forward('default','bezoeker');
  }

  protected abstract function defaultAction();
}
