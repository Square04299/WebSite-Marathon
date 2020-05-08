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

    public function mergeAfter($userRaces,$racesCount){
        for ($i=0; $i < sizeof($userRaces); $i++) { 
            $races[$i] = array_merge($userRaces[$i],$racesCount[$i]);
        }
        return $races;
    }

}
/*  Va chercher toute les courses existante
select C_NAME,C_LIEUX_DEPART,C_LIEUX_ARRIVER,C_DATE_DEBUT,P_PARTICIPANT,P_CLASSEMENT
from T_COURSE
join T_PATICIPANT on C_ID_COURSE=P_ID_COURSE

    Toute les courses du participant X
select *
from T_COURSE
join T_PATICIPANT on C_ID_COURSE=P_ID_COURSE
where P_PARTICIPANT = 1;

select C_NAME as Cname, C_LIEUX_DEPART as lieuxDepart, C_LIEUX_ARRIVER as lieuxArriver, C_DATE_DEBUT as dateDebut
from T_COURSE join T_PATICIPANT on C_ID_COURSE=P_ID_COURSE
where P_PARTICIPANT !='1' and C_END = '0';
*/