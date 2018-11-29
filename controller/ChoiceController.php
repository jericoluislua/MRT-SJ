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
    private $err = array();
    public function index()
    {
        $view = new View('choice_index');
        $view->title = 'Choice';
        $view->heading = 'Choice';
        $userRepository = new UserRepository();
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['uid'])) {
            $user = $userRepository->readById($_SESSION['uid']);
            $view->uname = $user->uname;
            $view->points = $user->score;
        }
        $view->display();
    }

    public function FiPa()
    {
        $view = new View('choice_FiPa');
        $view->title = 'Finding Pairs';
        $view->heading = '<a onclick="returnToChoice();" class="returnButton">Choice:</a> Finding Pairs';
        $userRepository = new UserRepository();
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['uid'])) {
            $view->uname = $userRepository->readById($_SESSION['uid'])->uname;
            $view->currpoints = $_SESSION['points'];
            $quiz = $this->createQuizFiPa();

            if ($quiz != null) {
                $view->left1 = $quiz->left1;
                $view->left2 = $quiz->left2;
                $view->left3 = $quiz->left3;
                $view->right1 = $quiz->right1;
                $view->right2 = $quiz->right2;
                $view->right3 = $quiz->right3;
            }
            else {
            $view->extra = "<script>
                      $('#FiPa').css('display','none');
                      $('#msg').css('display','block');
                    </script>";
            }

        }
        $view->display();
    }

    public function FiBl()
    {
        $view = new View('choice_FiBl');
        $view->title = 'Fill in the Blanks';
        $view->heading = '<a onclick="returnToChoice();" class="returnButton">Choice:</a> Fill in the Blanks';
        $userRepository = new UserRepository();
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['uid'])) {
            $view->uname = $userRepository->readById($_SESSION['uid'])->uname;
            $view->currpoints = $_SESSION['points'];
            $quiz = $this->createQuizFiBl();
            if ($quiz != null) {
                $view->imgurl = $quiz->imgurl;
                $view->id = $quiz->id;
            } else {
                $view->extra = "<script>
                      $('#FiBl').css('display','none');
                      $('#msg').css('display','block');
                    </script>";
            }


            $this->getPoints(new FiBlRepository());
        }
        $view->display();
    }

    public function checkFiBl()
    {
        if (isset($_POST['fibl_answer'])) {
            $_GET['solved'] = $_GET['id'];
            $answer = $_POST['fibl_answer'];
            $fiblRepository = new FiBlRepository();
            $quizanswer = $fiblRepository->getAnswer($_GET['id'])->answer;


            if ($answer == $quizanswer) {

                $_GET['corr'] = "true";
            }
            if ($answer != $quizanswer) {
                $_GET['corr'] = "false";
                $this->doError("The Correct Answer was:".$quizanswer);
            }
            $this->getPoints($fiblRepository);
            header('Location: /choice/FiBl?solved='.$_GET['solved']);
        }

    }
    public function checkFiPa()
    {
        if (isset($_GET['solved'])) {
            $solved = htmlspecialchars($_GET['solved']);
        } else {
            $solved = null;
            $fipaRepository = new FiPaRepository();
            $_SESSION['fipa_questions'] = $fipaRepository->readAllQuestions();

        }
            $points = htmlspecialchars($_GET['points']);
            $_SESSION['points'] += $points;

            header('Location: /choice/FiPa?solved='.$solved);

    }

    public function MuCho()
    {
        $view = new View('choice_MuCho');
        $view->title = 'Multiple Choice';
        $view->heading = '<a onclick="returnToChoice();" class="returnButton">Choice:</a> Multiple Choice';

        $userRepository = new UserRepository();
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['uid'])) {
            $view->uname = $userRepository->readById($_SESSION['uid'])->uname;
            $view->currpoints = $_SESSION['points'];

            $quiz = $this->createQuizMuCho();

            if ($quiz != null || !empty($quiz) || count($quiz) > 1) {
                $view->quest = $quiz->quest;
                $view->answ1 = $quiz->answ1;
                $view->answ2 = $quiz->answ2;
                $view->answ3 = $quiz->answ3;
                $view->answ4 = $quiz->answ4;
                $view->solut = $quiz->solut;
                $view->id = $quiz->id;
                $this->getPoints(new MuChoRepository());

            } else {
                $view->extra = "<script>
                      $('#MuCho').css('display','none');
    $('#msg').css('display','block');
                    </script>";
            }

        }


        $view->display();
    }

    public function createQuizFiPa()
    {
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_GET['solved'])) {
            $solved = htmlspecialchars($_GET['solved']);
        } else {
            $solved = null;
            $fipaRepository = new FiPaRepository();
            $_SESSION['fipa_questions'] = $fipaRepository->readAllQuestions();

        }
        $questions = $this->deleteQuestionFiPa($solved);

        $output = new stdClass();
        if (count($questions) >= 6 && $questions != null) {
            $_SESSION['fipa_questions'] =$questions;
            $lefts = array();
            $l = array();
            $rights = array();
            $r = array();
            for ($i = 0; $i <= 2; $i++) {
                $left = $questions[rand(0,sizeof($questions)-1)];
                if (!in_array($left->element_1, $l)) {
                    $l[$i] = $left->element_1;
                    $temp1  = new StdClass();
                    $temp1->id = $left->fipaid;
                    $temp1->string = $left->element_1;
                    $temp1->point = $left->points;
                    $lefts[$i] = $temp1;

                } else {
                    $i -= 1;
                }
            }
            for ($i = 0; $i <= 2; $i++) {
                $right = $questions[rand(0, sizeof($questions)-1)];
                if (!in_array($right->element_2, $r) && in_array($right->element_1, $l)) {
                    $r[$i] = $right->element_2;
                   $temp2 = new stdClass();
                   $temp2->id = $right->fipaid;
                   $temp2->string = $right->element_2;
                    $temp2->point = $right->points;
                   $rights[$i] = $temp2;
                } else {
                    $i -= 1;
                }
            }

            shuffle($lefts);
            shuffle($rights);
            $output->left1 = $lefts[0];
            $output->left2 = $lefts[1];
            $output->left3 = $lefts[2];
            $output->right1 = $rights[0];
            $output->right2 = $rights[1];
            $output->right3 = $rights[2];

            return $output;
        } else {
            return null;
        }
    }

    public function createQuizFiBl()
    {

        if (isset($_GET['solved'])) {
            $solved = htmlspecialchars($_GET['solved']);
        } else {
            $solved = null;
            $fiblRepository = new FiBlRepository();
            $_SESSION['fibl_questions'] = $fiblRepository->readAllQuestions();

        }
        $questions = $this->deleteQuestionFiBl($solved);

        $output = new stdClass();
        if ($questions != null) {
            $_SESSION['fibl_questions'] = $questions;
            if (sizeof($questions) > 1) {

                $randomid = reset($questions)->fiblid;

                for ($j = 0; $j <= 30; $j++) {
                    $rand = rand($randomid || 1, sizeof($questions));
                    if (array_key_exists($rand, $questions)) {
                        $randomid = $questions[$rand]->fiblid;
                        $i = $rand;
                    }
                }

            } else {
                $randomid = reset($questions)->fiblid;
                $i = reset($questions);

            }
            foreach ($questions AS $question) {
                if ($question->fiblid == $randomid) {
                    $output->imgurl = $questions[$i]->exc_path;
                    $output->id = $questions[$i]->fiblid;
                    $output->answer = $questions[$i]->answer;
                }
            }
            return $output;
        } else {
            return null;
        }
    }

    public function createQuizMuCho()
    {
        $muchoRepository = new MuChoRepository();
        if (isset($_GET['solved'])) {
            $solved = htmlspecialchars($_GET['solved']);
            if(isset($_GET['corr'])) {
                $string = htmlspecialchars($_GET['corr']);
                if($string = 'true'){
                    $corr = true;
                }
                else{
                    $corr = false;
                }
            }else{
                $corr = false;
            }
        } else {
            $solved = null;
            $corr = false;
            $_SESSION['mucho_questions'] = $muchoRepository->readAllQuestions();
        }
        if($corr == true) {
            $questions = $this->deleteQuestionMuCho($solved);
        }
        else{
            $questions = $this->deleteQuestionMuCho(null);
        }

        $output = new stdClass();
        if (count($questions) > 1) {
            $_SESSION['mucho_questions'] = $questions;
            if (count($questions) > 2) {

                $randomid = reset($questions)->muchoid;

                for ($j = 0; $j <= 30; $j++) {
                    $rand = rand($randomid||1, sizeof($questions));
                    if (array_key_exists($rand, $questions)) {
                        $randomid = $questions[$rand]->muchoid;
                        $i = $rand;
                    }
                }

            } else {
                $randomid = reset($questions)->muchoid;
                $i = array_search(reset($questions),$questions);
            }

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
                if ($answer != $solut && !in_array($answer, $answers)) {
                    $answers[$i] = $answer;
                } else {
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
        } else {
            return null;
        }
    }

    public function getPoints($repo)
    {
        if (isset($_GET['solved']) && isset($_GET['corr'])) {
            $solved = htmlspecialchars($_GET['solved']);
            $corr = htmlspecialchars($_GET['corr']);
            $questions = $repo->readAllQuestions();
            if ($corr == "false") {
                foreach ($questions AS $question) {
                    if ($question->muchoid = $solved | $question->fiblid = $solved) {
                        $_SESSION['points'] -= $question->points;
                    }
                }
            }
            if ($corr == "true") {
                foreach ($questions AS $question) {
                    if ($question->muchoid = $solved | $question->fiblid = $solved) {
                        $_SESSION['points'] += $question->points;
                    }
                }


            }
            return $_SESSION['points'];


        } else {
            return $_SESSION['points'];
        }


    }

    public function deleteQuestionFiPa($id)
    {
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['fipa_questions'])) {
          $FiPaRepository = new FiPaRepository();
          $_SESSION['fipa_questions'] = $FiPaRepository->readAll();
        }
        $questions = $_SESSION['fipa_questions'];
        $fipaid = intval($id);
        if ($fipaid != null) {
            foreach ($questions AS $question) {
                if ($question->fipaid == $fipaid) {
                    $i = array_search($question, $questions);
                    unset($questions[$i]);
                    return array_values($questions);
                }
            }
        }
        else{
            return array_values($questions);
        }
    }

    public function deleteQuestionFiBl($id)
    {
        $questions = $_SESSION['fibl_questions'];
        $fiblid = intval($id);
        if ($fiblid != null) {
            foreach ($questions AS $question) {
                if ($question->fiblid == $fiblid) {
                    $i = array_search($question, $questions);
                    unset($questions[$i]);
                    return $questions;
                }
            }

        } else {
            return $questions;
        }
    }

    public function deleteQuestionMuCho($id)
    {
        $questions = $_SESSION['mucho_questions'];

        $muchoid = intval($id);
        if ($id != null) {

            foreach ($questions AS $question) {
                if ($question->muchoid == $muchoid) {
                    $i = array_search($question, $questions);
                    unset($questions[$i]);
                    return array_values($questions);
                }
            }

        } else {
            return array_values($questions);
        }
    }

    public function addPoints()
    {
        if (isset($_POST['add_points'])) {
            $userRepository = new UserRepository();
            $userRepository->updateScore($_SESSION['points'], $_SESSION['uid']);
            $_SESSION['points'] = null;
            $_SESSION['fibl_questions'] = null;
            header('Location: /choice');
        }
    }
    public function doError($error){
        $this->err = array_fill(0,1,$error);
        session_start();
        $_SESSION['err'] = $this->err;
    }

}