
<?php

use Models\Auth;
use Controllers\AuthControllers;
$controller = new AuthControllers();
if(isset($_REQUEST['delete_Account'])){
    $get = $controller->userDeleteAccount($_REQUEST);
}
?>
<div class="modal fade" id="user_delete_account" tabindex="-1" role="dialog" aria-labelledby="user_delete_account" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Are you sure, you want to delete your account? </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <div class="modal-body">
                    <p class="alert alert-warning" role="alert"> <b><?=Auth::user()->username()?></b>, If you are sure to delete your account, then your data will be deleted on this account permanently.</p>


                            <label for="check_password">Please enter your password for confirmation.</label>

                                <input type="password" class="form-control" id="check_password" name="check_password" placeholder="Enter the password">


                </div>
                <div class="modal-footer">
                    <div class="col-12 text-center">
                    <button type="submit" class="btn btn-danger" name="delete_Account" id="delete_Account">I am sure to delete account</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#delete_Account').attr('disabled',true);
    $("#check_password").keypress(function(){
      $('#delete_Account').attr('disabled', false);
    });
</script>
