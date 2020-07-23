<?php
session_start();
require_once ('src/Facebook/autoload.php');
require_once ('src/Facebook/facebook.php');
$config = array (

  'app_id' => '1334046413323189',
  'app_secret' => 'cac81f46623544609c245470641ff9a8',
  'default_graph_version' => 'v2.4',
);
$fb = new Facebook\Facebook ($config);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional
	

	if (isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
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
		header('Location: http://www.zukasell.com/fb.php');
	}

	// getting basic info about user
	
		$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
		$profile = $profile_request->getGraphNode()->asArray();
	
	
	// printing $profile array on the screen which holds the basic info about user
	print_r($profile);

  	// Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
	// replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
	$loginUrl = $helper->getLoginUrl('http://www.zukasell.com/fb.php', $permissions);
	echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
}