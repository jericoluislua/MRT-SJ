<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 23.10.2018
 * Time: 19:53
 */
require_once '../../repository/MuChoRepository.php';
$question = $_GET['quest'];
$answer = $_GET['answ'];
$muchorepository = new MuChoRepository();
if($answer = $muchorepository->getAnswer($question)){
    return true;
}
else{
    false;
}