<?php
session_start();
require_once("database.php");
require_once("user.php");
require_once("session.php");

?>
<!DOCTYPE html>
<html lang="en">	
<head>
	<meta charset="utf-8" />
	<title>Create Ad Page</title>
	<link type="text/css" rel="stylesheet" href="http://www.zukasell.com/css/main.css">
 <script type="text/javascript" src="http://www.zukasell.com/functions/functions.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
</head>
<body class="content" style="background-color:#5c5c3d ">
      <a href="<?php echo $Database->address ?>"><img  class="logo" src="http://www.zukasell.com/required/zukasell_logo4.png" /></a>
<div style=" width: 100%; margin-top:50px; min-height:300px; text-align: center; margin-left:10%">
<?php 
if(isset($_GET['user_id'])){
    $id = preg_replace('/[^0-9]/','',$_GET['user_id']);
}
if(isset($_GET['e'])){
$email = preg_replace('#[^0-9a-zA-Z@_.-]#i', '', $_GET['e']);
}
if(isset($_GET['p'])){
$pass = $Database->escape_value($_GET['p']);
}
if(isset($_GET['p']) && isset($_GET['e']) && isset($_GET['user_id'])){
        $sql = "select user_id from user";
         $sql .=" where email = ";
        $sql .= "'".$email."'";
        $sql .= " and password = ";
        $sql .= "'". $pass ."'";
        $sql .= " and user_id = ";
        $sql .= "'". $id ."'";
        $sql.= " and activation = 0 ";
        $sql .= " limit 1";
        $res = $Database->add_query($sql);
        $numrow = $Database->num_rows($res);
        if($numrow == 0 ){
            echo '<div style="margin-top:15px; border: 4px solid white; width: 60%; margin-left: 10%; background-color:pink"><p> Your credentials does not match anything on our system</p></div>';
        }
        if($numrow == 1){
        $sql = "UPDATE user SET ";
        $sql .= "activation = 1";
        $sql .=" where email = ";
        $sql .= "'".$email."'";
        $sql .= " and password = ";
        $sql .= "'". $pass ."'";
        if($res = $Database->add_query($sql)){
            
        $sql = "select user_id from user where email = ";
         $sql .= "'".$email ."'";
        $sql .= " and activation = 1";
        $res = $Database->add_query($sql);
        $result = $Database->fetch_array($res);
        if($Database->num_rows($res) == 1){
            $_SESSION['user_id'] = $result['user_id'];
            $session->user_id = $_SESSION['user_id'];
            echo '<div style="margin-top:15px; border: 4px solid white; width: 60%;
            margin-left: 10%; background-color:green">
            <p> Account successfully activated. <br /> You can proceed to  <a href="'.$Database->address .'"> homepage</a></p></div>';
        }
        }
        }
}
    
?>
</div>
</body>