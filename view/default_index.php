<?php  if(!isset($_SESSION)){session_start();} if(isset($_SESSION['uid'])){header('Location: /choice');} ?>
<div class="row">

        <div class="col s6">
            <a href="./user/create">
            <div class="btn signbtn">
            <p>Sign Up</p>
            </div>
            </a>
        </div>


        <div class="col s6">
            <a href="./user/login">
            <div class="btn signbtn">
                <p>Log In</p>
            </div>
            </a>
        </div>


</div>
