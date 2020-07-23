<?php
session_start();
require_once("../session.php");
require_once("../database.php");
require_once("../user.php");
if(isset($_SESSION['user_id'])){
              unset($_SESSION['user_id']);
	      $session->user_id = '';
              session_destroy();
             
              }
  
if(isset($_POST['submit'])){
        $email = $Database->escape_value($_POST['email']);
        $sql = "select user_id from user where email = ";
        $sql .= "'". $email ."'";
        $res = $Database->add_query($sql);
        $numrow = $Database->num_rows($res);
        
        if($numrow > 0){
            while($result = $Database->fetch_array($res)){
                $id = $result['user_id'];
            }
            $emailcut = substr($email, 0, 4);
		$randNum = rand(10000,99999);
		$tempPass = "$emailcut$randNum";
		$hashTempPass = md5($tempPass);
		$sql = "UPDATE useroptions SET temp_pass='$hashTempPass' WHERE email='$email' LIMIT 1";
	    $res = $Database->add_query($sql);
		$to = "$email";
		$from = "auto_responder@zukasell.com";
		$headers ="From: $from\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
		$subject ="Zukasell Login Temporary Password";
		$msg = '<p>This is an automated message from Zukasell.com. If you did not recently initiate the Forgot Password process, please disregard this email.</p>
                <p>You indicated that you forgot your login password. We can generate a temporary password for you to log in with, then once logged in you can change your password to anything you like.</p>
                <p>After you click the link below your password to login will be:<br /><b>'.$tempPass.'</b></p><p>
                <a href="http://www.zukasell.com/forgotpassword/forgot_pass.php?email='.$email.'&p='.$hashTempPass.'">Click here now to apply the temporary password shown below to your account</a></p>
                <p>If you do not click the link in this email, no changes will be made to your account. In order to set your login password to the temporary password you must click the link above.</p>';
		
                if(mail($to,$subject,$msg,$headers)) {
			echo "success";
			exit();
		} else {
			$message = "email_send_failed";
			exit();
		}
    } else {
	 $message = "The email you entered does not exist on our database";
	}
        
    }
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">	
<head>
	<meta charset="utf-8" />
	<title>Zukasell forgot Password</title>
	<link type="text/css" rel="stylesheet" href="../css/main.css">
 <script type="text/javascript" src="../functions/functions.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<script type="text/javascript">
	 function sanitize() {
	if(document.forms['fpassform']['email'].value ==''){
	 document.forms['fpassform']['email'].style.border = "2px solid red";
	 return false;
	}
	 }
	</script>
</head>
<body  style="background-color:#5c5c3d; width:100% ; ">
 <a href="<?php echo $Database->address ?>"><img  class="logo" src="<?php echo $Database->address ?>required/zukasell_logo4.png" /></a>
<article class="fpassword_container">
    <div style="text-align: center; background-color: grey; width: 90%;">
<h1>Zukasell.com</h1>

<div  style=" text-align: center">
	<?php
	
if(isset($message)){
echo '<strong style="padding:5px; background-color:white; color: red; margin-left: 8%">'.$message.'</strong>';
}
?>
    <p style="text-align:left; margin-left: 5%">A link will be sent to the email provided to recover your password</p>
    
    <form method="post" name="fpassform"  onsubmit="return sanitize()" >
        <table style=" margin-left: 5%; width: 90%;">
            <tr>
                <td> <input type="text" name="email" style="width: 100%; height:30px" placeholder="Enter Your Registered Email" />
                </td>
                </tr>
        </table>
	<div style="margin-top: 10px; margin-bottom: 10px">
                <input type="submit" value="Submit" name="submit" class="loginPage_signin" />
            </div>
    </form>
    
    </div>
    </div>
</article>
<div style="margin-bottom:10%; text-align: center">
    <div class="loginPage_signup" style="background-color: white; "><a href="<?php echo $Database->address ?>signup.php"><p>Sign Up</p></a></div>
     <div class="loginPage_fpass" style=" background-color: brown; "><a href="<?php echo $Database->address ?>login.php" style="color:white"><p>Sign In</p></a></div>
   </div>
       
 </div> 
</body>