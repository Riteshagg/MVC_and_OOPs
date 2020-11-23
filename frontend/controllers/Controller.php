<?php


namespace Controllers;
require_once  dirname(__DIR__, 2).'/autoload.php';

class Controller
{
    public  function redirect($location) {
        header('location:'.$location);
        exit();
    }
}