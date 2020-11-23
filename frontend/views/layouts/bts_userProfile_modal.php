
<?php

use Models\Auth;
use Controllers\AuthControllers;
$controller = new AuthControllers();
if(isset($_REQUEST['changeProfileImg'])){
    $get = $controller->changeProfileImg($_REQUEST);
    print_r($get);
}
?>
<div class="modal fade" id="userProfileModal" tabindex="-1" role="dialog" aria-labelledby="userProfileModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit your profile image </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">

                               <img id="previewProfileImg" class="w-100" src="<?=BASE_HTTP_PATH?>frontend/web/profileImg/<?=\Models\Auth::user()->photo()?>" alt="your image">

                            <br/>
                            <input type='file' id="profileImg"  name="photo" />

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name = "changeProfileImg">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>