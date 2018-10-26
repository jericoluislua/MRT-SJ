<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?> | IDPA BWD</title>


    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/materialize/css/materialize.min.css"  media="screen,projection"/>

    <link href="/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
  </head>
  <body>
    <div id="header" class="nav-wrapper">

        <h3>ModuleRepetitionTool-SJ</h3>
        <?php if(!isset($_SESSION)){session_start();}  if(isset($_SESSION['uid'])): ?>
            <a href="/logout" class="logout-icon"><i class="material-icons" >exit_to_app</i></a>
        <?php endif; ?>
    </div>

    <div class="container">


    <h1><?= $heading ?></h1>
    <?php if(!isset($_SESSION)){session_start();} if(isset($_SESSION['uid'])):?>
    </div>
    <div class="choice">
        <div id="profile" class="card-panel">
            <h1 ><?=$uname?></h1>
            <img src="/images/placeholders/profile-picture.png" class="profile-picture" alt="profile-picture">
            <p class="black-text">Points: <?=$currpoints?></p>
        </div>
        <?php endif;?>
