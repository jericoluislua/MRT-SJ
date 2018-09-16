<?php if(!isset($_SESSION)){session_start();} if(isset($_SESSION['uid'])):?>
</div>
<div class="choice">
    <div id="profile" class="card-panel">
        <h1 ><?=$uname?></h1>
        <img src="/images/placeholders/profile-picture.png" class="profile-picture" alt="profile-picture">
    </div>
    <div id="training-canvas" class="card">
        <div id="MuCho">
            <div id="quest-div">
                <h3 class="quest">Lorem Ipsum?</h3>
            </div>
            <div id="answer-div">
                <row  id="opt1"> <div class="c1"><button>Lorem ipsum</button></div> <div class="c2"><button>lorem ipsum</button></div></row>
                <row  id="opt2"> <div class="c1"><button>Lorem ipsum</button></div> <div class="c2"><button>lorem ipsum</button></div></row>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?php endif;?>
    <?php if(!isset($_SESSION['uid'])):?>
        <h1>Access Denied!</h1>
<?php endif;?>