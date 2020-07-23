<?php
session_start();
require_once("database.php");
require_once("user.php");
require_once("session.php");
require_once("buyandsellpost.php");
require_once ('src/Facebook/autoload.php');
require_once ('src/Facebook/facebook.php');
use Facebook\FacebookRequset;
// sanitizing inputs from user to procession for insertion into database
//.............................
?>
<!DOCTYPE html>
<html lang="en">	
<head>
	<meta charset="utf-8" />
	<title>Create Ad Page</title>
	<link type="text/css" rel="stylesheet" href="css/main.css">
 <script type="text/javascript" src="functions/functions.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
</head>

<body class="content" style="background-color:#5c5c3d; width:100% ; ">
    

<div class="b_Add_Container" >
<?php
$id = preg_replace('/[^0-9]/','',$_GET['id']);
$sql = "select * from goodsandservices where ad_id = ";
$sql .= "'".$id."'";
$res = $Database->add_query($sql);
while($result = $Database->fetch_array($res)){
$adname = $result['adname'];
$desc = $result['description'];
$picture_user_id = $result['user_id'];
$Database->address = 'www.zukasell.com/';
$user = new User();
$user->find_by_mail($picture_user_id);
if($result['file_name'] != ""){
$source = $Database->address." uploads/".$user->email."/".$result['file_name'];
}elseif($result['file_name2'] != ""){
$source = $Database->address." uploads/".$user->email."/".$result['file_name2'];	 
}elseif($result['file_name3'] != ""){
$source = $Database->address." uploads/".$user->email."/".$result['file_name3'];		 
}elseif($result['file_name4'] != ""){
$source = $Database->address." uploads/".$user->email."/".$result['file_name4'];	 
}elseif($result['file_name5'] != ""){
$source = $Database->address." uploads/".$user->email."/".$result['file_name5'];		 
}elseif($result['file_name6'] != ""){
$source = $Database->address." uploads/".$user->email."/".$result['file_name6'];		 
}

 $category = $result['category'];
 
        if($category == "Fashion & Beauty"){
            $pageAdrress = $Database->address."Fashion and Beauty/";
        }elseif($category == "Mobile Phones and Tablet"){
            $pageAdrress = $Database->address."Mobile phones and Tablets/";
        }
        elseif($category == "Vehicle"){
            $pageAdrress = $Database->address."Vehicle/";
        }
         elseif($category == "Electronics"){
            $pageAdrress = $Database->address."Electronics/";
         }
         elseif($category == "Home,Furniture and Garden"){
            $pageAdrress = $Database->address."Home,Furniture/";
         }
         elseif($category == "Real Estate"){
            $pageAdrress = $Database->address."Real Estate/";
         }
         elseif($category == "Real Estate"){
            $pageAdrress = $Database->address."Real Estate/";
        }else{
            $pageAdrress = $Database->address."Jobs and Services/";
        }
      $sanitized_adname = str_replace(" ","-",$result['adname']);
      $message= $adname;
  $link = $pageAdrress.$id."/".$sanitized_adname;
$config = array (
  'app_id' => '151719905366343',
  'app_secret' => 'f4603201285f193d0f52e241cf4279e1',
  'default_graph_version' => 'v2.4'
);
$fb = new Facebook\Facebook ($config);
$helper = $fb->getCanvasHelper();
$permissions =['email','publish_actions'];
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
  try {
		$request = $fb->get('/me');
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		if ($e->getCode() == 190) {
		 	unset($_SESSION['facebook_access_token']);
			$helper = $fb->getRedirectLoginHelper();
			$loginUrl = $helper->getLoginUrl('http://localhost:7080/project/login.php', $permissions);
			echo "<script>window.top.location.href='".$loginUrl."'</script>";
			exit;
		}
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	
	try {
		// message must come from the user-end
        $data = [
        'link' => $link,
	'message' => $message,
	'description' => $desc,
	'picture' => $source,
        ];
       $request = $fb->post('/me/feed',$data);
       echo "successfully Posted ";
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
}else {
	$helper = $fb->getRedirectLoginHelper();
	$loginUrl = $helper->getLoginUrl('http://localhost:7080/project/login.php', $permissions);
	echo "<script>window.top.location.href='".$loginUrl."'</script>";
}

 }

 ?>
