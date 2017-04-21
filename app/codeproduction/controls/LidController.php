<?php
namespace codeproduction\controls;

use \php\error as ERROR;
use \php\controls\AbstractController as AbstractController;

class LidController extends AbstractController {
    public function __construct($control, $action){
        parent::__construct($control, $action);
    }
    public function gebruikerrecht(){
        $typegebruiker = $this->model->getGebruikerRecht();
        $this->view->set('typegebruiker', $typegebruiker);
    }

// kan de defaultAction niet in de AbstractController gezet worden?
    public function defaultAction() {
        $this->gebruikerrecht();

        $gebruikersnaam= $this->model->getGebruiker();
        $this->view->set('gebruikersnaam',$gebruikersnaam);
    }

    public function inschrijvenAction() {
        $this->gebruikerrecht();
        $gebruikersnaam= $this->model->getGebruiker();
        $this->view->set('gebruikersnaam',$gebruikersnaam);

        $lesnamen= $this->model->getLesnaam();
        $this->view->set('lesnamen',$lesnamen);

        $dates= $this->model->getLesdatum();
        $this->view->set('dates',$dates);

        $times= $this->model->getLestijd();
        $this->view->set('times',$times);

        if($this->model->isPostLeeg()){
            echo 'vul de gegevens in';
        }
        else {
            $this->model->addles();
        }
    }

    public function lidBeheerAction() {
        $this->gebruikerrecht();
        $gebruikersnaam= $this->model->getGebruiker();
        $this->view->set('gebruikersnaam',$gebruikersnaam);

        if($this->model->isPostLeeg()){
            $this->view->set('note', 'vul de gegevens in');
        }
        else{
            $result = $this->model->updateGebruiker();
            switch($result){
                case REQUEST_SUCCESS:
                    $this->forward('default');
                    $this->view->set('note', 'Succes');
                    break;
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                    $this->view->set('note', 'De gegevens waren incompleet. Vul compleet in!');
                    break;
                case REQUEST_NOTHING_CHANGED:
                    $this->view->set('note', 'Er was niets te wijzigen');
                    break;
                case REQUEST_FAILURE_DATA_INVALID:
                    $this->view->set('note', 'Vul een correcte datum/tijd in.');
                    break;
            }
        }
        $gebruiker= $this->model->getGebruikerById();
        $this->view->set('gebruiker',$gebruiker);
    }

    public function overzichtAction(){
        $this->gebruikerrecht();;
        $gebruikersnaam= $this->model->getGebruiker();
        $this->view->set('gebruikersnaam',$gebruikersnaam);
        $ingeschrevenLessen = $this->model->getRegistratiesGebruiker();
        $this->view->set('ingeschrevenLessen', $ingeschrevenLessen);
    }

    public function  deelnemenAction(){
        $this->model->deelnemerAanmelden();
        $this->forward('overzicht');
        $gebruikersnaam= $this->model->getGebruiker();
        $this->view->set('gebruikersnaam',$gebruikersnaam);
    }

    public function deletelesAction(){
        $this->model->verwijderLes();
        $this->forward('overzicht', 'lid');
    }
}
