<?php
session_start();
require_once("../database.php");
require_once("../user.php");
require_once("../buyandsellpost.php");
require_once("../session.php");
require_once("../pagination.php");
$session->start_login();
       if(isset($_GET['Search'])){
	 
	$cat = $Database->escape_value($_GET['cat']);
	 
	$lgarea = $Database->escape_value($_GET['lgarea']);
	if(($cat != "")&& ($lgarea != "")){
	$_SESSION['lgarea'] = $lgarea;
	 $url =  $Database->address."Mobile-Phones-and-Tablets/?cat=".$cat."&lgarea=".$_SESSION['lgarea'];
	 $Database->redirect_to($url);
	}
	if(($cat != "") && ($lgarea == "")){
	$_SESSION['lgarea'] = "whole country";
	 $url =  $Database->address."Mobile-Phones-and-Tablets/?cat=".$cat;
	 $Database->redirect_to($url);
	}
	if(($cat == "") && ($lgarea == "")){
	$_SESSION['lgarea'] = "whole country";
	$url =  $Database->address."Mobile-Phones-and-Tablets/?lgarea=".$_SESSION['lgarea'];
	 $Database->redirect_to($url);
	}
	if(($cat == "") && ($lgarea != "")){
	$_SESSION['lgarea'] = $lgarea;
	 $url =  $Database->address."Mobile-Phones-and-Tablets/?lgarea=".$_SESSION['lgarea'];
	 $Database->redirect_to($url);
	}
	
       }
      
?>
<!DOCTYPE html>
<html lang="en">	
<head>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9386381840362693",
    enable_page_level_ads: true
  });
</script>
	<meta charset="utf-8" />
     <title>Zukasell- Mobile Phones and Tablets  </title> 
        <meta name="description" content="Latest Ad: Phones(Iphone,Samsung,Infinix,Injoo,Techno,Sony,Itel ....) , Tablets(Lenovo, Amazon, Asus, Google, Htc,....), Accessories ....." />
<meta name="keywords" content="Zukasell, infinix hot 3, Tecno Camon c9, samsung galaxy tab,mobile phone, Tablets,buy cell phones, cheap phones online,cheap cell phones online,smartphones on sale ,online mobile phone shopping,buy cheapest mobile phone online,phone online shopping,sale phone online,mobile phone deals,cheap phones online for sale, buy mobile phones online,online phone sales, phones online for sale, buy phones cheap online,cheap phones and tablets,for sale phone,buy smartphones online cheap, buy a phone online cheap, cheap used cell phones for sale, phone tablet price,phone selling websites, shop for phones,buy cell phones online, phone buyers,online phone shop, phones and prices ">
	<link type="text/css" rel="stylesheet" href="../css/main.css">
 <script type="text/javascript" src="../functions/functions.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<script type="text/javascript">
