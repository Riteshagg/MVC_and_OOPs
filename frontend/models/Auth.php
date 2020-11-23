<?php


namespace Models;
require_once  dirname(__DIR__, 2).'/autoload.php';
class Auth
{

    public static function user(){
        if(isset($_SESSION['bio']) || isset($_SESSION['location'])) {
            $location = $_SESSION['location'];
        }
            return new Auth();
    }



    public function isGuest(){
        if(isset($_SESSION['user_id']) && $_SESSION['status']==1)
            return false;
        else
            return true;
    }

    public function isAdmin(){
        if(isset($_SESSION['user_id']) && $_SESSION['status']==2)
            return true;
        else
            return false;
    }

    public function id(){
        if(isset($_SESSION['user_id']))
            return $_SESSION['user_id'];
    }

    public function username(){
        if(isset($_SESSION['username']))
            return $_SESSION['username'];
    }

    public function password(){
        if(isset($_SESSION['password']))
            return $_SESSION['password'];
    }

    public function status(){
        if(isset($_SESSION['status']))
            return $_SESSION['status'];
    }

    public function email(){
        if(isset($_SESSION['email']))
            return $_SESSION['email'];
    }
    public function bio(){
        if(isset($_SESSION['bio']))
            return $_SESSION['bio'];
    }
    public function location(){
        if(isset($_SESSION['location']))
            return $_SESSION['location'];
    }
    public function photo(){
        if(isset($_SESSION['photo']))
            return $_SESSION['photo'];
    }

    public function isLoggedIn(){
        if(isset($_SESSION['user_id']) && isset($_SESSION['username']) && $_SESSION['status']==1) {
            return true;
        }
        else {
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function logout(){
       session_destroy();
    }

}