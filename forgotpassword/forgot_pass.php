<?php
session_start();
require_once("../session.php");
require_once("../database.php");
require_once("../user.php");
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
	
</head>
<body  style="background-color:#5c5c3d; width:100% ; ">
 <a href="<?php echo $Database->address ?>"><img  class="logo" src="<?php echo $Database->address ?>required/zukasell_logo4.png" /></a>
<div class="fpassword_container" style="background-color:white; margin-top:30px">
<div  style="width:100% ">
    <?php
    if(isset($_GET['email']) && isset($_GET['p'])){
	$email = $Database->escape_value($_GET['email']);
	$temppasshash = preg_replace('#[^a-z0-9]#i', '', $_GET['p']);
	if(strlen($temppasshash) < 10){
		exit();
	}
	$sql = "SELECT id FROM useroptions WHERE email='$email' AND temp_pass='$temppasshash' LIMIT 1";
	$res = $Database->add_query($sql);
	$numrows = $Database->num_rows($res);
	if($numrows == 0){
		echo "There is no match for that username with that temporary password in the system. We cannot proceed.";
    	exit();
	} else {
		$row = mysqli_fetch_row($query);
		$id = $row[id];
		$sql = "UPDATE users SET password='$temppasshash' WHERE email='$email' LIMIT 1";
	    $res = $Database->add_query($sql);
		$sql = "UPDATE useroptions SET temp_pass = '' WHERE email='$email' LIMIT 1";
	    $result = $Database->add_query($sql);
            echo '<p>You can now login into your account with the temporary password provided </p>';
	    echo '<a href="login.php"> Login </a>';
        exit();
    }
}
?>
</div>
</div>
</body>