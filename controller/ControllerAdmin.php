<?php

require_once 'ControllerSecured.php';
require_once 'model/Admin.php';
require_once 'model/Race.php';

/**
 * Contrôleur des actions d'administration
 * 
 */
class ControllerAdmin extends ControllerSecured
{

    /**
     * Constructeur 
     */
    public function __construct(){
        $this->data = new Admin();
        $this->race = new Race();
    }

    /**
     * Creation de la page admin
     */
    public function index(){
        $this->data->lieuxToJSON();
        $userRaces = $this->race->getRace();
        $racesCount = $this->race->getParticipant();
        $races = $this->race->mergeAfter($userRaces,$racesCount);
        $this->data->lieuxToJSON();
        parent::generateView(array('races'=> $races));
    }

    /**
     * Ajoute une nouvelle course dans la base de donnée
     */
    public function newRace(){

        $nameRace = $this->request->getParameter("race");
        $date = $this->request->getParameter("dateRace");
        $time = $this->request->getParameter("timeRace");
        $depart = $this->request->getParameter("depart");
        $arriver = $this->request->getParameter("arriver");

        $datetime = $date .' '. $time;


        $this->data->newRace($nameRace,$depart,$arriver,$datetime);
        $this->executeAction("index");
        $this->redirect("admin");
    }

}

