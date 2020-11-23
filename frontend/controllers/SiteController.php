<?php
namespace Controllers;
//require_once  dirname(__DIR__, 2).'/autoload.php';
require_once 'Controller.php';
use Models\ContactUs;
use Models\Session;
use Controllers\Controller;

class SiteController extends Controller
{
    public $session;
    public function __construct()
    {
        $this->session = new Session();
    }

    public function index($request){
       date_default_timezone_set("Asia/Kolkata");
       $error = $this->validateRequest($request);
       if(empty($error)) {

           $insertObj = new ContactUs();
           $insertObj->name=$request['name'];
           $insertObj->email=$request['email'];
           $insertObj->phone=$request['phone'];
           $insertObj->message=$request['message'];
           $insertObj->created_at=date('Y-m-d h:i:s');
           $insertObj->updated_at=date('Y-m-d h:i:s');
           if ($insertObj->insert() == true) {
               $this->session->setSession('success','You have submitted contact form successfully!');
               return $this->redirect($_SERVER['HTTP_REFERER']);
           }
       }
           return $error;
    }

    public function validateRequest($request){

        $error = [];
        foreach ($request as $key=>$value){
            if($value=='') {
                $error[$key] = ucfirst($key) . ' is required';
            }
        }
        return $error;
    }

}