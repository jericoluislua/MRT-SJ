<?php if(!isset($_SESSION)){session_start();} if(isset($_SESSION['uid'])):?>

    <div id="training-canvas" class="card">
        <div id="MuCho">
            <div id="quest-div">
                <h3 class="quest" id="<?=$id?>"><?=$quest?></h3>
            </div>
            <div id="answer-div">
                <row  id="opt1"> <div class="c1"><button><?=$answ1?></button></div> <div class="c2"><button><?=$answ3?></button></div></row>
                <row  id="opt2"> <div class="c1"><button><?=$answ2?></button></div> <div class="c2"><button class="solut"><?=$answ4?></button></div></row>
                <span style="display: none;" class="answ"><?=$solut?></span>
            </div>

            <div class="btn-div">
                   <button id="mucho_next" onclick="Event.preventDefault()"  class="btn btn-primary">
                   Next <i class="material-icons">send</i>
                  </button>
            </div>
        </div>
            <div id="msg">
                <h1>Congrats!!</h1>
                <span>You've finished this excercise and earned <?=$currpoints?> points.</span>
                <p>Click this Button to add these points to your account.</p>
                  <button id="add_points" name="add_points" type="submit" formmethod="post"  action="/choice/addPoints" class="btn btn-primary">
                   Add <i class="material-icons">send</i>
                  </button>
            </div>
    </div>

</div>

<div class="container">
    <?php endif;?>
    <?php if(!isset($_SESSION['uid'])):?>
        <h1>Access Denied!</h1>
<?php endif;?>