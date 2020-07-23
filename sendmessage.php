<?php
session_start();
require_once("database.php");
require_once("user.php");
require_once("session.php");
require_once("buyandsellpost.php"); 
$session->start_login();
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
	<link type="text/css" rel="stylesheet" href="http://www.zukasell.com/css/main.css">
	<script type="text/javascript" src="http://www.zukasell.com/functions/functions.js"></script>
	<script type="text/javascript">
		
		
	</script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
</head>
  <?php  
require_once('header.php'); ?>    
<article class="message_box">
	<?php	
      $id = $_GET['id'];
      $post_owner_user = $_GET['user'];
      $location = $_GET['location'];
      
      if(isset($_POST['SendMessage'])){
	$sqlu = "select adname from goodsandservices";
        $sqlu .= " where ad_id = ";
        $sqlu .= "'".$id ."'";
	$sqlu .= " limit 1";
        $resu = $Database->add_query($sqlu);      
        $result = $Database->fetch_array($resu);
            $ad_name = $result['adname'];
	
        $mess = $Database->escape_value($_POST['message']);
        $date = strftime('%Y/-%m/-%d-/%H/-%M/-%S',time());
	$sqly = "select message_id from message_counts";
        $sqly .= " where ad_id = ";
        $sqly .= "'".$id ."'";
	$resy = $Database->add_query($sqly);
	if($Database->num_rows($resy) == 0){
	$sqli = "insert into message_counts ( ad_id,ad_title,sender_user_id,postowner_user_id,date )";
        $sqli .= " values ( ";
	$sqli .= "'".$id."',";
	$sqli .= "'".$ad_name."',";
	 $sqli .= "'".$session->user_id."',";
        $sqli .= "'".$post_owner_user."',";
        $sqli .= "'".$date."'";
        $sqli .= " )";
	$resi = $Database->add_query($sqli);
	}
	
	
        $sql = "insert into ad_message ( ad_id,postowner_user_id,sender_user_id,message,date )";
        $sql .= " values ( ";
	$sql .= "'".$id."',";
        $sql .= "'".$post_owner_user."',";
        $sql .= "'".$session->user_id."',";
        $sql .= "'".$mess."',";
        $sql .= "'".$date."'";
        $sql .= " )";
	$res = $Database->add_query($sql);
      }
        $sql = "select * from goodsandservices";
        $sql .= " where ad_id = ";
        $sql .= "'".$id ."'";
	$sql .= " order by date desc  ";
        $res = $Database->add_query($sql);      
        while($result = $Database->fetch_array($res)){
            $ad_name = $result['adname'];
            $user_id = $result['user_id'];
         $cc = $result['category'];
         $category = str_replace(" ","-", $cc);
	    $cat = $Database->address.$category;
            $url = $Database->address.$location;
      ?>
      <p><a href="<?php echo $cat ?>" style="color: black"><?php echo $result['category']; ?></a>.... <a href="<?php echo $url ?>" style="" >Previous </a> </p>
    <p ><strong><?php echo ucfirst($ad_name); ?></strong></p>
    <?php }
    
       $sql = "select * from ad_message";
        $sql .= " where ad_id = ";
        $sql .= "'".$id ."'";
	$sql .= " and sender_user_id = ";
	 $sql .= "'".$session->user_id ."'";
	 $result = $Database->add_query($sql);
	 if($Database->num_rows($result) >= 1){
		echo '<div style="width:80%">';
		while($fetch_result = $Database->fetch_array($result)){
			
			
		
		echo '<span style=" border-bottom:1px solid grey;padding:5px 0; float:right  ">'.$fetch_result['message'].'</span>';
		
		}
		echo '</div>';
	 }
	
        $res = $Database->add_query($sql); 
    ?>
    <form method="post" name="myform" onsubmit=" return check_form()">
    <textarea name="message" id="message" style="width: 80%; text-align: left;margin-top:10%; height: 200px ;margin-bottom:10%" >
   </textarea>
    <div>
	
    <input type="submit" name="SendMessage" value="Send Message" style=" margin-bottom:10%" />
    </div>
    </form>
</article>
<?php require_once('footer.php');?>