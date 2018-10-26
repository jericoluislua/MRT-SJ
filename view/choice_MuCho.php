<?php if(!isset($_SESSION)){session_start();} if(isset($_SESSION['uid'])):?>

    <div id="training-canvas" class="card">
        <div id="MuCho"s>
            <div id="quest-div">
                <h3 class="quest" id="<?=$id?>"><?=$quest?></h3>
            </div>
            <div id="answer-div">
                <row  id="opt1"> <div class="c1"><button><?=$answ1?></button></div> <div class="c2"><button><?=$answ3?></button></div></row>
                <row  id="opt2"> <div class="c1"><button><?=$answ2?></button></div> <div class="c2"><button class="solut"><?=$answ4?></button></div></row>
                <span style="display: none;" class="answ"><?=$solut?></span>
            </div>

            <div id="msg"></div>
        </div>

    </div>
    <div class="btn-div">
           <button id="mucho_next" onclick="Event.preventDefault()"  class="btn btn-primary">
           Next <i class="material-icons">send</i>
          </button>
    </div>
</div>

<div class="container">
    <?php endif;?>
    <?php if(!isset($_SESSION['uid'])):?>
        <h1>Access Denied!</h1>
<?php endif;?>