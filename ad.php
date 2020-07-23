<!DOCTYPE html>
<html lang="en">	
<head>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="css/main.css">
	<script type="text/javascript" src="functions/functions.js"></script>
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
<?php
session_start();
require_once('database.php');
require_once('session.php');
require_once('searching.php');
$session->start_login();
?>
<body class="content" style="background-color:#5c5c3d; width:100% ; ">
      <header class="mainHeader">
      <div class="create_ad_page_header">
<div class="home" >
		 <a href="<?php echo $Database->address ?>" style="color: white;">Home</a>
</div>
<?php
if($session->user_id != 0){
?>
<div class="other" >
	<a href="<?php echo $Database->address ?>myads.php" style="color: white; ">My Ads</a>	 
</div>
<div class="otherNavs">
	<a href="<?php echo $Database->address ?>message.php" style="color: white; "> Message</a>	 
</div>
<div class="tobeActive">
	<a href="<?php echo $Database->address ?>buiyandsell.php" style="color: white; ">Log Out</a>	 
</div>
<?php } ?>
</div>
      <div class="mobile_create_ad_page_header">
<div class="home" >
		 <a href="<?php echo $Database->address ?>" style="color: white;">Home</a>
</div>
<?php
if($session->user_id != 0){
?>
<div class="others" >
	<a href="<?php echo $Database->address ?>myads.php" style="color: white; "> <img src="<?php echo $Database->address ?>required/myads.jpg" style="height: 30px; width: 30px" /></a>	 
</div>
<div class="otherNavss">
	<a href="<?php echo $Database->address ?>message.php" style="color: white; "> <img src="<?php echo $Database->address ?>required/message2.jpg" style="height: 30px; width: 30px" /></a>	 
</div>
<div class="tobeActives">
	<a href="<?php echo $Database->address ?>buiyandsell.php" style="color: white; "><img src="<?php echo $Database->address ?>required/logout.jpg" style="height: 30px; width: 30px" /></a>	 
</div>
<?php } ?>
</div>
    
  
</header>
     <div class="headerSearchBar" >
	<?php
	if(isset($_GET['Search'])){
	 $cat = $Database->escape_value($_GET['cat']);
	 $lgarea = $Database->escape_value($_GET['lgarea']);
	 if(($cat != "") && ($lgarea == "")){
	
	 $url =  $Database->address."ad.php?cat=".$cat;
	 $Database->redirect_to($url);
	}
	if(($cat != "") && ($lgarea != "")){
	
	 $url =  $Database->address."mainad.php?cat=".$cat."&lgarea=".$lgarea;
	 $Database->redirect_to($url);
	}
	if(($cat == "") && ($lgarea != "")){
	
	 $url =  $Database->address."page.php?lgarea=".$lgarea;
	 $Database->redirect_to($url);
	}
	}
	?>
	<form method="get">
	  <div style="padding : 15px 0; margin-bottom: 15px; ">
	       <input  name="cat"
		<?php    if(isset($_GET['cat'])){
			if(is_string($_GET['cat'] ) != ""){
	$cat = preg_replace('/[^-a-zA-Z0-9_, ]/', '', $_GET['cat']);

	?>
	value="<?php echo $cat ?>" <?php } }?>   
		       style=" width:50%; height: 30px; border-radius:5px " type="text"   />
	       <input name="lgarea"
		     <?php if(isset($_GET['lgarea'])){
			if(is_string($_GET['lgarea'] ) != ""){
	$lgarea = preg_replace('/[^-a-zA-Z0-9_, ]/', '', $_GET['lgarea']);

	?>
	value="<?php echo $lgarea ?>" <?php } }?>
	type="text" list="datalist1" placeholder="type LGA Areas here" style="width:30%; height: 30px; border-radius:10px; margin-left:1%" >
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
   
</header>
<div class="mainContent">
	<article>
	<header class="topHeader" ><h2 style="font-size:large; margin-left: 5%;
	padding-bottom:10px">Latest Ads</h2></header>
        </article>
        <?php
        $search = new searching();
	if(isset($_GET['cat'])){
			if(is_string($_GET['cat'] ) != ""){
	$cat = preg_replace('/[^-a-zA-Z0-9_, ]/', '', $_GET['cat']);
        $search->search_for_ad($cat);
			}
	}
	if(!isset($_GET['cat'])&& isset($_GET['lgarea'])){
	$lgarea = preg_replace('/[^-a-zA-Z0-9_, ]/', '', $_GET['lgarea']);
	$url =  $Database->address."page.php?lgarea=".$lgarea;
	 $Database->redirect_to($url);
	}
	if(isset($_GET['cat'])&& isset($_GET['lgarea'])){
	$cat = preg_replace('/[^-a-zA-Z0-9_, ]/', '', $_GET['cat']);
	$lgarea = preg_replace('/[^-a-zA-Z0-9_, ]/', '', $_GET['lgarea']);
	 $url =  $Database->address."mainad.php?cat=".$cat."&lgarea=".$lgarea;
	 $Database->redirect_to($url);
	}
        ?>
</div>