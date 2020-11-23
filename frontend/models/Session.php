<?php
namespace Models;
require_once  dirname(__DIR__, 2).'/autoload.php';
Class Session{
    private $message;

    public function setSession($status, $value){
       $_SESSION[$status]=$value;
        $this->message = $value;
       return true;
    }
    public function getSessionVariable($status){
        if(isset( $_SESSION[$status])){
            return true;
        }else{
            return false;
        }
    }
    public function getMessage($status){
        $statusLen=count($status);
        $message='';
        for ($i=0;$i<$statusLen;$i++) {
            if (isset($_SESSION[$status[$i]])) {
                $message .= '<div class="alert alert-' . $status[$i] . ' alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>' . ucfirst($status[$i]) . '! </strong>' . $_SESSION[$status[$i]] . '</div>';
            }
        }
        return $message;
    }
    public function unsetSession($status){
        $statusLen=count($status);
        for ($i=0;$i<$statusLen;$i++){
            unset($_SESSION[$status[$i]]);
        }
       return;

    }

}
