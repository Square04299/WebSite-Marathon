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

}