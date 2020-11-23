<?php
include '../layouts/header.php';
use Controllers\AuthControllers;
$controller = new AuthControllers();

if(isset($_REQUEST['submit'])) {
    $get =  $controller->signup($_REQUEST);

}
$message = $controller->session->getMessage(['danger']);
$controller->session->unsetSession(['danger']);
?>
<?php startblock('title') ?>
    Signup
<?php endblock() ?>
<?php startblock('body') //Start php code block in the layout automatically ?>
<?=$message?>
    <div class="card border-0">
        <div class="card-body">
            <h1 class="text-center">Sign up</h1>
            <hr>
            <div class="col-6 m-auto">
                <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label bg-light label-spacing"><i class="fas fa-user contact-icon"></i></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control border-0 bg-light" id="username" name="username" value="<?=isset($_REQUEST['username'])?$_REQUEST['username']:''?>" placeholder="Enter username">
                        </div>
                        <small id="name" class="form-text text-danger"><?=isset($get['username'])?$get['username']:''?></small>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label bg-light label-spacing"><i class="fas fa-lock contact-icon"></i></label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control border-0 bg-light" id="password" name="password" value="<?=isset($_REQUEST['password'])?$_REQUEST['password']:''?>" placeholder="Enter password">
                        </div>
                        <small id="name" class="form-text text-danger"><?=isset($get['password'])?$get['password']:''?></small>
                    </div>
                    <div class="form-group row">
                        <label for="confirm_password" class="col-sm-2 col-form-label bg-light label-spacing"><i class="fas fa-lock contact-icon"></i></label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control border-0 bg-light" id="confirm_password"  value="<?=isset($_REQUEST['confirm_password'])?$_REQUEST['confirm_password']:''?>" name="confirm_password" placeholder="Enter confirm password">
                        </div>
                        <small id="name" class="form-text text-danger"><?=isset($get['confirm_password'])?$get['confirm_password']:''?></small>
                    </div>
                    <div class="form-group row">
                        <label for="email"  class="col-sm-2 col-form-label bg-light label-spacing"><i class="fas fa-envelope contact-icon"></i></label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control  border-0 bg-light" id="email" name="email" value="<?=isset($_REQUEST['email'])?$_REQUEST['email']:''?>" placeholder="Enter email">
                        </div>
                        <small id="name" class="form-text text-danger"><?=isset($get['email'])?$get['email']:''?></small>
                    </div>


                    <div class="form-group row">
                        <button type="submit" class="btn btn-style m-auto" name="submit" value="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endblock() ?>