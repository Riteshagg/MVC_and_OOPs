<?php
include '../layouts/dashAuth.php';
use Models\Auth;
use Controllers\AuthControllers;
$controller = new AuthControllers();
$data = $controller->getUserContent();
if(isset($_REQUEST['update'])) {
    $get =  $controller->userAccountUpdate($_REQUEST);
}

$message = $controller->session->getMessage(['success','danger']);
$controller->session->unsetSession(['success','danger']);
?>

<?php startblock('body') ?>
<?=$message?>
    <div class="row">
        <div class="col-4">

            <div class="w-50 h-50 rounded-circle border bg-light ml-15 ">
                <?php
                    if($data['photo']!=null){
                        echo ' <img id="previewProfileImg" class="w-100 rounded-circle m-auto" src="'.BASE_HTTP_PATH.'frontend/web/profileImg/'.$data['photo'].'" alt="your image">';
                    }else{
                        echo '<img src="'.BASE_HTTP_PATH.'common/img/user.png" class="user-img w-100 rounded-circle">';
                    }

                ?>

                </div>
            <p class="ml-15"><button class=" btn btn-sm btn-secondary" data-toggle="modal" data-target="#userProfileModal" ><i class="fas fa-edit"></i> edit</button></p>
                   <div class="profile-info ml-15 mt-4">
                        <h3><?=$data['username']?></h3>
                        <p> <i class="fas fa-envelope mr-1"></i> <a href="mailto:<?=$data['email']?>"><?=$data['email']?></a></p>
                   </div>


        </div>
        <div class="col-8">
            <h5 class="font-weight-bold text-secondary">ACCOUNT SETTINGS</h5>
            <hr>
            <div class="mt-4 p-3 border">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">

                <div class="form-group">
                    <label class="d-block">Change Password</label>

                    <input type="password" class="form-control mt-1" placeholder="New password" name="new_password">
                    <input type="password" class="form-control mt-1" placeholder="Confirm new password" name="confirm_password">
                    <small id="name" class="form-text text-danger"><?=isset($get['new_password'])?$get['new_password']:''?></small>
                </div>
                <hr>
                <button class="btn btn-style" type="submit" name="update">Update</button>
            </form>
            </div>
            <div class="mt-4 p-3 border">

                    <button type="button" class="text-left btn btn-outline-danger" data-toggle="modal" data-target="#user_delete_account">Delete Account</button>
                    <p class="text-muted font-size-sm">Once you delete your account, there is no going back. Please be certain.</p>

            </div>

        </div>
    </div>
<?php endblock() ?>