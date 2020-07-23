<?php
session_start();
require_once('header.php');
require_once('buyandsellpost.php');
require_once('session.php');
if($session->user_id == 0){
	$url = $Database->address.'login.php?loc='.$_SERVER['REQUEST_URI'];
	$_SESSION['serveraddress']= $_SERVER['REQUEST_URI'];
	$Database->redirect_to($url);
}else{
	if(isset($_SESSION['serveraddress'])){
		unset($_SESSION['serveraddress']);
	}
}
?>
<!DOCTYPE html>
<html lang="en">	
<head>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="css/main.css">
	<script type="text/javascript" src="http://www.zukasell.com/functions/functions.js"></script>
	<script type="text/javascript" src="http://www.zukasell.com/functions/jquery-3.1.1.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	    
</head>
<body>
<div class="myads_main_div" >
    <p class="loginPage_signin">My Ads</p>
<div class="myads_div">
    <?php 
$buy =  new buyandsell();
$buy->select_for_myads($session->user_id);
?>
</div>
</div>
</body>
<?php require_once('footer.php');?>
</html>
