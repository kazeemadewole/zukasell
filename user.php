<?php
require_once("database.php");
require_once("session.php");
class User {
    protected static $table_name = "user";
    public $user_id;
    public $surname;
    public $othernames;
    public $email;
    public $gender;
    public $message;
    public $fullname;    
    public $activated;
    public $sent;
    public static $birthday;
    public static $country;
    public static  $state; 
     public static $home_country;
    public static  $home_state;
    public static  $cur;
    public static $phone;
     public static $username;
    private  $password;
    private $cpassword;
    public $tem_file;
    public $file_name;
    public $upload_error = array(
        UPLOAD_ERR_OK => "Photo uploaded successfully",
        UPLOAD_ERR_INI_SIZE => "larger than upload_max_filesize",
        UPLOAD_ERR_FORM_SIZE => "Larger than form MAX_FILE_SIZE",
        UPLOAD_ERR_PARTIAL => "Partial Upload",
        UPLOAD_ERR_NO_FILE => "No File selected, please select a file and re-upload",
        UPLOAD_ERR_NO_TMP_DIR => "No Temporary Directory",
        UPLOAD_ERR_CANT_WRITE => "Can't write to disk",
        UPLOAD_ERR_EXTENSION => "File upload stopped by externsion"
        
    );
    public $error = array();
    public function attributes(){
        return get_object_vars($this);
    }
    public function sanitized_attributes(){
        global $Database;
        $cleaned_attributes = array();
        foreach($this->attributes() as $key => $value){
            $cleaned_attributes[$key] = $Database->escape_value($value);
        }
        return $cleaned_attributes;
    }
      public function attach_file($file){
        global $Database;
        if(!$file || empty($file)|| !is_array($file)){
            $this->error[] = "No file was uploaded";
            return false;
        }
        elseif($file['error']!=0){
            $this->error[] = $this->upload_error[$file['error']];
            return false;
        }else{
        $this->tem_file = $file['tmp_name'];
        $this->file_name = basename($Database->escape_value($file['name']));
        return true;
        }
    }
    public function find_all(){
        global $Database;
        $result = $Database->query("select * from user");
        return $result;
    }
    public function find_by_id($id){
        global $Database;
        $result = $Database->add_query("select * from" .self::$table_name. "where id=$id");
        $found = $Database->fetch_array($result);
        return $found;
    }
    
    public function reg(){
        global $Database;
        global $session;
         $this->surname = $Database->escape_value(ucfirst($_POST['surname']));   
         $this->othernames =$Database->escape_value(ucfirst( $_POST['othernames']));
         $this->email = $Database->escape_value(strtolower($_POST['email']));
         $this->password = $Database->escape_value(strtolower($_POST['password']));
         $this->cpassword = $Database->escape_value(strtolower($_POST['cpassword']));
         if(empty($this->email)){
            echo "<strong style='color:red'> Email field can not be empty</strong>";
            return false;
         }       
         if(empty($this->surname)){
            echo "<strong style='color:red'> Your surname is important</strong>";
            return false;
         }
         if(empty($this->othernames)){
            echo "<strong style='color:red'> You must fill in the othernames field</strong>";
            return false;
         }
         if(empty($this->password)){
            echo " <strong style='color:red'>Password field is very important</strong>";
            return false;
         }
         if ($this->password != $this->cpassword){
            echo "<strong style='color:red'> Password does not match each other</strong>";
            return false;
         }
         if($this->password == $this->cpassword){
         $this->password = md5($this->password);
         }
         if(!empty($this->email)){
         $sql ="select * from ".self::$table_name;
        $sql .=" where email = ";
        $sql .= "'".$this->email."'";
        $res= $Database->add_query($sql);
        if($Database->num_rows($res) > 0){
            echo "The email address is already in use";
        }
        else{ 
        $sql = "INSERT into ".self::$table_name."(surname, othernames,email,password)";
        $sql .= "VALUES ('$this->surname', '$this->othernames','$this->email','$this->password')";
        if($Database->add_query($sql)){
          $sql = "select * from user";
          $sql .= " where email = ";
          $sql .="'".$this->email."'";
          $res = $Database->add_query($sql);
          $result = $Database->fetch_array($res);
          $this->user_id = $result['user_id'];
                 
          
                $sql = "select id from useroptions";
                $sql .= " where email = ";
                $sql .= "'". $this->email ."'";
                $sql .= " limit 1";
                $res = $Database->add_query($sql);
                if($Database->num_rows($res) == 0){
            $sql = "INSERT into useroptions (email)";
            $sql .= "VALUES ('$this->email')";
            $Database->add_query($sql);
            
		if (!file_exists("uploads/$this->email")) {
			mkdir("uploads/$this->email", 0755);
		}
                }
             $url = $Database->address.'strup/'.$this->user_id;
          $Database->redirect_to($url);
            return true;
        
        }else{
            return false;
        }
        
        }
    }
    }
    
