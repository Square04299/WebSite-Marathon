<?php

require_once 'framework/Model.php';

/**
 * Modélise un utilisateur du blog
 *
 */
class User extends Model {

    /**
     * Vérifie qu'un utilisateur existe dans la BD
     * 
     * @param string $login Le login
     * @param string $pwd Le mot de passe
     * @return boolean Vrai si l'utilisateur existe, faux sinon
     */
    public function connect($login, $pwd){
        //$sql = "select UTIL_ID from T_UTILISATEUR where UTIL_LOGIN=? and UTIL_MDP=?";
        $sql = "select U_ID from T_USER where U_NOM='$login' and U_PASSWORD='$pwd'";
        $user = $this->executeRequest($sql, array($login, $pwd));
        return ($user->rowCount() == 1);
    }

    /**
     * Renvoie un utilisateur existant dans la BD
     * 
     * @param string $login Le login
     * @param string $pwd Le mot de passe
     * @return mixed L'utilisateur
     * @throws Exception Si aucun utilisateur ne correspond aux paramètres
     */
    public function getUser($login, $pwd){
        //$sql = "select UTIL_ID as idUser, UTIL_LOGIN as login, UTIL_MDP as mdp 
            //from T_UTILISATEUR where UTIL_LOGIN=? and UTIL_MDP=?";
        $sql = "select U_ID as idUser, U_NOM as login, U_PASSWORD as mdp 
            from T_USER where U_NOM='$login' and U_PASSWORD='$pwd'";
        $user = $this->executeRequest($sql, array($login, $pwd));
        if ($user->rowCount() == 1)
            return $user->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
    }

    /**
     * Verfiie qu'un utilisateur est admin
     * @param string $login Le login
     * @param string $pwd Le mot de passe
     * @return boolean Vrai si l'utilisateur est admin
     */
    public function getAdmin($login,$pwd){
        $sql = "select U_ADMIN from T_USER where U_NOM='$login' and U_PASSWORD ='$pwd' and U_ADMIN ='1'";
        $admin = $this->executeRequest($sql, array($login, $pwd));
        return ($admin->rowCount() == 1);
    }

}

