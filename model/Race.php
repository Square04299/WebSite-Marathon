<?php

require_once 'framework/Model.php';

/**
 * 
 * 
 */
class Race extends Model {

    public function getUserRace($idUser,$end){
        $sql = "select C_NAME as Cname, C_LIEUX_DEPART as lieuxDepart, C_LIEUX_ARRIVER as lieuxArriver, C_DATE_DEBUT as dateDebut, P_CLASSEMENT as Pclassement"
        ." from T_COURSE join T_PARTICIPANT on C_ID_COURSE=P_ID_COURSE"
        ." where P_PARTICIPANT = '$idUser' and C_END = '$end'";

        $race = $this->executeRequest($sql, array($idUser));
            return $race->fetchAll();
    }

    public function getRace(){
        $sql = "select DISTINCT C_NAME as Cname,C_ID_COURSE as id, C_LIEUX_DEPART as lieuxDepart, C_LIEUX_ARRIVER as lieuxArriver, C_DATE_DEBUT as dateDebut"
        ." from T_COURSE join T_PARTICIPANT on C_ID_COURSE=P_ID_COURSE"
        ." order by id DESC";

        $race = $this->executeRequest($sql, array($idUser));
            return $race->fetchAll();
    }

    public function getTotalParticipant(){
        $sql = "select P_ID_COURSE, count(p_participant) as total"
        ." from T_PARTICIPANT join T_COURSE  on C_ID_COURSE=P_ID_COURSE"
        ." where C_END = 0"
        ." group by p_id_course";

        $total = $this->executeRequest($sql, array($idUser));
        if ($total->rowCount() > 0)
            return $total->fetchAll();
        else
            throw new Exception("Ce user n'a pas cette course dans ses favories");
    }

    public function getParticipant(){
        $sql = "select P_ID_COURSE as id, count(p_participant) as total"
        ." from T_PARTICIPANT join T_COURSE  on C_ID_COURSE=P_ID_COURSE"
        ." group by p_id_course"
        ." order by id desc";

        $total = $this->executeRequest($sql, array($idUser));
            return $total->fetchAll();
    }

    public function mergeAfter($userRaces,$racesCount){
        for ($i=0; $i < sizeof($userRaces); $i++) { 
            $races[$i] = array_merge($userRaces[$i],$racesCount[$i]);
        }
        return $races;
    }

}