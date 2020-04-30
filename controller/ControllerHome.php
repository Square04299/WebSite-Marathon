<?php

require_once 'framework/Controller.php';
require_once 'model/Post.php';

class ControllerHome extends Controller {

    private $post;

    public function __construct() {
        $this->post = new Post();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $login = $this->request->getSession()->getAttribute("idUser");
        $posts = $this->post->getUserRace($login);
        $this->generateView(array('login'=> $login,'post'=> $posts));
    }

}

