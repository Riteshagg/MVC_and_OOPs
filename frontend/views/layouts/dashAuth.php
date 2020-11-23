<?php
require_once realpath(__DIR__).'/../../../common/config.php';
require_once ROOT_DIR.'vendor/phpti-master/src/ti.php';
require_once  dirname(__DIR__, 3).'/autoload.php';
use Models\Auth;

$photo = Auth::user()->photo();
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
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">

    <div class="container-fluid">
        <a class="navbar-brand ml-15" id = 'sidebarIcon' href="#"><i class="fas fa-bars"></i></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="text-right">
                    <div class="btn-group dropleft ">
                       <button class="btn btn-white pl-3 pr-3 rounded-circle text-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                        <!--                -->
                        <div class="dropdown-menu mt-lg-5 ">
                            <a class="dropdown-item" href="<?=WEB_ACCESS?>dashboard/profile.php"><i class="fas fa-user mr-3"></i>Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=WEB_ACCESS?>dashboard/account.php"><i class="fas fa-cog mr-3"></i>Account</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><button class="btn p-0 " data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fas fa-power-off mr-3"></i>Logout</button></a>
                        </div>
                    </div>
                </div>

    </div>
</nav>
<div class="wrapperDashboard">
    <div class="row">
    <div class="col-2 bg-dark mt-n6 position-fixed h-100 w-15" id="sidebar">
        <a class="navbar-brand ml-lg-5"  href="<?=BASE_HTTP_PATH?>frontend/web/index.php">
            <img class="ml-5" src="<?=BASE_HTTP_PATH?>common/img/logo.png" width="50px"></a>

        <div class="menu mt-5">

            <p class="ml-2 p-2"> <a href="<?=WEB_ACCESS?>dashboard/index.php" class="text-light "> <i class="fas fa-chart-line mr-3"></i>Dashboard</a></p>
            <p class="ml-2 p-2"> <a  href="#" class="text-light " data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fas fa-power-off mr-3"></i>Logout</a></p>

        </div>
    </div>
    <div class="col-10 ml-15 " id="container-data">
        <div class="card mt-4 border-0  shadow-sm">
            <div class="card-body mt-4">
                <?php startblock('body') ?>
                <?php endblock() ?>
            </div>
        </div>


    </div>
    </div>
</div>
    <br/>

    <footer>

        <p class="text-center p-5 copyright"> &#169;Copyright 2020 <?=APP_NAME?></p>

    </footer>

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
<?php include 'bts_userProfile_modal.php'?>
<?php include 'bts_delete_account_modal.php'?>


<script>
    // this is script use for sidebar animation

    var i = 1;
        $('#sidebarIcon').click(function () {
            i++;
            if(i%2==0){
                $(this).removeClass('ml-15');
                $('#sidebar').hide(100);
                setTimeout(function(){
                    $('#container-data').removeClass('col-10 ml-15');
                    $('#container-data').addClass('col-11 m-auto');
                },100);

            }else{
                $('#sidebar').show(100);
                $(this).addClass('ml-15');
                $('#container-data').addClass('col-10 ml-15');
                $('#container-data').removeClass('col-11 m-auto');
            }

        });







    // this is function for bts_userProfile_modal.php-------------------------------------

    var photo = '<?=$photo?>';
    if(photo ==""){
        $('#previewProfileImg').hide();
    }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#previewProfileImg').show();
                $('#previewProfileImg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#profileImg").change(function(){
        readURL(this);
    });
    //----------------------------End-------------------------------------------------



</script>
</body>
</html>


