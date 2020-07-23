<?php
require_once("database.php");
require_once("user.php");
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
if(isset($_GET['id'])){
$id = preg_replace ('/[^0-9]/', '', $_GET['id']);

        $sql ="select * from user";
        $sql .=" where user_id = ";
        $sql .= "'".$id."'";
        $res = $Database->add_query($sql);
        $result = $Database->fetch_array($res);
            $surname = $result['surname'];
            $id = $result['user_id'];
            $mail = $result['email'];
            $pas = $result['password'];
            $email_sent = $result['email_sent'];
     if($email_sent == 0 ){
        $to = $mail;							 
		$from = "Zukasell <auto_responder@zukasell.com>";
		$subject = 'Zukasell Account Activation';
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Zukasell Email Activation</title>        </head>
                <body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px;  background:#333; font-size:24px; color:#CCC;">
                <a href="http://www.zukasell.com"><img src="http://www.zukasell.com/required/zukasell_logo4.png" width="36" height="30" alt="zukasell_logo" style="border:none; float:left;">
                </a>Zukasell Account Activation</div><div style="padding:24px; font-size:17px;">Hello '.$surname.',<br /><br />Click the link below to activate your account when ready:<br />
                <br /><a href="http://www.zukasell.com/confirm/'.$pas.'/'.$id.'/'.$mail.'">Click here to activate your account now</a><br />
                <br />Login after successful activation using your:<br />* E-mail Address: <b>'.$mail.'</b></div></body></html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		if(mail($to, $subject, $message, $headers)){
		$sent = 1;
		$sql = "UPDATE user SET ";
        	$sql .="email_sent='".$sent."'";
                $sql .= " where user_id = ";
                $sql .= "'".$id."'";
        	$res = $Database->add_query($sql);
        echo '<div style="margin-top:15px; border: 4px solid white; width: 60%; margin-left: 10%; background-color:pink"><p> Please confirm your account. An email has been sent to '.$mail.' </p></div>';
		}
		}
}

?>