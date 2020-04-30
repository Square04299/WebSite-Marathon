<?php

require_once 'framework/Model.php';

/**
 * Fournit les services d'accès aux billets du blog 
 * 
 */
class Post extends Model {

    public function getUserRaceNotEnd($idUser){
        $sql = "select C_NAME as Cname, C_LIEUX_DEPART as lieuxDepart, C_LIEUX_ARRIVER as lieuxArriver, C_DATE_DEBUT as dateDebut"
        ." from T_COURSE join T_PATICIPANT on C_ID_COURSE=P_ID_COURSE"
        ." where P_PARTICIPANT = '$idUser' and C_END = 0";

        $race = $this->executeRequest($sql, array($idUser));
        if ($race->rowCount() > 0)
            return $race->fetchAll();
        else
            throw new Exception("Aucune course a été trouver pour le User");
    }

    public function getTotalParticipant(){
        $sql = "select P_ID_COURSE, count(p_participant) as total from T_PATICIPANT"
        ." group by p_id_course";

        $total = $this->executeRequest($sql, array($idUser));
        if ($total->rowCount() > 0)
            return $total->fetchAll();
        else
            throw new Exception("Ce user n'a pas cette course dans ses favories");
    }

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getPosts() {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as title, BIL_CONTENU as content from T_BILLET'
                . ' order by BIL_ID desc';
        $posts = $this->executeRequest($sql);
        return $posts;
    }


    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getPost($idPost) {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as title, BIL_CONTENU as content from T_BILLET'
                . ' where BIL_ID=?';
        $post = $this->executeRequest($sql, array($idPost));
        if ($post->rowCount() > 0)
            return $post->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idPost'");
    }

    /**
     * Renvoie le nombre total de billets
     * 
     * @return int Le nombre de billets
     */
    public function getNumberPosts()
    {
        $sql = 'select count(*) as nbPosts from T_BILLET';
        $result = $this->executeRequest($sql);
        $line = $result->fetch();  // Le résultat comporte toujours 1 ligne
        return $line['nbPosts'];
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
*/