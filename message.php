<?php
session_start();
require_once('database.php');
require_once('session.php'); 
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
	<link type="text/css" rel="stylesheet" href="css/main.css">
	<script type="text/javascript" src="functions/functions.js"></script>
	<script type="text/javascript" src="functions/jquery-3.1.1.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	    
</head>

<body style="background-color:#5c5c3d">
      <header class="mainHeader">
      <div class="create_ad_page_header">
<div class="home" >
	<a href="<?php echo $Database->address ?>"><img  class="menu_logo" src="../required/zukasell_logo4.png"   /></a>
</div>
<?php
if($session->user_id != 0){
?>
<div style="float: right; margin-right:10%; margin-top:10px">
<div class="dropdown">
	  <?php $user = new User();
	  $user->find_by_mail($session->user_id);
	  echo $user->surname;
	  ?>
	   <div class="dropdown-content">
	    
	    <a href="<?php echo $Database->address ?>myads.php" >
		 <li>Myads</li>
	    </a>
	    
	     <a href="<?php echo $Database->address ?>message.php" >
	    <li>Message</li>
	    </a>
	    <a href="<?php echo $Database->address ?>logout.php" class="lloggedfrontDisplay_create">
	    <li>LogOut</li>
	   </a>
	    
	   </div>
	  </div>	 
	  <a href="<?php echo $Database->address ?>buyandsellad.php" style="color:white" ><span style="padding:5px;  border-radius: 5px; background-color:#d96e26">Create an Ad</span></a>
	
	<?php } ?>  
</div>
</div>
      <div class="mobile_create_ad_page_header">
<div class="home" >
	<a href="<?php echo $Database->address ?>"><img  class="menu_logo" src="../required/zukasell_logo4.png"   /></a>
</div>
<?php
if($session->user_id != 0){
?>
<div style="float: right; margin-right:10%; margin-top:10px">
<div class="dropdown">
	  <?php $user = new User();
	  $user->find_by_mail($session->user_id);
	  echo $user->surname;
	  ?>
	   <div class="dropdown-content">
	    
	    <a href="<?php echo $Database->address ?>myads.php" >
		 <li>Myads</li>
	    </a>
	    
	     <a href="<?php echo $Database->address ?>message.php" >
	    <li>Message</li>
	    </a>
	    <a href="<?php echo $Database->address ?>logout.php" class="lloggedfrontDisplay_create">
	    <li>LogOut</li>
	   </a>
	    
	   </div>
	  </div>	 
	  <a href="<?php echo $Database->address ?>buyandsellad.php" style="color:white" ><span style="padding:5px;  border-radius: 5px; background-color:#d96e26">Create an Ad</span></a>
	
	<?php } ?>  
</div>
</div>
    
  
</header>
    <div  class="message_box_div">
	<p class="loginPage_signin">Message</p>
        <div id="message_box">
            <?php
	
               $sql = "select * from message_counts";
        $sql .= " where sender_user_id = ";
	 $sql .= "'".$session->user_id ."'";
         $sql .= " or postowner_user_id = ";
         $sql .= "'".$session->user_id ."'";         
         $sql .= "  ORDER BY date DESC";
         $res = $Database->add_query($sql);
         if($Database->num_rows($res) >= 1){
	 echo  '<table class="message_style">
	    <tr >
	    <td ><span class="message_span">User</span><span class="message_span2">Ad</span>
	    <span class="message_span">Date</span></td>
	    </tr>';
            while ($result = $Database->fetch_array($res)){
                $id = $result['ad_id'];
          $sqli = "SELECT * from ad_message";
          $sqli .=" WHERE ad_id = ";
          $sqli .= "'".$id."'";
          $sqli .= " AND (postowner_user_id = ";
           $sqli .= "'".$session->user_id ."'";
           $sqli .= " OR sender_user_id = ";
            $sqli .= "'".$session->user_id ."'";
            $sqli .= " ) ORDER BY date DESC ";
            $sqli .= " LIMIT 1";
            $resi = $Database->add_query($sqli);
            $resulti = $Database->fetch_array($resi);
            if($result['sender_user_id'] == $session->user_id){
                $me = "Me";
                $user = new User();
                $user->find_by_mail($result['postowner_user_id']);
                $you = ucfirst($user->surname).' '. ucfirst($user->othernames);
		$sender = $result['sender_user_id'];
		$color = 'black';
            }else{
                 $user = new User();
                $user->find_by_mail($result['sender_user_id']);
                $me = ucfirst($user->surname).' '. ucfirst($user->othernames);
                $you = "Me";
		$sender = $result['sender_user_id'];
             }
           if($resulti['sender_user_id'] != $session->user_id){
            if($resulti['status'] == "unread"){
		$color = 'red';
		}
          }
	    
	    if(strlen($resulti['message']) > 30){
        $realmessage = substr($resulti['message'], 0, 30) ."....";
        }else{
        $realmessage = $resulti['message'];
        } 
                echo
                '<tr  >'; ?>
		<td class="user_box" id="user<?php echo $id ?>"><a href="<?php echo $Database->address ?>inbos.php?id=<?php echo $id ?>&sender=<?php echo $sender ?>&mid=<?php echo $resulti['message_id'] ?>&loc=<?php echo $_SERVER["REQUEST_URI"] ?>" onclick="" style="color:black">
		<?php echo '<span class="message_span">'.$me.'....'.$you.'</span>
		<span class="message_span2"><span><strong>'.ucfirst($result['ad_title']).'</strong></span>
		<br /><span style="font-size: 13px; color:'.$color.'; text-align:left">'.$realmessage.'</span></span><span class="message_span">'.date("M j", strtotime($resulti['date'])).', '.date("H:i", strtotime($resulti['date'])).'</span>
		</a><span style="float:left">'; ?>
		<a href="javascript://" onclick="deletedata(<?php echo $id ?>)" ><img src="required/del.jpg" style="width:20px; height:20px" /></a></span></td>
		</tr>
		<?php 
            }
	    echo '</table>';
         }
         ?>
        </div>
	
    </div>
    <div id="try"></div>

</body>
<?php require_once('footer.php');?>
</html>