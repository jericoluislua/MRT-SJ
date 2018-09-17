<?php if(!isset($_SESSION)){session_start();} if(isset($_SESSION['uid'])):?>
</div>
<div class="choice">
    <div id="profile" class="card-panel">
        <h1 ><?=$uname?></h1>
        <img src="/images/placeholders/profile-picture.png" class="profile-picture" alt="profile-picture">
    </div>
    <div id="training-canvas" class="card">
    <div id="FiBl">
        <div id="img-div">
            <img src="/images/placeholders/FiBl_placeholder.jpg" class="code-image" alt="code-image"/>
        </div>
        <div id="answer-div">
        <form>
        <div class="form-group input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Answer</label>
          <button id="send" name="send" type="submit" class="btn btn-primary">
            <i class="material-icons">send</i>
          </button>
        </div>
         </form>
        </div>
    </div>
    </div>
</div>

<div class="container">
    <?php endif;?>
    <?php if(!isset($_SESSION['uid'])):?>
        <h1>Access Denied!</h1>
<?php endif;?>