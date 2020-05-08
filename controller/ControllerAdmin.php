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

    public function index(){
        $userRaces = $this->race->getRace();
        $racesCount = $this->race->getParticipant();
        $races = $this->race->mergeAfter($userRaces,$racesCount);
        $this->data->lieuxToJSON();
        parent::generateView(array('races'=> $races));
    }

}

