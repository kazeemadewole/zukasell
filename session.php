<?php
require_once("user.php");
require_once("database.php");
class Session {
    private $logged_in = false;
    public $user_id;
    public $message;
    public function start_login(){
        
        $this->check_login();
      
        
    }
  
    private function check_login(){
        global $Database;
        if(isset($_SESSION['user_id'])){
            $this->user_id = $_SESSION['user_id'];
            $this->logged_in= true;
        }else{
            $this->user_id = 0;
        }
    }
    public function sess($mag){
        if(!empty($mag)){
            $_SESSION['email']= $mag; 
        }
    }
    public function is_logged_in(){
        return $this->logged_in;
    }
    public function login($user){
        if($user){
            $this->user_id = $_SESSION['user_id'];
            $this->logged_in= true;
        }
    }
    public function log_out(){
        global $Database;
        if(isset($_SESSION['user_id'])){
        unset($_SESSION['user_id']);
        unset($this->user_id);
        unset($_SESSION['facebook_access_token']);
        $this->logged_in= false;
        $url = $Database->address;
        $Database->redirect_to($url);
        }
    }
    public function check_message(){
      if (isset($_SESSION['message'])){
        $this->message= $_SESSION['message'];
        unset($_SESSION['message']);
      }else{
        $this->message = "";
      }
    }
    public function message($msg=""){
        if(!empty($msg)){
            $_SESSION['message'] = $msg;
        }
        else{
            return $this->message;
        }
    }
}
$session =  new Session();
?>