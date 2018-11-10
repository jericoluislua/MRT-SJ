<?php if(!isset($_SESSION)){session_start();} if(isset($_SESSION['uid'])):?>

      //last bit of profile
            <p class="black-text">Points: <?=$currpoints?></p>
        </div>
    <div id="training-canvas" class="card">
    <div id="FiPa">
            <row  id="opt1"> <div class="c1"><button class="btn11" name="<?=$left1->id?>" points="<?=$left1->point?>"><?= $left1->string ?></button></div> <div class="c2"><button class="btn12" name="<?=$right1->id?>" points="<?=$right1->point?>"><?= $right1->string?></button></div></row>
            <row  id="opt2"> <div class="c1"><button class="btn21" name="<?=$left2->id?>" points="<?=$left2->point?>"><?= $left2->string ?></button></div> <div class="c2"><button class="btn22" name="<?=$right2->id?>" points="<?=$right2->point?>"><?= $right2->string?></button></div></row>
            <row  id="opt3"> <div class="c1"><button class="btn31" name="<?=$left3->id?>" points="<?=$left3->point?>"><?= $left3->string ?></button></div> <div class="c2"><button class="btn32" name="<?=$right3->id?>" points="<?=$right3->point?>"><?= $right3->string?></button></div></row>
    </div>
    </div>
</div>

<div class="container">
    <?php endif;?>
    <?php if(!isset($_SESSION['uid'])):?>
        <h1>Access Denied!</h1>
<?php endif;?>