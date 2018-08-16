<?php

require_once '../repository/UserRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */

class UserController
{
    public $err = array();
    public function index()
    {
        $userRepository = new UserRepository();
        $view = new View('user_index');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function create()
    {
        $view = new View('user_create');
        $view->title = 'Registration';
        $view->heading = 'Registration';
        $view->display();
    }

    public function doCreate()
    {
        if ($_POST['send']) {
             $username = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            if($password==$password2) {
                $userRepository = new UserRepository();
                $userRepository->create($username, $password);
                // Anfrage an die URI /user weiterleiten (HTTP 302)
                header('Location: /user');
            }
            if($password!=$password2){
                $this->doError("Passwords are not matching!");
                header('Location: /user/create');
            }
        }


    }

    public function doError($error){
        $this->err = array_fill(0,1,$error);
        session_start();
        $_SESSION['err'] = $this->err;
    }
    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
