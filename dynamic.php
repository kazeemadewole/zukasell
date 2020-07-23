<?php
require_once('database.php');
require_once('session.php');
require_once('buyandsellpost.php');
$cati = $_GET['cati'];
$answer = $_GET['id'];
$maker = $_GET['maker'];
$loc = $_GET['loc'];
$cat = $_GET['cat'];
$url=  $Database->addnew.$loc;
?>
<!DOCTYPE html>
<html lang="en">	
<head>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="../css/main.css">
	<script type="text/javascript" src="../functions/functions.js"></script>
</head>        

<div>
    <a href="<?php echo $url ?>"><p><?php echo $cat ?></p></a>
    <?php
$buy = new buyandsell();
$buy->select_for_maker($cati,$maker,$answer);

?>
</div>