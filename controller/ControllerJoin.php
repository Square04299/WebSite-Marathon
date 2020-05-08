<?php

require_once 'framework/Controller.php';
require_once 'model/Join.php';
require_once 'model/Race.php';

class ControllerJoin extends Controller {

    private $join;
    private $race;

    public function __construct() {
        $this->join = new Join();
        $this->race = new Race();
    }

    public function index() {
        $login = $this->request->getSession()->getAttribute("idUser");
        $RaceJoin = $this->join->passteck($login);
        $temp = $this->join->find($RaceJoin);
        foreach ($temp as $key => $value) {
            $racesCount[$key] = $this->join->getTotalParticipant($value);
        }
        $races = $this->race->mergeAfter($RaceJoin,$racesCount);
        $this->generateView(array('races'=> $races));
    }

    public function joining(){
        $login = $this->request->getSession()->getAttribute("idUser");
        $idCourse = $this->request->getParameter("idCourse");

        $this->join->joining($idCourse,$login);
        $this->executeAction("index");
    }

}