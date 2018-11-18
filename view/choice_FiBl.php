<?php if(!isset($_SESSION)){session_start();} if(isset($_SESSION['uid'])):?>
      //last bit of profile
            <p class="black-text">Points: <?=$currpoints?></p>
        </div>
    <div id="training-canvas" class="card">
    <div id="FiBl">
        <div id="img-div">
            <img src="<?=$imgurl?>" id="<?=$id?>" class="code-image" alt="code-image"/>
        </div>
        <div id="answer-div">
        <form method="post" action="/choice/checkFiBl?id=<?=$id?>">
        <div class="form-group input-field col s6">
          <input id="fibl_answer" name="fibl_answer" type="text" class="validate">
          <label for="fibl_answer">Answer</label>
          <button id="fibl_next" name="fibl_next" class="btn btn-primary">
            <i class="material-icons">send</i>
          </button>
        </div>
         </form>
        </div>
    </div>
                <div id="msg">
                <h1>Congrats!!</h1>
                <span>You've finished this excercise and earned <?=$currpoints?> points.</span>
                <p>Click this Button to add these points to your account.</p>
                <form method="post"  action="/choice/addPoints" >
                  <button id="add_points" name="add_points" type="submit" class="btn btn-primary">
                   Add <i class="material-icons">send</i>
                  </button>
                  </form>
            </div>
    </div>
</div>

<div class="container">
    <?php endif;?>
    <?php if(!isset($_SESSION['uid'])):?>
        <h1>Access Denied!</h1>
<?php endif;?>