     public  function update(){
        global $Database;
        global $session;
      
        User::$birthday = $_POST['days']."-".$_POST['month']."-". $_POST['year'];
        User::$country = $Database->escape_value(ucfirst($_POST['rescountry']));
        User::$state = $Database->escape_value(ucfirst($_POST['resstate']));
        User::$home_country = $Database->escape_value(ucfirst($_POST['homecountry']));
        User::$home_state = $Database->escape_value(ucfirst($_POST['homestate']));
        User::$cur = $Database->escape_value(ucfirst($_POST['currentcity']));
        User::$phone = $_POST['phonenumber'];
        if(empty(User::$birthday)){
            echo "<strong style='color:red'> Select your birthday date</strong>";
            return false;
         }
         if(empty(User::$country)){
            echo "<strong style='color:red'> You need to fill in the current_country field </strong>";
            return false;
         }
         if(empty(User::$state)){
            echo "<strong style='color:red'> You must fill in the current_state field </strong>";
            return false;
         }
          
         if(empty(User::$home_state)){
            echo "<strong style='color:red'> You must fill in the home_state field</strong>";
            return false;
         }
         
         /*if(empty(User::$cur)){
            echo "<strong style='color:red'> Current city field is important</strong>";
            return false;
         }*/
         if(empty(User::$phone)){
            echo "<strong style='color:red'> Please provide a valid phone number</strong>";
            return false;
         }
        $sql = "UPDATE user SET ";
        $sql .="birthday='".User::$birthday."', ";
        $sql .="state='".User::$state."', ";
        $sql .="country='".User::$country."', ";
         $sql .="home_country='".User::$home_country."', ";
        $sql .="home_state='".User::$home_state."', ";
        $sql .="currentcity='".User::$cur."', ";
        $sql .="phonenumber='".User::$phone."'";
        $sql .= " where user_id= ";
        $sql .= "'".$_SESSION['user_id']."'";
      $result=$Database->add_query($sql);
     if($result && $Database->affected_rows($result)>0){
        
        $Database->redirect_to("home.php");
    }
     }
    public function insert_dp(){
        $temp = $_FILES['dp_photo']['tmp_name'];
        $target_file = basename($_FILES['dp_photo']['name']);
        $this->find_by_mail($_SESSION['user_id']);
    
        $upload_dir = "uploads/".$this->email;
        
        if(move_uploaded_file($temp,$upload_dir."/".$target_file)){
            $message = "File uploaded successfully";
        }else{
            $message = $upload_error[$error];
        }
    }
      public function find_by_mail($id){
        global $Database;
     
        $sql ="select * from ".self::$table_name;
        $sql .=" where user_id = ";
        $sql .= "'".$id."'";
        $res = $Database->add_query($sql);
        while($result = $Database->fetch_array($res)){
            $this->surname = $result['surname'];
            $this->othernames = $result['othernames'];
       $dir_fb = $Database->address."uploads/".$result['fb_id'];
      $dir_email = $Database->address."uploads/".$result['email'];
         if($result['fb_id'] != 0 ){
            if(file_exists($dir_fb)){
              $this->email = $result['fb_id'];  
            }else{
                 
                    $this->email = $result['email'];
                 
            }
            
         }else{
            $this->email = $result['email'];
         
         }
            
        }
    }
    public function authenticate($email,$pass,$location){
        global $Database;
        global $session;
        $email = strtolower($email);
        $pass = strtolower($pass);
        $sql ="select * from user";
        $sql .=" where email = ";
        $sql .= "'".$email."'";
        $res = $Database->add_query($sql);
        while($result = $Database->fetch_array($res)){
          $surname = $result['surname'];
            $mail = $result['email'];
            $pas = $result['password']; 
            $id = $result['user_id'];
         if(($email == $mail)) {  
       if(($result['activation'] == 0) && ($result['email_sent'] == 1)){
       $this->message = "Please Confirm your Email first, an activation link had been sent to your mail"; 
       return false;
       } 
     if(($result['activation'] == 0) && ($result['email_sent'] == 0)){  
           
        $to = $mail;							 
		$from = "Zukasell <auto_responder@zukasell.com>";
		$subject = 'Zukasell Account Activation';
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Zukasell Email Activation</title>        </head>
                <body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px;  background:#333; font-size:24px; color:#CCC;">
                <a href="http://www.zukasell.com"><img src="http://www.zukasell.com/required/zukasell_logo4.png" width="36" height="30" alt="zukasell_logo" style="border:none; float:left;">
                </a>Zukasell Account Activation</div><div style="padding:24px; font-size:17px;">Hello '.$surname.',<br /><br />Click the link below to activate your account when ready:<br />
                <br /><a href="http://www.zukasell.com/confirm/'.$pas.'/'.$id.'/'.$mail.'">Click here to activate your account now</a><br />
                <br />Login after successful activation using your:<br />* E-mail Address: <b>'.$mail.'</b></div></body></html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		if(mail($to, $subject, $message, $headers)){
		$sent = 1;
		$sql = "UPDATE user SET ";
        	$sql .="email_sent='".$sent."'";
                $sql .= " where user_id = ";
                $sql .= "'".$id."'";
        	$res = $Database->add_query($sql);
        $this->message = "Check your email to confirm your account first";
		}
     return false;

      }  
  
    }       
        $pass = md5($pass);
        if(($email == $mail)&&($pass == $pas)) {
          $_SESSION['user_id'] =  $result['user_id'];
          $session->user_id = $_SESSION['user_id'];
          if($location != ''){
               $Database->redirect_to($location);              
               return true;
          }else {
            $Database->redirect_to($Database->address);
          }
        }else{
            $this->message = "Incorrect email or password";
            return false;
        }
        }
    }
    public function fullname(){
        return $this->surname." ". $this->othernames;
    }
     public function update_dp(){
        global $Database;
        $sql = "UPDATE user SET ";
        $sql .="file_name='".$this->file_name."' ";
        $sql .= " where user_id= ";
        $sql .= "'".$_SESSION['user_id']."'";
        $result = $Database->add_query($sql);
       
         return true;
    }
     public function save_dp($email){
            if(!empty($this->error)){
                return false;
            }
            if(empty($this->file_name) || empty($this->tem_file)){
                $this->error[] = "The file location was not available";
                return false;
            }
            //$this->find_by_mail($_SESSION['user_id']);
    
        $upload_dir = "uploads/".$email;
        $upload_to_mobile = "m/uploads/".$email;
             //$target_file = $upload_dir."/".$this->file_name;
             $mobile_target_file = $upload_to_mobile ."/" .$this->file_name;
            if(file_exists($target_file)){
                $this->error[] = "The file ".$this->file_name." already exists";
                return false;
            }
  
         if(move_uploaded_file($this->tem_file,$mobile_target_file)){
         	
                 if($this->update_dp()){
                 unset($this->tem_file);
                  return true;
                 }
        }else{
                $this->error[] = " File upload failed";
                return false;
            }
      }
      public function authent($user){
        global $Database;
       
        $sql ="select * from ".self::$table_name;
        $sql .=" where user_id = ";
        $sql .= "'".$user."'";
        if($res = $Database->add_query($sql)){
                  $Database->redirect_to("home.php"); 
        }
        
        
        
        
        
    }
   
}


?>