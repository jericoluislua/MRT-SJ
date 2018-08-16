<?php

require_once '../repository/UserRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */

class UserController
{
    public $err = array();
    public $pregex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/";
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
        if (isset($_POST['signup'])) {
             $username = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $password2 = htmlspecialchars($_POST['password2']);
            if($username == "jericoluislua" || $username == "SVRNM"){
                $isAdmin = true;
            }
            else{
                $isAdmin = false;
            }
            if($password==$password2) {
                if(preg_match($this->pregex, $password)){
                    $userRepository = new UserRepository();

                    if($userRepository->existingUsername($username) == true){
                        $this->doError('Username already exists.');
                        header('Location: /user/create');
                    }
                    if($userRepository->existingUsername($username) == false){
                        $userRepository->create($username, $password, $isAdmin);
                        // goes directly to the login page (HTTP 302)
                        header('Location: /user/login');
                    }
                }
                else{
                    $this->doError('Your password needs to have the following: 1 upper and lowercase, a digit and consists of 8 characters.');
                    header('Location: /user/create');

                }
            }
            if($password != $password2){
                $this->doError("Passwords did not match!");
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
