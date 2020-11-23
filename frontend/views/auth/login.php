<?php
include '../layouts/header.php';
use Controllers\AuthControllers;
$controller = new AuthControllers();
if(isset($_REQUEST['submit'])) {
    $get =  $controller->login($_REQUEST);

}
$message = $controller->session->getMessage(['danger','success']);
$controller->session->unsetSession(['danger','success'])
?>
<?php startblock('title') ?>
Login
<?php endblock() ?>

<?php startblock('body') //Start php code block in the layout automatically ?>
<?=$message?>
<div class="card border-0">
    <div class="card-body">
        <h3 class="text-center "> <img src="<?=BASE_HTTP_PATH?>common/img/user.png" class="user-img"></h3>
        <h1 class="text-center">Login</h1>
        <br/>
        <div class="col-6 m-auto">
            <form method="post" action="<?=$_SERVER['PHP_SELF']?>">


                <div class="form-group row">
                    <label for="email"  class="col-sm-2 col-form-label bg-light label-spacing"><i class="fas fa-envelope contact-icon"></i></label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control  border-0 bg-light" id="email"  name="email" value="<?=isset($_REQUEST['email'])?$_REQUEST['email']:''?>" placeholder="Enter email">
                    </div>
                    <small id="email" class="form-text text-danger"><?=isset($get['email'])?$get['email']:''?></small>
                </div>
                <div class="form-group row">
                    <label for="password"  class="col-sm-2 col-form-label bg-light label-spacing"><i class="fas fa-lock contact-icon"></i></label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control  border-0 bg-light" id="password" name="password" value="<?=isset($_REQUEST['password'])?$_REQUEST['password']:''?>" placeholder="Enter password">
                    </div>
                    <small id="password" class="form-text text-danger"><?=isset($get['password'])?$get['password']:''?></small>
                </div>

                <div class="form-group row ">
                    <br/>
                <button type="submit" name="submit" value="submit" class="btn btn-style m-auto">Login</button>
                </div>
            </form>
            <p class="text-center">If you have not account. <a href="<?=WEB_ACCESS?>auth/sign_up.php">Signup</a></p>
        </div>
    </div>
</div>
<?php endblock() ?>
