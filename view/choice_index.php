<?php if(!isset($_SESSION)){session_start();} if(isset($_SESSION['uid'])):?>

    <div id="training-canvas" class="card">
        <a href="choice/FiBl"><div class="btn options"><span>Fill In The Blanks</span></div></a>
        <a href="choice/MuCho"><div class="btn options"><span>Multiple Choice</span></div></a>
        <a href="choice/FiPa"><div class="btn options"><span>Finding Pairs</span></div></a>
    </div>
</div>

<div class="container">
    <?php endif;?>
    <?php if(!isset($_SESSION['uid'])):?>
        <h1>Access Denied!</h1>
<?php endif;?>

