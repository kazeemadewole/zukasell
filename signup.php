<?php
session_start();
require_once("database.php");
require_once("user.php");
require_once("buyandsellpost.php");
// sanitizing inputs from user to procession for insertion into database
//.............................
if (isset($_POST['register'])){
$email = $Database->escape_value($_POST['email']);
 $surname = $Database->escape_value($_POST['surname']);
 if(!empty($surname)){
 if (is_numeric($surname[0])){
  $message= "Your surname cannot start with number";

 }
 }
 if(!empty($email)){
 if(is_numeric($email[0])){
  $message = "Invalid Email address";
    
 }
 }
    $user = new user();
    $user->reg(); 
  
} 
?>
<!DOCTYPE html>
<html lang="en">	
<head>
	<meta charset="utf-8" />
     <title>Zukasell- Sign Up  </title> 
        <meta name="description" content="Sign up to Zukasell" />
	<link type="text/css" rel="stylesheet" href="css/main.css">
 <script type="text/javascript" src="functions/functions.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	 <script type="text/javascript">
	
	  
	 </script>
</head>

<body class="content" style="background-color:#5c5c3d; width:100% ; ">
<a href="<?php echo $Database->address ?>"><img  class="logo" src="required/zukasell_logo4.png" /></a>
<div class="lng" style="margin-top:80px; margin-bottom: 20px; background-color:; border-radius:5px"  >
<div class="signup_signin_box" style="margin-bottom:20px">
 <?php
if(!empty($message) ){
 echo $message;
}
 ?>
    <p style="color: white">You have an Account with us? <span  class="signup_signin" >
    <a href="<?php echo $Database->address ?>login.php"  >Sign in</a></span></p>
</div>

<div id="sign_up">
 
        <form  method="post"  name="formact" onsubmit=" return validate()" >
        <table  class="formclass" cellspacing="15px"  >
            <tr style=" height:30px">
                
                <td><input type="text" name="surname" placeholder="Type your surname"  id="surname" class="signup_input"/></td>
            </tr>
            <tr style=" height:30px">
                <td><input type="text" name="othernames" placeholder="Type your other names here" class="signup_input"  id="othernames"/></td>
            </tr>
            
            <tr style=" height:30px">
                <td><input  type="email" name="email" placeholder="Email" class="signup_input"  id="emailform" /></td>
            </tr>
            <tr style=" height:30px">
                <td><input type="password" name="password" placeholder="Password" class="signup_input"  id="password1"/></td>
            </tr>
            <tr style=" height:30px">
                <td><input type="password"placeholder="Confirm Password" class="signup_input" name="cpassword" id="password2"/></td>
            </tr>            
            <tr >
                
                <td style="padding-left:20%"><input type="submit"  name="register" value="Sign Up" class="loginPage_signin" /></td>
            </tr>
            <strong><span id="errorMessage" style="color: red"></span></strong>
        </table>
    </form>
    
  
 </div> 
<div style="margin:5px 0 ">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- zukasell responsice -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9386381840362693"
     data-ad-slot="6858314767"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>     
 </div> 

</body>
<?php require_once('footer.php');?>
</html>