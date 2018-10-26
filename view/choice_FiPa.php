<?php if(!isset($_SESSION)){session_start();} if(isset($_SESSION['uid'])):?>

      //last bit of profile
            <p class="black-text">Points: <?=$currpoints?></p>
        </div>
    <div id="training-canvas" class="card">
    <div id="FiPa">
            <row  id="opt1"> <div class="c1"><button class="btn11">Lorem ipsum</button></div> <div class="c2"><button class="btn12">lorem ipsum</button></div></row>
            <row  id="opt2"> <div class="c1"><button class="btn21">Lorem ipsum</button></div> <div class="c2"><button class="btn22">lorem ipsum</button></div></row>
            <row  id="opt3"> <div class="c1"><button class="btn31">Lorem ipsum</button></div> <div class="c2"><button class="btn32">lorem ipsum</button></div></row>
    </div>
    </div>
</div>

<div class="container">
    <?php endif;?>
    <?php if(!isset($_SESSION['uid'])):?>
        <h1>Access Denied!</h1>
<?php endif;?>