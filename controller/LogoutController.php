<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 17.09.2018
 * Time: 14:20
 */
class LogoutController
{
    public function index(){

            session_start();
            session_destroy();
            session_unset($_SESSION);
            header('Location: /');

    }

}