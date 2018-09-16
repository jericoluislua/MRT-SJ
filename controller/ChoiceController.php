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
    public function FiPa(){
        $view = new View('choice_FiPa');
        $view->title = 'Finding Pairs';
        $view->heading = 'Choice: Finding Pairs';
        $userRepository = new UserRepository();
        if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_SESSION['uid'])) {
            $view->uname = $userRepository->readById($_SESSION['uid'])->uname;
        }
        $view->display();
    }
    public function FiBl(){
        $view = new View('choice_FiBl');
        $view->title = 'Fill in the Blanks';
        $view->heading = 'Choice: Fill in the Blanks';
        $userRepository = new UserRepository();
        if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_SESSION['uid'])) {
            $view->uname = $userRepository->readById($_SESSION['uid'])->uname;
        }
        $view->display();
    }
    public function MuCho(){
        $view = new View('choice_MuCho');
        $view->title = 'Multiple Choice';
        $view->heading = 'Choice: Multiple Choice';
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