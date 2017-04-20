<?php
namespace codeproduction\controls;

use \php\error as ERROR;
use \php\controls\AbstractController as AbstractController;

class InstructeurController extends AbstractController{
    public function __construct($control, $action){
        parent::__construct($control, $action);
    }
    public function gebruikerrecht(){
        $typegebruiker = $this->model->getGebruikerRecht();
        $this->view->set('typegebruiker', $typegebruiker);
    }

    public function defaultAction(){
        $this->gebruikerrecht();
    }

    public function beheerGebruikersAction(){
        $this->gebruikerrecht();
        $gebruikers = $this->model->getGebruikers();
        $this->view->set('gebruikers', $gebruikers);
    }

    public function deletegebruikerAction(){
        $this->gebruikerrecht();
        $this->model->verwijderGebruiker();
        $this->forward('beheerGebruikers');
    }

    public function updategebruikerAction(){
        $this->gebruikerrecht();
        $gebruiker= $this->model->getGebruikerById();
        $this->view->set('gebruiker',$gebruiker);

        if($this->model->isPostLeeg()){
            echo 'vul de gegevens in';
        }
        else{
            $result = $this->model->updateGebruiker();
            switch($result){
                case REQUEST_SUCCESS:
                    $this->forward('beheerGebruikers');
                    echo 'succes?';
                    break;
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                    echo "De gegevens waren incompleet. Vul compleet in!";
                    break;
                case REQUEST_NOTHING_CHANGED:
                    echo "Er was niets te wijzigen";
                    break;
                case REQUEST_FAILURE_DATA_INVALID:
                    echo "Vul een correcte datum/tijd in.";
                    break;
            }
        }
    }

    public function addgebruikerAction(){
        $this->gebruikerrecht();
        if($this->model->isPostLeeg()){
            echo 'vul de gegevens in';
        }
        else{
            $this->model->addGebruiker();
        }

    }

    public function lessenoverzichtAction(){
        $this->gebruikerrecht();
        $lessen= $this->model->lessonOverzicht();
        $this->view->set('lessen',$lessen);
    }

    public function updatelesAction(){
        $this->gebruikerrecht();

        $lesson= $this->model->getLesById();
        $this->view->set('lesson',$lesson);

        $lesnamen=$this->model->getTraining();
        $this->view->set('lesnamen',$lesnamen);

        if($this->model->isPostLeeg()){
            echo 'vul de gegevens in';
        }
        else{
            $result = $this->model->updateles();
            switch($result){
                case REQUEST_SUCCESS:
                    $this->forward('lessenoverzicht');
                    echo 'succes?';
                    break;
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                    echo "De gegevens waren incompleet. Vul compleet in!";
                    break;
                case REQUEST_NOTHING_CHANGED:
                    echo "Er was niets te wijzigen";
                    break;
                case REQUEST_FAILURE_DATA_INVALID:
                    echo "Vul een correcte datum/tijd in.";
                    break;
            }
        }
    }

    public function deletelesAction(){
        $this->gebruikerrecht();
        $this->model->verwijderLes();
        $this->forward('lessenoverzicht');
    }

    public function deelnemersAction(){
        $this->gebruikerrecht();
        $allegebruikers= $this->model->getAlleDeelnemers();
        $this->view->set('allegebruikers',$allegebruikers);
    }

    public function addlesAction(){
        $this->gebruikerrecht();
        $instructeurs=$this->model->getGebruikers();
        $this->view->set('instructeurs',$instructeurs);

        $lesnamen=$this->model->getTraining();
        $this->view->set('lesnamen',$lesnamen);

        if($this->model->isPostLeeg()){
            echo 'vul de gegevens in';
        }
        else {
            $this->model->addles();
        }
    }

}
