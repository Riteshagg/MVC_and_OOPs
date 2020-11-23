<?php


namespace Models;
require_once  dirname(__DIR__, 2).'/autoload.php';
use Common\Database\DBConnection;
use Models\Auth;

class User
{

    public $username;
    public $email;
    public $password;
    public $status=1; // '0' is not USERS and '1' is Users '2' is ADMIN
    public $password_reset_token;
    public $bio;
    public $location;
    public $photo;
    public $created_at;
    public $updated_at;
    public $dbCon;
    public function __construct()
    {
        date_default_timezone_set("Asia/Kolkata");
        $this->dbCon = new DBConnection();
        $this->created_at = date('Y-m-d h:i:s');
        $this->updated_at = date('Y-m-d h:i:s');
    }


    public function insert(){
        $password = md5($this->password);
        $sql = "INSERT INTO `users`(`username`, `email`, `password`, `status`, `created_at`, `updated_at`) value ('$this->username','$this->email','$password','$this->status','$this->created_at','$this->updated_at')";
        if(!$this->dbCon->query($sql))
            return $this->dbCon->error;
        else
            return null;
    }

    public function findUser($email,$password){
        $password = md5($password);
        $sql = "Select * from users where email='$email' and password ='$password' limit 1 ";
        $result =  $this->dbCon->query($sql);
        if($result) {
            $data = mysqli_fetch_array($result);
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['bio'] = $data['bio'];
            $_SESSION['location'] = $data['location'];
            $_SESSION['photo'] = $data['photo'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['password_reset_token'] = $data['password_reset_token'];
            $_SESSION['status'] = $data['status'];
            $_SESSION['created_at'] = $data['created_at'];
            $_SESSION['updated_at'] = $data['updated_at'];
            return true;
        }
        return false;
    }


    public function data(){
        $authID= Auth::user()->id();
        $sql = "Select * from users where id='$authID' limit 1 ";
        $result =  $this->dbCon->query($sql);
        if($result){
            $data = mysqli_fetch_array($result);
            return $data;
        }
        return null;
    }

    public function update(){
        $authID= Auth::user()->id();
        $sql = "UPDATE users SET";
        if(!empty($this->username)){
            $sql.=" username = '$this->username',";
        }
        if(!empty($this->email)){
            $sql.=" email = '$this->email',";
        }
        if(!empty($this->password)){
            $pass = md5($this->password);
            $sql.=" password = '$pass',";
        }
        if(!empty($this->bio)){
            $sql.=" bio = '$this->bio',";
        }
        if(!empty($this->location)){
            $sql.=" location = '$this->location',";
        }
        if(!empty($this->photo)){
            $sql.=" photo = '$this->photo',";
        }
        if($this->status>=0){
            $sql.=" status = '$this->status',";
        }
        $sql .= " updated_at='$this->updated_at' WHERE id = '$authID' ";
        $result =  $this->dbCon->query($sql);
        if($result){
            return true;
        }
        return false;
    }


}