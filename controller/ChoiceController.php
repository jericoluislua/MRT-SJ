<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 16.08.2018
 * Time: 09:55
 */
require_once '../repository/UserRepository.php';

class ChoiceController
{
    public function index(){
        $view = new View('choice_index');
        $view->title = 'Choice';
        $view->heading = 'Choice';
        $userRepository = new UserRepository();
        if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_SESSION['uid'])) {
            $view->uname = $userRepository->readById($_SESSION['uid'])->uname;
        }
        $view->display();
    }
}