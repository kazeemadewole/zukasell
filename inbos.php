<?php
session_start();
require_once('database.php');
require_once('session.php');
require_once('buyandsellpost.php');
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
         <script type="text/javascript">
            window.location.hash = '#tobefocused';
            function todelete(){
               alert("do you want to delete?");
            }
         </script>
</head>

<body style="background-color:#5c5c3d">
      <header class="mainHeader">
      <div class="create_ad_page_header">
<div class="home" >
	<a href="<?php echo $Database->address ?>"><img  class="menu_logo" src="http://www.zukasell.com/required/zukasell_logo4.png"   /></a>	
</div>
<?php
if($session->user_id != 0){
?>
<div style="float: right; margin-right:10%;margin-top: 10px;">
<div class="dropdown">
	  <?php $user = new User();
	  $user->find_by_mail($session->user_id);
	  echo '<a href"#">'.$user->surname.'</a>';
	  ?>
	   <div class="dropdown-content">
	    
	    <a href="<?php echo $Database->address ?>myads.php" >
		 <li>Myads</li>
	    </a>
	    
	     <a href="<?php echo $Database->address ?>message.php" >
	    <li>Message</li>
	    </a>
	    <a href="<?php echo $Database->address ?>logout.php">
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
		<a href="<?php echo $Database->address ?>"><img  class="menu_logo" src="http://www.zukasell.com/required/zukasell_logo4.png"   /></a>
</div>
<?php
if($session->user_id != 0){
?>
<div style="float: right; margin-right:10%;margin-top: 10px;">
<div class="dropdown">
	  <?php $user = new User();
	  $user->find_by_mail($session->user_id);
	  echo '<a href"#">'.$user->surname.'</a>';
	  ?>
	   <div class="dropdown-content">
	    
	    <a href="<?php echo $Database->address ?>myads.php" >
		 <li>Myads</li>
	    </a>
	    
	     <a href="<?php echo $Database->address ?>message.php" >
	    <li>Message</li>
	    </a>
	    <a href="<?php echo $Database->address ?>logout.php">
	    <li>LogOut</li>
	   </a>
	    
	   </div>
	  </div>	 
	  <a href="<?php echo $Database->address ?>buyandsellad.php" style="color:white" ><span style="padding:5px;  border-radius: 5px; background-color:#d96e26">Create an Ad</span></a>
	
	<?php } ?>  
</div>
</div>
  
  
</header>
      <?php
      $id = $_GET['id'];
      $mid = $_GET['mid'];
$loc = $_GET['loc'];
$url=  $Database->addnew.$loc;
$sender = $_GET['sender'];
$read = "read";
if($session->user_id != $sender){
         $s = "UPDATE ad_message set ";
        $s .= "status = ";
        $s .= "'".$read."'";
        $s .= " where message_id = ";
        $s .= "'".$mid."'";
        $r = $Database->add_query($s);
}
?>
    <div  class="message_box_div">
	<p class="loginPage_signin">Message</p>
        <a href="<?php echo $url ?>" style="text-align:left"><p>Back</p></a>
        <div class="inbos_ad_display_div"><?php $buy = new buyandsell();
        $buy->select_for_myads_by_id($id);
        $post_owner_user = $buy->user;
        ?>
        </div>
        <div id="message_box" >
         <?php
     if(isset($_POST['SendMessage'])){
     
    $mess = $Database->escape_value($_POST['message']);
    $date = strftime('%Y/-%m/-%d-/%H/-%M/-%S',time());
      $sql = "insert into ad_message ( ad_id,postowner_user_id,sender_user_id,message,date )";
        $sql .= " values ( ";
	$sql .= "'".$id."',";
        $sql .= "'".$post_owner_user."',";
        $sql .= "'".$session->user_id."',";
        $sql .= "'".$mess."',";
        $sql .= "'".$date."'";
        $sql .= " )";
	if($res = $Database->add_query($sql)){   
        $sqlj = "UPDATE message_counts set ";
        $sqlj .= "date = ";
        $sqlj .= "'".$date."'";
        $sqlj .= " where ad_id = ";
        $sqlj .= "'".$id."'";
        $resj = $Database->add_query($sqlj);
        }
        
 }
        
          $sqli = "SELECT * from ad_message";
          $sqli .=" WHERE ad_id = ";
          $sqli .= "'".$id."'";
          $sqli .= " ORDER BY  date ASC";
          $res = $Database->add_query($sqli);
          echo '<div class="mess_style_box">';
          while($result = $Database->fetch_array($res)){
            if($session->user_id != 0){
             if($result['sender_user_id'] == $session->user_id){
                 $margin = "margin-left";
                 
                $color = "white";
                $name = "Me";
                $user = $result['sender_user_id'];
            }else{
                 $margin = "margin-right";
                $color = "#deedde";
                $users = new User();
              $users->find_by_mail($result['sender_user_id']);
                $name = ucfirst($users->surname).' '. ucfirst($users->othernames);
                $user = $result['sender_user_id'];
            }
            echo  '<div  style=" text-align:left;padding:20px 10px 0 10px; ">';
                echo '<p style=" padding:2px 5px; border-radius:5px;
                 background-color:'. $color.';'.$margin.':20%">'.
                '<span style="font-size: 12px">'. $name ."  " .date("M j", strtotime($result['date'])).', '.date("H:i", strtotime($result['date'])) .
                '</span><br />'. $result['message'].'</p>';
         
              echo  '</div>';
          }
          }
          ?>
          <div  id="tobefocused" ></div>
        </div>
        
        <div class="form_box" >
   <form method="post" name="myform" onsubmit=" return check_form()" class="form_div">
    <textarea name="message" id="message" placeHolder="Type your message here" class="form_textarea_style" >
   </textarea>
    <div>
    <input type="submit" value="Send Message" name="SendMessage" class="loginPage_signin" />
            </div>
    </form></div></div>
    </div>
</body>
<?php require_once('footer.php');?>
</html>