<?php

require_once 'framework/Controller.php';
require_once 'model/Post.php';

class ControllerHome extends Controller {

    private $race;

    public function __construct() {
        $this->race = new Post();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $login = $this->request->getSession()->getAttribute("idUser");
        $races = $this->race->getUserRaceNotEnd($login);
        //FIXME $racescount = $this->race->getTotalParticipant();
        print_r($login);
        print_r($races);
        //FIXME print_r($racescount);
        $this->generateView(array('login'=> $login,'races'=> $races));
    }

}

