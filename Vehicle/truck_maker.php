<?php
session_start();
require_once("../database.php");
require_once("../user.php");
require_once("../buyandsellpost.php");
require_once("../session.php");
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
   function validate(e) {
  var r = document.forms['index_search']['cat'].value;
  var l = document.forms['index_search']['lgarea'].value;
  if((r != "") && (l != "")){
   window.location = "adsearch.php?cat="+r+"&lgarea="+l;
  }
  if((r != "") && (l == "")){
	
	 window.location =  "ad.php?cat="+r;

	}
 if((r == "") && (l != "")){
	
	window.location = "page.php?lgarea="+l;
	}
  }
  
  
   var cat = document.getElementById("cat");
cat.addEventListener("keydown", function (e) {
    if (e.keyCode === 13) {
        validate(e);
    }
});

  var lgarea = document.getElementById("lgarea");
lgarea.addEventListener("keydown", function (e) {
    if (e.keyCode === 13) {
        validate(e);
    }
});
  
		
	</script>
		
	</script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
</head>

<body class="content" style="background-color:#5c5c3d; width:100% ; ">
      <header class="mainHeader">
      <div class="create_ad_page_header">
<div class="home" >
		 <a href="<?php echo $Database->address ?>" style="color: white;">Home</a>
</div>
<?php
if($session->user_id != 0){
?>
<div style="float: right; margin-right:10%">
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
	    <a href="<?php echo $Database->address ?>buiyandsell.php" class="lloggedfrontDisplay_create">
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
		 <a href="<?php echo $Database->address ?>" style="color: white;">Home</a>
</div>
<?php
if($session->user_id != 0){
?>
<div style="float: right; margin-right:10%">
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
	    <a href="<?php echo $Database->address ?>buiyandsell.php" class="lloggedfrontDisplay_create">
	    <li>LogOut</li>
	   </a>
	    
	   </div>
	  </div>	 
	  <a href="buyandsellad.php" style="color:white" ><span style="padding:5px;  border-radius: 5px; background-color:#d96e26">Create an Ad</span></a>
	
	<?php } ?>  
</div>
</div>
      <?php
       if(isset($_GET['Search'])){
	 
	$cat = $Database->escape_value($_GET['cat']);
	 
	$lgarea = $Database->escape_value($_GET['lgarea']);
	if(($cat != "")&& ($lgarea != "")){
	$_SESSION['lgarea'] = $lgarea;
	 $url =  $Database->address."Vehicle/truck_maker.php?id=".$_SESSION['answer']."&cat=".$cat."&lgarea=".$_SESSION['lgarea'];
	 $Database->redirect_to($url);
	}
	if(($cat != "") && ($lgarea == "")){
	$_SESSION['lgarea'] = "whole country";
	 $url =  $Database->address."Vehicle/truck_maker.php?id=".$_SESSION['answer']."&cat=".$cat;
	 $Database->redirect_to($url);
	}
	if(($cat == "") && ($lgarea == "")){
	$_SESSION['lgarea'] = "whole country";
	$url =  $Database->address."Vehicle/truck_maker.php?id=".$_SESSION['answer']."&lgarea=".$_SESSION['lgarea'];
	 $Database->redirect_to($url);
	}
	if(($cat == "") && ($lgarea != "")){
	$_SESSION['lgarea'] = $lgarea;
	 $url =  $Database->address."Vehicle/truck_maker.php?id=".$_SESSION['answer']."&lgarea=".$_SESSION['lgarea'];
	 $Database->redirect_to($url);
	}
	
       }
       ?>
      <div class="headerSearchBar" >
      <form method="get" name="index_search" >
	  <div style="padding : 15px 0; margin-bottom: 15px; ">
	       <input name="cat" id="cat" type="text" style=" width:50%; height: 30px; border-radius:5px " placeholder="Search for your ads here"
		 <?php  if(isset($_GET['cat'])){
		  if($_GET['cat'] != ""){
		  $cat = preg_replace('/[^-a-zA-Z0-9_, ]/', '', $_GET['cat']);
		 ?> value="<?php echo $cat ?>"
		 <?php } }?>     
		      />
	       <input name="lgarea" id="lgarea" type="text" list="datalist1" placeholder="whole country" style="width:30%; height: 30px; border-radius:10px; margin-left:1%"
		<?php  if(isset($_SESSION['lgarea'])){
		 ?> value="<?php echo $_SESSION['lgarea'] ?>"
		 <?php } ?> >  
		<datalist id="datalist1" >
		 
			<?php
			$sql = "select * from areasandsurburbs ";                      
                        $res= $Database->add_query($sql);
			while($result = $Database->fetch_array($res)){
                            ?>
			<option value="<?php echo $result['Areas'].",".$result['State']?>">
			<?php } ?>
		</datalist>
	       <input  type="submit" name="Search" value="Search" style="height: 30px; width: 10%; margin-left:" />
	  </div>
      </form>
     </div>
   <div class="mainContent">
	<article>
	<header class="topHeader" ><h2 style="font-size:large; margin-left: 5%;
	padding-bottom:10px">Latest Ads</h2></header>
	<div id="indexPageAdDisplay">

<div>
     <?php
$answer = preg_replace('/[^-a-zA-Z0-9_, ]/', '', $_GET['id']);
$_SESSION['answer'] = $answer;
?>
    <div class="sub_header">
    <a href="<?php echo $Database->address ?>Vehicle/" ><span>Vehicle</span></a>
    <span  class="inside"style="color:white">Trucks</span>
    <span  class="inside" ><?php echo $_SESSION['answer'] ?></span>
</div>
    <div style="clear:both"></div>
    <?php
$maker = "truck_maker";
$cati = "Vehicle";
$buy = new buyandsell();
    if (isset($_SESSION['lgarea']))
{
  if($_SESSION['lgarea'] != "whole country"){
	if(isset($_GET['cat']))
	{
	    if($_GET['cat'] != "")
	    {
	        $cat = preg_replace('/[^-a-zA-Z0-9_, ]/', '', $_GET['cat']);
	        $buy->select_for_maker_subcat($cati,$maker,$_SESSION['answer'], $_SESSION['lgarea'],$cat);
	   }else{
	   $buy->select_for_maker_subcat_lg($cati,$maker,$_SESSION['answer'], $_SESSION['lgarea']);	
	        }
	}else
	 {
	   $buy->select_for_maker_subcat_lg($cati,$maker,$_SESSION['answer'], $_SESSION['lgarea']);	
	 }
	}else
	{
	     if(isset($_GET['cat']))
	     {
	         if($_GET['cat'] != "")
		 {
	            $cat = preg_replace('/[^-a-zA-Z0-9_, ]/', '', $_GET['cat']);
	           $buy->select_for_maker_subcat_name($cati,$maker,$_SESSION['answer'], $cat);
	         }else
		 {
	            $buy->select_for_maker($cati,$maker,$_SESSION['answer']);
	         }
	      }else
	      {
	            $buy->select_for_maker($cati,$maker,$_SESSION['answer']);
	      }
	}
}
	else
	{
	   $buy->select_for_maker($cati,$maker,$_SESSION['answer']);
	}


?>
</div>
	</div>