<?php
include '../layouts/header.php';
use Controllers\SiteController;
$controller = new SiteController();

if(isset($_REQUEST['submit'])) {
   $get =  $controller->index($_REQUEST);

}

$message = $controller->session->getMessage(['success']);
$controller->session->unsetSession(['success']);

?>
<?php startblock('title') ?>
Contact Us
<?php endblock() ?>
<?php startblock('body') //Start php code block in the layout automatically ?>
<?=$message?>
<div class="card border-0">
    <div class="card-body">
        <h1 class="text-center">Contact Us</h1>
        <hr>
        <div class="col-6 m-auto">
            <form method="post" action="<?=$_SERVER['PHP_SELF']?>">

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label bg-light label-spacing"><i class="fas fa-user contact-icon"></i></label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control border-0 bg-light" id="name" name="name" placeholder="Enter name" value="<?=isset($_REQUEST['name'])?$_REQUEST['name']:''?>">
                    </div>
                    <small id="name" class="form-text text-danger"><?=isset($get['name'])?$get['name']:''?></small>
                </div>
                <div class="form-group row">
                    <label for="email"  class="col-sm-2 col-form-label bg-light label-spacing"><i class="fas fa-envelope contact-icon"></i></label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control  border-0 bg-light" id="email" name="email" placeholder="Enter email" value="<?=isset($_REQUEST['email'])?$_REQUEST['email']:''?>">
                    </div>
                    <small id="email" class="form-text text-danger"><?=isset($get['email'])?$get['email']:''?></small>
                </div>
                <div class="form-group row">
                    <label for="phone"  class="col-sm-2 col-form-label bg-light label-spacing"><i class="fas fa-phone-alt contact-icon"></i></label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control  border-0 bg-light" id="phone" name="phone"  placeholder="Enter phone" value="<?=isset($_REQUEST['phone'])?$_REQUEST['phone']:''?>">
                    </div>
                    <small id="phone" class="form-text text-danger"><?=isset($get['phone'])?$get['phone']:''?></small>
                </div>

                <div class="form-group row">

                    <textarea  class="form-control  border-0 bg-light" id="message " name="message"  placeholder="Enter message"><?=isset($_REQUEST['message'])?$_REQUEST['message']:''?></textarea>
                    <small id="message" class="form-text text-danger"><?=isset($get['message'])?$get['message']:''?></small>

                </div>
                <div class="form-group row">
                <button type="submit" class="btn btn-style m-auto" name="submit" value="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endblock() ?>