function validate(e) {
  var r = document.forms['index_search']['cat'].value;
  var l = document.forms['index_search']['lgarea'].value;
  if((r != "") && (l != "")){
   window.location = "Mobile-Phones-and-Tablets/?cat="+r+"&lgarea="+l;
  }
  if((r != "") && (l == "")){
	
	 window.location =  "Mobile-Phones-and-Tablets/?cat="+r;

	}
 if((r == "") && (l != "")){
	
	window.location = "Mobile-Phones-and-Tablets/?lgarea="+l;
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
</head>

<body class="content" style=" width:100% ; ">
<!-- Google Code for zukasell conversion Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 858401663;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "tTM7CPL-i3AQ_9aomQM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/858401663/?label=tTM7CPL-i3AQ_9aomQM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<?php include_once("../analyticstracking.php"); ?>
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
     <div style="background-color:#5c5c3d;padding-top: 10px;padding-bottom:10px">
  <div class="headerSearchBar" >
      <form method="get" name="index_search" >
	  <div style="padding : 15px 0; margin-bottom: 15px; ">
	       <input name="cat" id="cat" style=" width:50%; height: 30px; border-radius:5px " placeholder="Search for your ads here" type="text"   />
	       <input name="lgarea" id="lgarea" type="text" list="datalist1" placeholder="type your LG area or your surburbs here" style="width:30%; height: 30px; border-radius:10px; margin-left:1%"
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
</div>
</header>
 <div style="margin:3px 0 ">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- zukasell responsice -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9386381840362693"
     data-ad-slot="6858314767"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div> 
   <div class="mainContent">
	<article>
	<header class="topHeader" ><h2 style="font-size:large; margin-left: 5%;
	padding-bottom:10px">Latest Ads on Phones & Tablets</h2></header>
	<div class="inside_vehicle" style="background-color: white">
		<div class="list">
		<a href="javascript://" onclick="makerequest('<?php echo $Database->address ?>check_phone_brand.php', 'show_hidden')"><li  class="items">Phones</li></a>
		<a href="javascript://" onclick="makerequest('<?php echo $Database->address ?>check_tablet_brand.php', 'show_hidden')"><li class="items">Tablets</li></a>
		<a href="javascript://" onclick="makerequest('<?php echo $Database->address ?>dynamic.php?id=Accessories &cati=Mobile Phones and Tablet &maker=subcategory&loc=<?php echo $_SERVER['REQUEST_URI'] ?>&cat=Accessories', 'display_box')">
		<li class="items">Accessories</li>
		</a>
		</div>
		
	<div id="show_hidden" class="showhidden" style="clear:both"></div>
	</div>
	<div style="clear: both; background-color:#c8e0d7" id="display_box">
<?php
$buy = new buyandsell();
$table = "Mobile Phones and Tablet";
$tabs= "Mobile-Phones-and-Tablets";
if (isset($_SESSION['lgarea']))
{
  if($_SESSION['lgarea'] != "whole country"){
	if(isset($_GET['cat']))
	{
	    if($_GET['cat'] != "")
	    {
	$cat = preg_replace('/[^-a-zA-Z0-9_, ]/', '', $_GET['cat']);
	$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
	$_SESSION['page'] = $page;
	$per_page = 24;
	$sql = "select count(ad_id) from goodsandservices";
        $sql .= " where  category = ";
        $sql .= "'".$table ."'";
        $sql .= " and lg_area = ";
        $sql .= "'". $_SESSION['lgarea'] ."'";
        $sql .= " and adname like ";
        $sql .= "'%". $cat ."%'";
	$res = $Database->add_query($sql);
         $row = $Database->fetch_array($res);
         $rows = array_shift($row);
  $total = $rows;
  $pag = new pagination();
  $pag->paging($page,$per_page,$total);
    $offset = $pag->offset(); 
	        $buy->select_from_table_with_lg_and_name($table, $_SESSION['lgarea'],$cat,$per_page,$offset);
	echo '<div style="clear:both; margin-left:10%; padding-top:10px; ">';
	   if($pag->total_page()  > 1 ){
if ($pag->is_previous_page()){
 echo '<a href="'.$Database->address.$tabs.'/?cat='.$cat.'&lg_area='.$_SESSION["lgarea"].'&page='. $pag->previous_page().'">  &laquo Previous </a>';
}

if ($pag->is_next_page()){
 echo '<a style="margin-left:10%" href="'.$Database->address.$tabs.'/?cat='.$cat.'&lg_area='.$_SESSION["lgarea"].'&page='. $pag->next_page().'"> Next &raquo </a>';
}
}
echo '</div>';
	   }else{
	$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
	$_SESSION['page'] = $page;
	$per_page = 24;
	$sql = "select count(ad_id) from goodsandservices";
        $sql .= " where category = ";
        $sql .= "'".$table ."'";
        $sql .= " and lg_area = ";
        $sql .= "'". $_SESSION['lgarea'] ."'";
	$res = $Database->add_query($sql);
         $row = $Database->fetch_array($res);
         $rows = array_shift($row);
  $total = $rows;
  $pag = new pagination();
  $pag->paging($page,$per_page,$total);
    $offset = $pag->offset(); 
	   $buy->select_from_table_with_lg($table, $_SESSION['lgarea'],$per_page,$offset);
	echo '<div style="clear:both; margin-left:10%; padding-top:10px; ">';
	   if($pag->total_page()  > 1 ){
if ($pag->is_previous_page()){
 echo '<a href="'.$Database->address.$tabs.'/?lg_area='.$_SESSION["lgarea"].'&page='. $pag->previous_page().'">  &laquo Previous </a>';
}

if ($pag->is_next_page()){
 echo '<a style="margin-left:10%" href="'.$Database->address.$tabs.'/?lg_area='.$_SESSION["lgarea"].'&page='. $pag->next_page().'"> Next &raquo </a>';
}
}
echo '</div>';
	        }
	}else
	 {
	$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
	$_SESSION['page'] = $page;
	$per_page = 24;
	$sql = "select count(ad_id) from goodsandservices";
        $sql .= " where category = ";
        $sql .= "'".$table ."'";
        $sql .= " and lg_area = ";
        $sql .= "'".$_SESSION['lgarea'] ."'";
	$res = $Database->add_query($sql);
         $row = $Database->fetch_array($res);
         $rows = array_shift($row);
  $total = $rows;
  $pag = new pagination();
  $pag->paging($page,$per_page,$total);
    $offset = $pag->offset(); 
	    $buy->select_from_table_with_lg($table, $_SESSION['lgarea'],$per_page,$offset);
	echo '<div style="clear:both; margin-left:10%; padding-top:10px; ">';
	   if($pag->total_page()  > 1 ){
if ($pag->is_previous_page()){
 echo '<a href="'.$Database->address.$tabs.'/?lg_area='.$_SESSION["lgarea"].'&page='. $pag->previous_page().'">  &laquo Previous </a>';
}

if ($pag->is_next_page()){
 echo '<a style="margin-left:10%" href="'.$Database->address.$tabs.'/?lg_area='.$_SESSION["lgarea"].'&page='. $pag->next_page().'"> Next &raquo </a>';
}
}
echo '</div>';
	 }
	}else
	{
	     if(isset($_GET['cat']))
	     {
// session lgarea is equal to whole country
	         if($_GET['cat'] != "")
		 {
	$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
	$_SESSION['page'] = $page;
	$per_page = 24;		
	$cat = preg_replace('/[^-a-zA-Z0-9_, ]/', '', $_GET['cat']);
	$sql = "select count(ad_id) from goodsandservices";
        $sql .= " where adname like ";
        $sql .= "'%". $cat ."%'";
        $sql .= " and category = ";
        $sql .= "'".$table ."'";  
	$res = $Database->add_query($sql);
         $row = $Database->fetch_array($res);
         $rows = array_shift($row);
  $total = $rows;
  $pag = new pagination();
  $pag->paging($page,$per_page,$total);
    $offset = $pag->offset(); 
	            $buy->select_from_table_with_name($table, $cat,$per_page,$offset);
	echo '<div style="clear:both; margin-left:10%; padding-top:10px; ">';
	   if($pag->total_page()  > 1 ){
if ($pag->is_previous_page()){
 echo '<a href="'.$Database->address.$tabs.'/?cat='.$cat.'&lg_area='.$_SESSION["lgarea"].'&page='. $pag->previous_page().'">  &laquo Previous </a>';
}

if ($pag->is_next_page()){
 echo '<a style="margin-left:10%" href="'.$Database->address.$tabs.'/?cat='.$cat.'&lg_area='.$_SESSION["lgarea"].'&page='. $pag->next_page().'"> Next &raquo </a>';
}
}
echo '</div>';    
	         }else
		 {
	$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
	$_SESSION['page'] = $page;
	$per_page = 24;
	$sql = "select count(ad_id) from goodsandservices";
      $sql .= " where category = ";
        $sql .= "'".$table ."'";
	$res = $Database->add_query($sql);
         $row = $Database->fetch_array($res);
         $rows = array_shift($row);
  $total = $rows;
  $pag = new pagination();
  $pag->paging($page,$per_page,$total);
    $offset = $pag->offset(); 
	            $buy->select_from_table($table,$per_page,$offset);
echo '<div style="clear:both; margin-left:10%; padding-top:10px; ">';
	   if($pag->total_page()  > 1 ){
if ($pag->is_previous_page()){
 echo '<a href="'.$Database->address.$tabs.'/?lg_area='.$_SESSION["lgarea"].'&page='. $pag->previous_page().'">  &laquo Previous </a>';
}

if ($pag->is_next_page()){
 echo '<a style="margin-left:10%" href="'.$Database->address.$tabs.'/?lg_area='.$_SESSION["lgarea"].'&page='. $pag->next_page().'"> Next &raquo </a>';
}
}
echo '</div>';
	         }
	      }else
	      {
	$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
	$_SESSION['page'] = $page;
	$per_page = 24;
	$sql = "select count(ad_id) from goodsandservices";
      $sql .= " where category = ";
        $sql .= "'".$table ."'";
	$res = $Database->add_query($sql);
         $row = $Database->fetch_array($res);
         $rows = array_shift($row);
  $total = $rows;
  $pag = new pagination();
  $pag->paging($page,$per_page,$total);
    $offset = $pag->offset(); 
	            $buy->select_from_table($table,$per_page,$offset);
		echo '<div style="clear:both; margin-left:10%; padding-top:10px; ">';
	   if($pag->total_page()  > 1 ){
if ($pag->is_previous_page()){
 echo '<a href="'.$Database->address.$tabs.'/?page='. $pag->previous_page().'">  &laquo Previous </a>';
}

if ($pag->is_next_page()){
 echo '<a style="margin-left:10%" href="'.$Database->address.$tabs.'/?page='. $pag->next_page().'"> Next &raquo </a>';
}
}
echo '</div>';
	      }
	}
}
	else
	{
	$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
	$_SESSION['page'] = $page;
	$per_page = 24;
	$sql = "select count(ad_id) from goodsandservices";
       $sql .= " where category = ";
        $sql .= "'".$table ."'";
	$res = $Database->add_query($sql);
         $row = $Database->fetch_array($res);
         $rows = array_shift($row);
  $total = $rows;
  $pag = new pagination();
  $pag->paging($page,$per_page,$total);
    $offset = $pag->offset(); 
	   $buy->select_from_table($table,$per_page,$offset);
	echo '<div style="clear:both; margin-left:10%; padding-top:10px; ">';
	   if($pag->total_page()  > 1 ){
if ($pag->is_previous_page()){
 echo '<a href="'.$Database->address.$tabs.'/?page='. $pag->previous_page().'">  &laquo Previous </a>';
}

if ($pag->is_next_page()){
 echo '<a style="margin-left:10%" href="'.$Database->address.$tabs.'/?page='. $pag->next_page().'"> Next &raquo </a>';
}
}
echo '</div>';
	}

?>
	</div>
	</article>
</div>
  <div style="margin:5px 0 ">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- zukasell responsice -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9386381840362693"
     data-ad-slot="6858314767"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div> 

</body>
<?php require_once('../footer.php');?>
</html>