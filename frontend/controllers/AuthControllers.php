<?php


namespace Controllers;
//require_once  dirname(__DIR__, 2).'/autoload.php';
use Models\User;
use Models\Session;
use Models\Auth;
use Controllers\Controller;

class AuthControllers extends Controller
{
    public $session;
   public function __construct()
   {
       $this->session = new Session();
   }

    public function validateRequest($request,$condition=null){

        $error = [];
//        foreach ($request as $key=>$value){
//            if($value=='') {
//                $error[$key] = ucfirst($key) . ' is required';
//            }
//            if($key=='password' && $key!='' && strlen($value)<8){
//                $error[$key] = 'Please enter the at least 8 character password ';
//            }
//        }

        foreach ($condition as  $key=>$value ){
            $con = explode("|",$value);
            for($i=0;$i<count($con);$i++){
                if($con[$i] == 'required' && empty($request[$key])){
                    $error[$key] = ucfirst($key) . ' is required';
                    break;
                }
                if($con[$i]=='email'){
                    $email = filter_var($request[$key], FILTER_SANITIZE_EMAIL);
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $error[$key] = "Invalid email format";
                        break;
                    }
                }
                if(($con[$i]=='password') && !empty($request[$key]) && strlen($request[$key])<8){
                    $error[$key] = 'Please enter the at least 8 character password ';
                    break;
                }
            }
        }
        return $error;
    }

    public function signup($request){
        $error = $this->validateRequest($request,
            [
                'username'=>'required',
                'password'=>'required|password',
                'confirm_password'=>'required',
                'email'=>'required|email'
            ]);
        if(empty($error)) {

            $insertObj = new User();
            $insertObj->username=$request['username'];
            $insertObj->email=$request['email'];
            if($request['password']==$request['confirm_password']) {
                $insertObj->password = $request['password'];
            }else{
                $this->session->setSession('danger','Password is not matched!');
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }
            if ($insertObj->insert() == null) {
                $this->session->setSession('success','You have signup successfully!');
                return $this->redirect('login.php');
            }else{
                $this->session->setSession('danger',$insertObj->insert());

            }
        }
       return $error;

    }

    public function login($request){
        $error = $this->validateRequest($request,
            [
                'email'=>'required',
                'password'=>'required',

            ]);
        if(empty($error)){
            $findUser = new User();
            $findUser->findUser($request['email'],$request['password']);
            if(!Auth::user()->isGuest()){
                return $this->redirect(WEB_ACCESS.'dashboard/index.php');
            }else{
                $this->session->setSession('danger','Email and password not matched!');
                return $this->redirect('login.php');
            }
        }
        return $error;
    }

    public function getUserContent(){
       $getdata = new User();
       return $getdata->data();

    }


    public function userProfileUpdate($request){
        $error = $this->validateRequest($request,
            [
                'username'=>'required',
                'email'=>'required',
                'bio'=>'null',
                'location'=>'null'
            ]);
        if(empty($error)) {
            $user = new User();
            $user->username = $request['username'];
            $user->bio = $request['bio'];
            $user->email = $request['email'];
            $user->location = $request['location'];
            if ($user->update() == true) {
                $this->session->setSession('success','You have updated successfully!');
                return $this->redirect('profile.php');
            }
        }
        return $error;
    }

    public function changeProfileImg($request){

            $user = new User();
            $user->photo = $_FILES['photo']['name'];
            $target_dir = UPLOAD_FILE."profileImg\\";
            $target_file = $target_dir . basename($_FILES["photo"]["name"]);
            if(!empty($user->photo)) {
                if (move_uploaded_file($_FILES['photo']['tmp_name'],$target_file)) {
                    if ($user->update() == true) {
                        $this->session->setSession('success', 'Your profile image has  updated successfully!');
                    }
                } else {
                    $this->session->setSession('danger', 'Your profile image has not updated successfully!'.$target_file);
                }
            }
        return $this->redirect('profile.php');

    }

    public function userAccountUpdate($request){
       $error = $this->validateRequest($request,[
           'new_password'=>'password',
           'confirm_password'=>'password'
       ]);

       if(empty($error)){
           if($request['new_password']==$request['confirm_password']){
               $user = new User();
               $user->password = $request['new_password'];
               if($user->update()==true){
                   $this->session->setSession('success', 'Your password has  updated successfully!');
               }else{
                   $this->session->setSession('danger', 'Your password has not updated!');
               }
               return $this->redirect('account.php');
           }else{
               $error= ['new_password'=>"password has not match, try again!"];
           }
       }
       return $error;

    }

    public function userDeleteAccount($request){
            if(md5($request['check_password'])==Auth::user()->password()){
                $user = new User();
                $user->status = 0;
                if($user->update()==true){
                    Auth::user()->logout();
                }else{
                    $this->session->setSession('danger', 'Your password has not match!');
                }
            }else{
                $this->session->setSession('danger', 'Your password has not match!');
            }
            return $this->redirect('account.php');


    }


}