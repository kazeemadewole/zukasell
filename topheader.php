<?php
session_start();
require_once("database.php");
require_once("user.php");
require_once("buyandsellpost.php");
require_once('session.php');
$session->start_login();
?>
<!DOCTYPE html>
<html lang="en">	
<head>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="../css/main.css">
	<script type="text/javascript" src="../functions/functions.js"></script>
	<script type="text/javascript">
		function open_close(){
    var open1 = document.getElementById('headerNav');
	 if (open1.style.display === 'none'){
            open1.style.display = 'table';
	 }else {
        open1.style.display = 'none';
    }

  }
		
	</script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
</head>

<body class="content" style="background-color:#5c5c3d; width:100% ; ">
      <header class="mainHeader">
      <div class="create_ad_page_header">
<div class="home" >
	<a href="<?php echo $Database->address ?>"><img  class="menu_logo" src="../required/zukasell_logo4.png"   /></a>	
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
	  <a href="buyandsellad.php" style="color:white" ><span style="padding:5px;  border-radius: 5px; background-color:#d96e26">Create an Ad</span></a>
	
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
	  <a href="buyandsellad.php" style="color:white" ><span style="padding:5px;  border-radius: 5px; background-color:#d96e26">Create an Ad</span></a>
	
	<?php } ?>  
</div>
</div>
  
</header>
     <div class="headerSearchBar" >
	<form method="get">
	  <div style="padding : 15px 0; margin-bottom: 15px; ">
	       <input  name="cat" style=" width:50%; height: 30px; border-radius:5px " placeholder="Search for your ads here" type="text"   />
	       <input name="lgarea" type="text" list="datalist1" placeholder="type your LG area or your surburbs here" style="width:30%; height: 30px; border-radius:10px; margin-left:1%" >
		<datalist id="datalist1" >
			<?php
			$sql = "select * from areasandsurburbs ";                      
                        $res= $Database->add_query($sql);
			while($result = $Database->fetch_array($res)){
                            ?>
			<option value="<?php echo $result['Areas'].",".$result['State']?>">
			<?php } ?>
		</datalist>
	       <input type="submit" name="Search" value="Search" style="height: 30px; width: 10%; margin-left:" />
	  </div>
	  </form>
     </div>
   <div id="open" class="open" style=" margin: 0 ; margin-left: 3%; background-color: white"><a href="javascript://"  onclick="open_close()"><img src="required/menu-bar.jpg" style="color: white; width: 30px; height: 30px" /></a></div>
   <nav class="headerNav" id="headerNav" >
	
     <ul >
	  <li>
	       <a href="<?php echo $Database->address ?>Mobile Phones and Tablets">Mobile Phones and Tablet</a>
	  </li>
	  <li>
	       <a href="<?php echo $Database->address ?>Vehicle">Vehicles</a>
	  </li>
	  <li>
	       <a href="<?php echo $Database->address ?>Electronics">Electronics</a>
	  </li>
	  <li>
	       <a href="<?php echo $Database->address ?>Home,Furniture">Home, Furniture and Garden</a>
	  </li>
     
	  <li>
	       <a href="<?php echo $Database->address ?>Real Estate">Real Estate</a>
	  </li>
	  <li>
	       <a href="<?php echo $Database->address ?>Fashion and Beauty">Fashion and Beauty</a>
	  </li>
	  <li>
	       <a href="<?php echo $Database->address ?>Jobs and Services">Jobs and Services</a>
	  </li>
     </ul>
     
   </nav>
</header>