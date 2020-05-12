<?php

require_once 'framework/Model.php';

/**
 * Modélise un utilisateur du blog
 *
 */
class Admin extends Model {

    public function lieuxToJSON(){
        $sql ='select R_ID, R_LIEUX from T_REGION';
        $result = $this->executeRequest($sql);
        $json_array;

        while ($row = $result->fetchObject()) {
            $json_array[] = $row;
        }
        
        $fp = fopen('ressources/lieux.json', "w");
        fwrite($fp, json_encode($json_array));
        fclose($fp);
    }

    public function newRace($name,$depart,$arriver,$date){
        $sql = "insert into T_COURSE (C_NAME,C_LIEUX_DEPART,C_LIEUX_ARRIVER,C_DATE_DEBUT,C_END)"
        ." values(?, ?, ?, ?, ?)";
        $this->executeRequest($sql, array($name, $depart, $arriver, $date,"0"));
    }

}