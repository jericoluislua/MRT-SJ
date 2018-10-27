<?php if(!isset($_SESSION)){session_start();} if(isset($_SESSION['uid'])):?>

      //last bit of profile
            <p class="black-text">Points: <?=$currpoints?></p>
        </div>
    <div id="training-canvas" class="card">
    <div id="FiPa">
            <row  id="opt1"> <div class="c1"><button class="btn11"><?= $left1 ?></button></div> <div class="c2"><button class="btn12"><?= $right1?></button></div></row>
            <row  id="opt2"> <div class="c1"><button class="btn21"><?= $left2 ?></button></div> <div class="c2"><button class="btn22"><?= $right2?></button></div></row>
            <row  id="opt3"> <div class="c1"><button class="btn31"><?= $left3 ?></button></div> <div class="c2"><button class="btn32"><?= $right3?></button></div></row>
    </div>
    </div>
</div>

<div class="container">
    <?php endif;?>
    <?php if(!isset($_SESSION['uid'])):?>
        <h1>Access Denied!</h1>
<?php endif;?>