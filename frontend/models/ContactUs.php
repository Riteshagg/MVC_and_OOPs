<?php
namespace Models;
require_once  dirname(__DIR__, 2).'/autoload.php';
use Common\Database\DBConnection;

class ContactUs
{

    public $name;
    public $email;
    public $phone;
    public $message;
    public $created_at;
    public $updated_at;


    public function insert(){

       $dbCon = new DBConnection();
       $sql = "INSERT INTO `contact_us`( `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) value ('$this->name','$this->email','$this->phone','$this->message','$this->created_at','$this->updated_at')";
        $result =  $dbCon->query($sql);
        if($result)
        {
            return true;
        }
        else
        {
            return false;

        }
    }

}
