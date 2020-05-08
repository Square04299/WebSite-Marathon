<?php

require_once 'framework/Controller.php';
require_once 'model/Race.php';

class ControllerHome extends Controller {

    private $race;

    public function __construct() {
        $this->race = new Race();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $login = $this->request->getSession()->getAttribute("idUser");
        $userRaces = $this->race->getUserRace($login,0);
        $racesEndeds = $this->race->getUserRace($login,1);
        $racesCount = $this->race->getTotalParticipant();
        $races = $this->race->mergeAfter($userRaces,$racesCount);

        $this->generateView(array('races'=> $races,'racesEndeds'=> $racesEndeds));
    }

}

