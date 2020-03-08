<?php

require_once 'framework/Controller.php';
require_once 'model/User.php';

/**
 * Contrôleur gérant la connexion au site
 *
 */
class ControllerConnection extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $this->generateView();
    }

    public function connect()
    {
        if ($this->request->existingParameter("login") && $this->request->existingParameter("password")) {
            $login = $this->request->getParameter("login");
            $pwd = $this->request->getParameter("password");
            if ($this->user->connect($login, $pwd)) {
                $user = $this->user->getUser($login, $pwd);
                $this->request->getSession()->setAttribute("idUser",
                        $user['idUser']);
                $this->request->getSession()->setAttribute("login",
                        $user['login']);
                if ($this->user->getAdmin($login,$pwd)) {
                    $this->redirect("admin");
                } else {
                    $this->redirect("home");
                }
            }
            else
                $this->generateView(array('msgError' => 'Login ou mot de passe incorrects'),
                        "index");
        }
        else
            throw new Exception("Action impossible : login ou mot de passe non défini");
    }

    public function disconnect()
    {
        $this->request->getSession()->destroy();
        $this->redirect("home");
    }

}
