<?php if(!isset($_SESSION)){session_start();} if(isset($_SESSION['uid'])):?>
</div>
<div class="choice">
    <div id="profile" class="card-panel">
        <h1 ><?=$uname?></h1>
        <img src="/images/placeholders/profile-picture.png" class="profile-picture" alt="profile-picture">
    </div>

</div>

<div class="container">
    <?php endif;?>
    <?php if(!isset($_SESSION['uid'])):?>
        <h1>Access Denied!</h1>
<?php endif;?>s