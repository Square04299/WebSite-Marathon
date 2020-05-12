<?php

require_once 'framework/Model.php';

/**
 * 
 * 
 */
class Join extends Model {

    public function getTotalParticipant($idCOURSE){
        $sql = "select P_ID_COURSE, count(p_participant) as total"
        ." from T_PARTICIPANT join T_COURSE  on C_ID_COURSE=P_ID_COURSE"
        ." where C_END = 0 AND C_ID_COURSE = '$idCOURSE'"
        ." group by p_id_course";

        $total = $this->executeRequest($sql, array($idUser));
        if ($total->rowCount() > 0) {
            return $total->fetch();
        } else {
            return  $array = Array ( "P_ID_COURSE" => $idCOURSE,"total" => "0");
        }
        
    }

    public function mergeAfter($userRaces,$racesCount){
        for ($i=0; $i < sizeof($userRaces); $i++) { 
            $races[$i] = array_merge($userRaces[$i],$racesCount[$i]);
        }
        return $races;
    }

    public function find($race){
        for ($i=0; $i < sizeof($race); $i++) { 
            $result[$i] = $race[$i]['idCOURSE'];
        }
        return $result;
    }

    public function passteck($idUser){
        $sql = "select T_COURSE.C_ID_COURSE as idCOURSE, T_COURSE.C_NAME as Cname, T_COURSE.C_LIEUX_DEPART as lieuxDepart, T_COURSE.C_LIEUX_ARRIVER as lieuxArriver, T_COURSE.C_DATE_DEBUT as dateDebut"
        ." FROM T_COURSE"
        ." LEFT JOIN ( SELECT T_COURSE.* FROM T_COURSE LEFT JOIN T_PARTICIPANT ON P_ID_COURSE = C_ID_COURSE WHERE P_PARTICIPANT = '$idUser' )"
        ." AS T_JOIN ON T_JOIN.C_ID_COURSE = T_COURSE.C_ID_COURSE  WHERE T_JOIN.C_ID_COURSE IS NULL AND T_COURSE.C_END = 0";
        $join = $this->executeRequest($sql, array($idUser));
        return $join->fetchAll();

    }

    public function joining($idCourse,$idUser){
        $sql =  "insert into T_PARTICIPANT (P_ID_COURSE,P_PARTICIPANT, P_CLASSEMENT,P_DATE)"
                . ' values(?, ?, ?, ?)';
        $date = date('Y-m-d H:i:s');
        $this->executeRequest($sql, array($idCourse, $idUser, "6" ,$date));
    }
}