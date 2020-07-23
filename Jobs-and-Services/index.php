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
	 $url =  $Database->address."Jobs-and-Services/?cat=".$cat."&lgarea=".$_SESSION['lgarea'];
	 $Database->redirect_to($url);
	}
	if(($cat != "") && ($lgarea == "")){
	$_SESSION['lgarea'] = "whole country";
	 $url =  $Database->address."Jobs-and-Services/?cat=".$cat;
	 $Database->redirect_to($url);
	}
	if(($cat == "") && ($lgarea == "")){
	$_SESSION['lgarea'] = "whole country";
	$url =  $Database->address."Jobs-and-Services/?lgarea=".$_SESSION['lgarea'];
	 $Database->redirect_to($url);
	}
	if(($cat == "") && ($lgarea != "")){
	$_SESSION['lgarea'] = $lgarea;
	 $url =  $Database->address."Jobs-and-Services/?lgarea=".$_SESSION['lgarea'];
	 $Database->redirect_to($url);
	}
	
       }
      
if(isset($_GET['lgarea'])){
$lgarea = preg_replace('/[^-a-zA-Z0-9_, ]/', '', $_GET['lgarea']);
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
     <title>Zukasell- Jobs and Services  </title> 
        <meta name="description" content="Latest Ad in Jobs and Services: Seeking for works, offered Jobs, Services...." />
<meta name="keywords" content="Zukasell, jobs, service, works,seeking,seek,vacancy">
	<link type="text/css" rel="stylesheet" href="../css/main.css">
 <script type="text/javascript" src="../functions/functions.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<script type="text/javascript">
function validate(e) {
  var r = document.forms['index_search']['cat'].value;
  var l = document.forms['index_search']['lgarea'].value;
  if((r != "") && (l != "")){
   window.location = "Jobs-and-Services/?cat="+r+"&lgarea="+l;
  }
  if((r != "") && (l == "")){
	
	 window.location =  "Jobs-and-Services/?cat="+r;

	}
 if((r == "") && (l != "")){
	
	window.location = "Jobs-and-Services/?lgarea="+l;
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
<div style=" clear: both">
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
	padding-bottom:10px">Latest Ads on Jobs & Services</h2></header>
	<div class="inside_vehicle" style="background-color: white">
		<div class="list">
<a href="javascript://" onclick="makerequest('<?php echo $Database->address ?>dynamic.php?id=Offered Jobs &cati=Jobs and Services &maker=subcategory&loc=<?php echo $_SERVER['REQUEST_URI'] ?>&cat=Offered Jobs', 'display_box')">
		<li  class="items">Offered Jobs</li>
</a>
<a href="javascript://" onclick="makerequest('<?php echo $Database->address ?>dynamic.php?id=Seeking Works &cati=Jobs and Services &maker=subcategory&loc=<?php echo $_SERVER['REQUEST_URI'] ?>&cat=Seeking Works', 'display_box')">
		<li class="items">Seeking Works</li>
</a>
<a href="javascript://" onclick="makerequest('<?php echo $Database->address ?>dynamic.php?id=Services &cati=Jobs and Services &maker=subcategory&loc=<?php echo $_SERVER['REQUEST_URI'] ?>&cat=Services', 'display_box')">
		<li class="items">Services</li>
</a>
<a href="javascript://" onclick="makerequest('<?php echo $Database->address ?>dynamic.php?id=Others &cati=Jobs and Services &maker=subcategory&loc=<?php echo $_SERVER['REQUEST_URI'] ?>&cat=Others', 'display_box')">
		<li class="items">Others</li>
</a>
		</div>
		
	<div id="show_hidden" style="clear:both"></div>
	</div>
	<div style="clear: both; background-color:#c8e0d7" id="display_box">
<?php
$buy = new buyandsell();
$table = "Jobs and Services";
$tabs= "Jobs-and-Services";
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
 <div style="margin:2px 0 ">
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