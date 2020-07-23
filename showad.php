<?php
$id = $_GET['ad_id'];
require_once("database.php");
require_once("user.php");
require_once("header.php");
require_once("buyandsellpost.php");
?>
<!DOCTYPE html>
<html lang="en">	
<head>
	<meta charset="utf-8" />
	<title>Create Ad Page</title>
	<link type="text/css" rel="stylesheet" href="css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
</head>

<body class="content" style="background-color:#949d85; width:100% ; ">
      
 <div class="show_ad_content" >
<?php

$buy = new buyandsell();

$buy->show_ad($id);

?>

<div style="margin-top:20px">
<?php 
//$buy->show_familiar($id);
?>
</div>

</div>
<div style="clear:both"></div>
</body>
<?php require_once('footer.php');?>
</html>
        