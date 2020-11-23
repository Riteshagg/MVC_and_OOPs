<?php
require_once realpath(__DIR__).'/../../../common/config.php';
require_once ROOT_DIR.'vendor/phpti-master/src/ti.php';
require_once  dirname(__DIR__, 3).'/autoload.php';
use Models\Auth;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> <?php startblock('title') ?>
        <?php endblock() ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <?php include 'headHtml.php'?>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
    <a class="navbar-brand self text-white font-weight-bolder" style="letter-spacing: 2px"  href="<?=BASE_HTTP_PATH?>frontend/web/index.php">
        <img src="<?=BASE_HTTP_PATH?>common/img/logo.png" width="50px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?=BASE_HTTP_PATH?>frontend/web/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=WEB_ACCESS?>site/about_us.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=WEB_ACCESS?>site/contact_us.php">Contact Us</a>
            </li>
            <?php
            if(Auth::user()->isGuest()==true){
               echo '<li class="nav-item">

                <a class="nav-link" href="'.WEB_ACCESS.'auth/login.php">Login</a>
            </li>';
            }else{
                echo '<li class="nav-item text-right">
                <button class="btn bg-light text-right" data-toggle="modal" data-target=".bs-example-modal-sm">Logout</button>
               
            </li>';
            }

            ?>



        </ul>
    </div>
    </div>
</nav>
<div class="container">
    <br/>
    <?php startblock('body') ?>
    <?php endblock() ?>
    <footer>

        <p class="text-center p-5 copyright"> &#169;Copyright 2020 <?=APP_NAME?></p>

    </footer>
</div>
<div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog col-2">
        <div class="modal-content">
            <div class="modal-header">
                <span><h4>Logout <i class="fa fa-lock"></i></h4>(<?=Auth::user()->username()?>)</span>

            </div>
            <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
            <div class="modal-footer"><button onclick="logout()" class="btn btn-light btn-block">Logout</button></div>
        </div>
    </div>
</div>

</body>
</html>