

<?php
include '../views/layouts/header.php';

?>
<?php startblock('title') ?>
Home
<?php endblock() ?>
<?php startblock('body') //Start php code block in the layout automatically ?>
<div class="card border-0">
    <div class="card-body">
        <h1 class="text-center"> <img src="<?=BASE_HTTP_PATH?>common/img/logo.png" width="50px"></h1>
        <h1 class="text-center ">Congratulations!</h1>
        <p class="text-center ">You have to create the web application using by <?=APP_NAME?> project</p>
        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</div>

<?php endblock() ?>