<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmadmin
 * Date: 16.08.2018
 * Time: 09:55
 */
require_once '../repository/UserRepository.php';
require_once '../repository/MuChoRepository.php';

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
        $points = $view->currpoints;
        $userRepository = new UserRepository();
        if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_SESSION['uid'])) {
            $view->uname = $userRepository->readById($_SESSION['uid'])->uname;


            $quiz = $this->createQuiz();
            if(!empty($quiz)) {
                $view->quest = $quiz->quest;
                $view->answ1 = $quiz->answ1;
                $view->answ2 = $quiz->answ2;
                $view->answ3 = $quiz->answ3;
                $view->answ4 = $quiz->answ4;
                $view->solut = $quiz->solut;
                $view->id = $quiz->id;
                $points += $this->getPoints();
                $view->currpoints = $points;
            }
            if($quiz == null){
                echo "<script>
                         $('#msg').css('display','block');
                    </script>";
            }

        }

        $view->display();
    }
    public function createQuiz(){
         $questions = $this->deleteQuestion(null);
        $randomid = rand(1, sizeof($questions));
        $output = new stdClass();
        if($questions != null || !empty($questions)) {
            foreach ($questions AS $question) {
                if ($question->muchoid == $randomid) {
                    $output->quest = $question->question;
                    $output->id = $question->muchoid;
                    $solut = $question->answer;

                }
            }
            $answers = array();
            for ($i = 0; $i <= 2; $i++) {
                if ($this->is_distinct($answers)) {
                    $answers[$i] = $questions[rand(0, sizeof($questions) - 1)]->answer;
                } else {
                    $answers[$i] = $questions[rand(0, sizeof($questions) - 1)]->answer;
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
    public function getPoints(){
        if(isset($_GET['solved'])) {
            $solved = htmlspecialchars($_GET['solved']);
            $questions =  $this->deleteQuestion($solved);
            foreach ($questions AS $question) {
                if ($question->muchoid = $solved) {
                    return $question->points;
                }
            }
        }

        return null;
    }
    public function deleteQuestion($id){
        $muchoRepository = new MuChoRepository();
        $questions = $muchoRepository->readAllQuestions();
        if(isset($id)) {
            $i = 0;
            foreach ($questions AS $question) {
                if ($question->muchoid = $id) {
                    array_splice($questions, $i);
                }
                $i++;
            }
        }
        return $questions;
    }
    function is_distinct($array) {
        if(count($array) == count(array_unique($array, SORT_REGULAR))){
           return true;
        }
        else{
            return false;
        }
    }

}