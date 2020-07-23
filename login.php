<?php
session_start();
require_once("database.php");
require_once("user.php");
require_once('session.php');
require_once("buyandsellpost.php");
require_once ('src/Facebook/autoload.php');
require_once ('src/Facebook/facebook.php');
// sanitizing inputs from user to procession for insertion into database
//.............................
if(isset($_POST['Signin'])){
              //echo "Log in through your mobile phone. desktop version under maintenance"; 
              
 $email = $Database->escape_value($_POST['email']);
 $pass = $Database->escape_value($_POST['pass']);
 $location = $_POST['location'];
$user = new User();
$user->authenticate($email,$pass,$location);
if($user->message != ""){
$message = $user->message;
}

}
$config = array (
  'app_id' => '151719905366343',
  'app_secret' => 'f4603201285f193d0f52e241cf4279e1',
  'default_graph_version' => 'v2.8'
);
$fb = new Facebook\Facebook ($config);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email','public_profile']; // optional	
try {
	if (isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	echo 'Graph returned an error: ' . $e->getMessage();
  	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
 }
if (isset($accessToken)) {
	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} else {
		// getting short-lived access token
		$_SESSION['facebook_access_token'] = (string) $accessToken;

	  	// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();

		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

		// setting default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}

	// redirect the user back to the same page if it has "code" GET variable
	if (isset($_GET['code'])) {
		header('Location: http://www.zukasell.com/login.php');
	}
	// getting basic info about user
	try {
		$profile_request = $fb->get('/me?fields=name,first_name,last_name,email,id');
		$profile = $profile_request->getGraphUser();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		// redirecting user back to app login page
		header("Location: ./");
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	
	// printing $profile array on the screen which holds the basic info about user
	$surname= $profile['last_name'];
	$othernames= $profile['first_name'];
       if($profile['email'] != ''){
        $email = $profile['email'];	
       }else{
       $email = "";
       }
	$id = $profile['id'];     
  	// Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
	if($id != 0){
	$sql = "select user_id from user where fb_id = ";
	$sql .= "'".$id."'";
        $sql.= " OR email = ";
        $sql .= "'".$email ."'";
	$res = $Database->add_query($sql);
	$result = $Database->fetch_array($res);
	$numrow = $Database->num_rows($res);
	if($numrow > 0) {
	$_SESSION['user_id'] = $result['user_id'];
       if (!file_exists("uploads/$id")) {
         if (!file_exists("uploads/$email")){
			mkdir("uploads/$id", 0755);
		}
       }
      if(isset($_SESSION['serveraddress'])){
		$location = $Database->address.$_SESSION['serveraddress'];
		$url=  $location;
     }else{
     $url = $Database->address;
      }
	$Database->redirect_to($url);
	}else{
	$sql = "INSERT into user (surname, othernames,fb_id,email)";
        $sql .= "VALUES ('$surname', '$othernames','$id','$email')";
	if($resi = $Database->add_query($sql)){
	$sql = "select user_id from user where fb_id = ";
	$sql .= "'".$id."'";
	$res = $Database->add_query($sql);
	$result = $Database->fetch_array($res);
	$_SESSION['user_id'] = $result['user_id'];
      if (!file_exists("uploads/$id")) {
         if (!file_exists("uploads/$email")){
			mkdir("uploads/$id", 0755);
		}
       }
	if(isset($_SESSION['serveraddress'])){
		$location = $Database->address.$_SESSION['serveraddress'];
		$url=  $location;
     }else{
     $url = $Database->address;
      }
	$Database->redirect_to($url);
	}	
	}
	}
}  
 else {
	// replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
	$loginUrl = $helper->getLoginUrl('http://www.zukasell.com/login.php', $permissions);
	$output = '<div style=""><a href="' . htmlspecialchars($loginUrl) . '"><img src="required/login.png" style="width:300px; height:50px" /></a></div>';
}
?>  
<!DOCTYPE html>
<html lang="en">	
<head>
	<meta charset="utf-8" />
     <title>Zukasell- Login Page  </title> 
        <meta name="description" content="Login into Zukasell.com ...." />
	<link type="text/css" rel="stylesheet" href="css/main.css">
 <script type="text/javascript" src="functions/functions.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
</head>
<body class="content" style="background-color:#5c5c3d; width:100% ; ">
<a href="<?php echo $Database->address ?>"><img  class="logo" src="required/zukasell_logo4.png" /></a>
<article class="loginPage_article">
    <div style="text-align: center">
    <div  class="loginPage_article" style="text-align: center">
     <?php 
       echo $output;
      
      ?>
		<span style="color:white">Or</span>
      <?php if(isset($message)){
       echo '<div style="background-color:white; color:red;padding:3px; width:40%; margin-left:30%">'.$message.'</div>';
      }
        ?>
        <form name="sign_in_form" method="post" onsubmit="return signin_validate()">
            <div style="">
            <label style="border:1px solid grey; padding: 10px 15px;background-color:brown; color:white ">@</label>
            <input type="email" placeHolder="Email" class="loginPage_input" name="email"/>
            </div>
            <div style="margin-top: 10px">
            <label style="border:1px solid grey; padding: 10px 16.5px; background-color:brown; color:white ">P</label>
            <input type="password" placeHolder="Password" class="loginPage_input" name="pass" />
	    <input type="hidden" name="location" 
	    <?php if(isset($_GET['loc'])){
		$location = $Database->address.$_SESSION['serveraddress'];
		$url=  $location;
		?> value="<?php
	    echo $url;
	    } ?>" />
            </div>
            
            <div style="margin-top: 20px;">
                <input type="submit" value="Sign in" name="Signin" class="loginPage_signin" />
            </div>
	    </form>
            <div class="loginPage_signup" style="background-color: white"><a href="<?php echo $Database->address ?>signup.php"><p>Sign Up</p></a></div>
            <div class="loginPage_fpass" style=" background-color: brown; "><a href="<?php echo $Database->address ?>forgotpassword/" style="color:white"><p>Forgot Password</p></a></div>
       
    </div>
</div>

</article>
<div style="margin:15px 0 5px 0; padding-top:25px ">
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
</body>
<?php require_once('footer.php');?>
</html>