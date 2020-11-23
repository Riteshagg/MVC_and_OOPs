<?php
// This is include the classes in the entire project;
session_start();
$directorys = array(
    __DIR__.'/frontend/models/ContactUs.php',
    __DIR__.'/frontend/models/User.php',
    __DIR__.'/frontend/models/Session.php',
    __DIR__.'/frontend/models/Auth.php',
    __DIR__.'/frontend/controllers/SiteController.php',
    __DIR__.'/frontend/controllers/Controller.php',
    __DIR__.'/frontend/controllers/AuthControllers.php',
    __DIR__.'/common/database/DBConnection.php',
);
foreach($directorys as $directory)
{
    if(file_exists($directory))
    {
        require_once $directory;
    }else{
        echo 'class not found ('.$directory.')';
    }
}




// This is checking authentication of users, is loggedIn or not;
$url = $_SERVER['REQUEST_URI'];
$authenticationCheck = 'dashboard';
if(strpos($url, $authenticationCheck)){
    if(!isset($_SESSION['user_id']) && !isset($_SESSION['username'])) {
       echo "<script>window.history.back();</script>";
        exit();

    }
}