<?php

require_once 'framework/Model.php';

/**
 * Modélise un utilisateur du blog
 *
 */
class Admin extends Model {


    public function getLieux(){
        $sql = 'select R_LIEUX from T_REGION';
        $lieux = $this->executeRequest($sql);
        return $lieux;
    }

}