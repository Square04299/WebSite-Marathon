<?php

require_once 'ControllerSecured.php';
require_once 'model/Post.php';
require_once 'model/Comment.php';
require_once 'model/Admin.php';

/**
 * Contrôleur des actions d'administration
 * 
 */
class ControllerAdmin extends ControllerSecured
{

    /**
     * Constructeur 
     */
    public function __construct()
    {
        $this->data = new Admin();
    }

    public function index()
    {
        /*$nbPosts = $this->post->getNumberPosts();
        $nbComments = $this->comment->getNumberComments();
        $login = $this->request->getSession()->getAttribute("login");
        parent::generateView(array('nbPosts' => $nbPosts, 'nbComments' => $nbComments, 'login' => $login));*/
        $this->data->lieuxToJSON();
        parent::generateView();
    }

}

