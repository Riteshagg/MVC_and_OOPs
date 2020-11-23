<?php
require_once  dirname(__DIR__, 3).'/autoload.php';
use Models\Auth;
if(isset($_GET['action'])&& $_GET['action']=='logout'){
    Auth::user()->logout();
}