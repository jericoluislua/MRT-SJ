<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 16.08.2018
 * Time: 09:55
 */
require_once '../repository/UserRepository.php';
require_once '../repository/MuChoRepository.php';
require_once '../repository/FiPaRepository.php';
require_once '../repository/FiBlRepository.php';

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
            $view->currpoints = $_SESSION['points'];
            $quiz = $this->createQuizFiBl();
            if($quiz != null) {
                $view->imgurl = $quiz->imgurl;
                $view->id = $quiz->id;
            }
            else{
                $view->extra = "<script>
                      $('#FiBl').css('display','none');
                      $('#msg').css('display','block');
                    </script>";
            }


            $this->getPoints(new FiBlRepository());
        }
        $view->display();
    }
    public function checkFiBl(){
        if(isset($_POST['fibl_answer'])){
            $_GET['solved'] = $_GET['id'];
            $answer =$_POST['fibl_answer'];
            $fiblRepository = new FiBlRepository();
            $quizanswer = $fiblRepository->getAnswer($_GET['id'])->answer;


            if($answer == $quizanswer){

                $_GET['corr']= "true";
            }
            if($answer != $quizanswer){
                $_GET['corr'] = "false";

            }
            $this->getPoints($fiblRepository);
            $_SESSION['fibl_questions']=$this->deleteQuestionFiBl($_GET['id']);
            header('Location: /choice/FiBl');
        }

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
            $view->currpoints = $_SESSION['points'];

            $quiz = $this->createQuizMuCho();

            if($quiz != null) {
                $view->quest = $quiz->quest;
                $view->answ1 = $quiz->answ1;
                $view->answ2 = $quiz->answ2;
                $view->answ3 = $quiz->answ3;
                $view->answ4 = $quiz->answ4;
                $view->solut = $quiz->solut;
                $view->id = $quiz->id;
                $this->getPoints(new MuChoRepository());

            }
            else{
                $view->extra = "<script>
                      $('#MuCho').css('display','none');
    $('#msg').css('display','block');
                    </script>";
            }

        }


        $view->display();
    }
    public function createQuizMuCho(){
        $muchoRepository = new MuChoRepository();
    if(isset($_GET['solved'])){
        $solved = htmlspecialchars($_GET['solved']);
    }
    else{
        $solved = null;

        $_SESSION['mucho_questions'] = $muchoRepository->readAllQuestions();
    }
    $questions = $this->deleteQuestionMuCho($solved);


    $output = new stdClass();
    if($questions != null) {
        $_SESSION['mucho_questions'] =$questions;
        if(sizeof($questions)>1) {

            $randomid = reset($questions)->muchoid;

            for($j =0;$j<=30;$j++) {
                $rand = rand(reset($questions)->muchoid || 1, sizeof($questions));
                if (array_key_exists($rand - 1, $questions)) {
                    $randomid = $rand;
                }
            }

        }
        else{
            $randomid = reset($questions)->muchoid;
        }
        $i=$randomid -1;
        foreach ($questions AS $question) {
            if ($question->muchoid == $randomid) {
                $output->quest = $questions[$i]->question;
                $output->id = $questions[$i]->muchoid;
                $solut = $questions[$i]->answer;
            }
        }
        $quest2 = $muchoRepository->readAllQuestions();
        $answers = array();
        for ($i = 0; $i <= 2; $i++) {
            $answer = $quest2[rand(0, sizeof($quest2) - 1)]->answer;
            if($answer != $solut && !in_array($answer,$answers)){
                $answers[$i] = $answer;
            }
            else{
                $i -= 1;
            }


        }
        $answers[3] = $solut;
        shuffle($answers);
        $output->answ1 = $answers[0];
        $output->answ2 = $answers[1];
        $output->answ3 = $answers[2];
        $output->answ4 = $answers[3];
        $output->solut = $solut;
        return $output;
    }
    else{
        return null;
    }
}
    public function createQuizFiBl(){

        if(isset($_GET['solved'])){
            $solved = htmlspecialchars($_GET['solved']);
        }
        else{
            $solved = null;
            if(!isset($_SESSION['fibl_questions'])||$_SESSION['fibl_questions'] == "null") {
                $fiblRepository = new FiBlRepository();
                $_SESSION['fibl_questions'] = $fiblRepository->readAllQuestions();
            }
        }
        $questions = $this->deleteQuestionFiBl($solved);

        $output = new stdClass();
        if($questions != null) {
            $_SESSION['fibl_questions'] =$questions;
            if(sizeof($questions)>1) {

                $randomid = reset($questions)->fiblid;

                for($j =0;$j<=30;$j++) {
                    $rand = rand(reset($questions)->fiblid || 1, sizeof($questions));
                    if (array_key_exists($rand - 1, $questions)) {
                        $randomid = $rand;
                    }
                }

            }
            else{
                $randomid = reset($questions)->fiblid;
            }
            $i=$randomid -1;
            foreach ($questions AS $question) {
                if ($question->fiblid == $randomid) {
                    $output->imgurl= $questions[$i]->exc_path;
                    $output->id = $questions[$i]->fiblid;
                    $output->answer = $questions[$i]->answer;
                }
            }
            return $output;
        }
        else{
            return null;
        }
    }
    public function getPoints($repo){
        if(isset($_GET['solved']) && isset($_GET['corr'])) {
            $solved = htmlspecialchars($_GET['solved']);
            $corr = htmlspecialchars($_GET['corr']);
            if($corr == "false"){
                return $_SESSION['points'];
            }
            if($corr == "true"){
                $questions = $repo->readAllQuestions();
                foreach ($questions AS $question) {
                        if ($question->muchoid = $solved) {
                            $_SESSION['points'] += $question->points;
                            return $_SESSION['points'];
                        }
                }


            }


        }
        else{
           return $_SESSION['points'];
        }


    }
    public function deleteQuestionMuCho($id){
        $questions = $_SESSION['mucho_questions'];
        $muchoid = intval($id);
        if($muchoid != null) {

            foreach($questions AS $question) {
                if ($question->muchoid == $muchoid){
                    $i = array_search($question,$questions);
                    unset($questions[$i]);
                    return $questions;
                }
            }

        }
        else{
            return $questions;
        }
    }
    public function deleteQuestionFiBl($id){
        $questions = $_SESSION['fibl_questions'];

        $fiblid = intval($id);
        if($fiblid != null) {

            foreach($questions AS $question) {
                if ($question->fiblid == $fiblid){
                    $i = array_search($question,$questions);
                    unset($questions[$i]);
                    return $questions;
                }
            }

        }
        else{
            return $questions;
        }
    }
    public function addPoints(){
        if(isset($_POST['add_points'])){
            $userRepository = new UserRepository();
            $userRepository->updateScore($_SESSION['points'],$_SESSION['uid']);
            $_SESSION['points'] = null;
            $_SESSION['fibl_questions'] = "null";
           header('Location: /choice');
        }
    }


}