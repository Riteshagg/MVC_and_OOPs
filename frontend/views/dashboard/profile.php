<?php
include '../layouts/dashAuth.php';
use Models\Auth;
use Controllers\AuthControllers;
$controller = new AuthControllers();
$data = $controller->getUserContent();
if(isset($_REQUEST['update'])) {
    $get =  $controller->userProfileUpdate($_REQUEST);
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
        <h3 class="text-center "> </h3>
        <div class="profile-info ml-15 mt-4">
            <h3><?=$data['username']?></h3>
            <p> <i class="fas fa-envelope mr-1"></i> <a href="mailto:<?=$data['email']?>"><?=$data['email']?></a></p>
        </div>

    </div>
    <div class="col-8">
        <h5 class="font-weight-bold text-secondary">YOUR PROFILE INFORMATION</h5>
        <hr>
        <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="fullNameHelp" placeholder="Enter your username" value="<?=$data['username']?>">
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input class="form-control autosize" id="email" name="email" placeholder="Write your email id" value="<?=$data['email']?>">
            </div>
            <div class="form-group">
                <label for="bio">Your Bio</label>
                <textarea class="form-control autosize" id="bio" name="bio" placeholder="Write something about you" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 62px;"><?=$data['bio']?></textarea>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Enter your location" value="<?=$data['location']?>">
            </div>
            <div class="form-group small text-muted">
                All of the fields on this page are optional and can be deleted at any time, and by filling them out, you're giving us consent to share this data wherever your user profile appears.
            </div>
            <button  class="btn btn-style" name="update">Update</button>
        </form>
    </div>


</div>




<?php endblock() ?>
