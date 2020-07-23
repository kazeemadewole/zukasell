<?php
session_start();
require_once("database.php");
require_once("user.php");
require_once("session.php");
require_once("buyandsellpost.php");
require_once("pagination.php");
$session->start_login();
       if(isset($_GET['Search'])){
	 
	$cat = $Database->escape_value($_GET['cat']);
	 
	$lgarea = $Database->escape_value($_GET['lgarea']);
	if(($cat != "")&& ($lgarea != "")){
	 $_SESSION['lgarea'] = $lgarea;
	 $url =  $Database->address."?cat=".$cat."&lgarea=".$_SESSION['lgarea'];
	 $Database->redirect_to($url);
	}
	if(($cat != "") && ($lgarea == "")){
	$_SESSION['lgarea'] = "whole country";
	 $url =  $Database->address."?cat=".$cat."&lgarea=".$_SESSION['lgarea'];
	 $Database->redirect_to($url);
	}
	if(($cat == "") && ($lgarea == "")){
	$_SESSION['lgarea'] = "whole country";
	 $url =  $Database->address."?lgarea=".$_SESSION['lgarea'];
	 $Database->redirect_to($url);
	}
	if(($cat == "") && ($lgarea != "")){
	$_SESSION['lgarea'] = $lgarea;
	 $url =  $Database->address."?lgarea=".$_SESSION['lgarea'];
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
    google_ad_client: "ca-pub-3204350282441969",
    enable_page_level_ads: true
  });
</script>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<meta charset="utf-8" />
<title>Zukasell - Latest Ad in Nigeria </title> 
        <meta name="description" content="Zukasell...Nigeria Online commercial website to promote , sell and buy your goods and services..." /> 

<meta name="keywords" content="Zukasell, phone price,Price in Nigeria, Fashion, Job vacancy in Nigeria, online shopping, toyota camry,cheap furniture in nigeria,phones,used phone,tablet,tv,price of television, video,audio,computer,laptop,accessories,buy home, homes, sale, furniture, garden, home appliances,vehicle, car, trucks, motorcycle,toyota,mercedes,honda,techno,infinix,samsung, homes for sale, real estate, properties in Nigeria">
<meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta property="og:url" content="http://www.zukasell.com" />
    <meta property="og:title" content="BUY AND SELL to Nigerians "/>
    <meta property="og:description" content="Free Ad for Vehicle,Phones,Electronics,Wears,Real Estate,Jobs and Services...." />
    
    <meta property="og:image" content="http://www.zukasell.com/required/500by270-ad.png" />
    <meta property="og:site_name" content="Zukasell" />
	<link type="text/css" rel="stylesheet" href="css/main.css">
	<script type="text/javascript" src="functions/functions.js"></script>
<script type="text/javascript" src="functions/jquery-3.2.0.min.js"></script>
	<script type="text/javascript">
	 $(function(){
   setInterval("rotateImage()", 6000);
  });
	function open_close(){
    var open1 = document.getElementById('headerNav');
	 if (open1.style.display === 'none'){
            open1.style.display = 'table';
	 }else {
        open1.style.display = 'none';
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
  
  
    function rotateImage() {
     var occurphoto = $("#photoshow div.current");
     var onxtphoto = occurphoto.next();
     if(onxtphoto.length == 0){
     onxtphoto = $("#photoshow div:first");
     }
     occurphoto.removeClass("current").addClass("previous");
     onxtphoto.css({opacity:0.0}).addClass("current").animate({opacity:1.0},1000, function() {
      occurphoto.removeClass("previous");
     });
    }
	</script>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9386381840362693",
    enable_page_level_ads: true
  });
</script>
</head>

<body class="content" style="background-color:#c8e0d7; width:100% ; ">
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

<?php include_once("analyticstracking.php") ?>
      <header class="mainHeader">
      
     <div class="mainHeader_view">
 <div style="">
      <a href="<?php echo $Database->address ?>"><img  class="logo" src="required/zukasell_logo4.png" /></a>
	<div class="frontDisplay">
	 <?php 
if($session->user_id == 0){ ?>
	 <div class="dropdown">
	 <a href="<?php echo $Database->address ?>login.php">Logs</a>
	   <div class="dropdown-content">
	    
	    <a href="<?php echo $Database->address?>login.php" style="color: black">
		 <li>Sign In </li>
	    </a>
	    
	     <a href="<?php echo $Database->address?>signup.php"> 
	    <li>Registration</li>
	    </a>  
	   </div>
	  </div>	  
	  <a href="buyandsellad.php" style="color:white" ><span style="padding:5px;  border-radius: 5px; background-color:#d96e26">Create an Ad</span></a>
	  <?php } else {?>
	  <div class="dropdown">
	  <?php $user = new User();
	  $user->find_by_mail($session->user_id);
	  echo '<a href="#">'.$user->surname.'</a>';
	  ?>
	   <div class="dropdown-content">
	    
	    <a href="<?php echo $Database->address ?>myads.php" >
		 <li>Myads</li>
	    </a>
	    
	      
	     <a href="<?php echo $Database->address ?>message.php" >
	    <li>Message</li>
	    </a>
	    <a href="<?php echo $Database->address ?>logout.php" >
	    <li>LogOut</li>
	   </a>
	    
	   </div>
	  </div>	 
	  <a href="buyandsellad.php" style="color:white" ><span style="padding:5px;  border-radius: 5px; background-color:#d96e26">Create an Ad</span></a>
	
	<?php } ?>  
	</div>
</div>
 </div>
<div id="photoshow" style="background-color:white" >
      <div class="current" >
       <img  src="required/mobile-car-picture.png"  class="img_rotate1" alt="Zukasell_rotator_image"   />
      </div> 
      <div >
       <img src="required/jobvacancy.png" class="img_rotate2" alt="Zukasell_rotator_image"  />
      </div>
      <div >
       <img src="required/mobileelectronics.png" class="img_rotate3" alt="Zukasell_rotator_image"   />
      </div>
      <div >
       <img src="required/fashions-mobile.png" class="img_rotate4"  alt="Zukasell_rotator_image"   />
      </div>   
      
 </div>
     <div style="background-color:#5c5c3d;padding-top: 10px;">
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
		 <?php } ?> />
		<datalist id="datalist1" >
		 
			<?php
			$sql = "select * from areasandsurburbs ";                      
                        $res= $Database->add_query($sql);
			while($result = $Database->fetch_array($res)){
                            ?>
			<option value="<?php echo $result['Areas'].",".$result['State']?>">
			<?php } ?>
		</datalist>
	       <input  type="submit" name="Search" value="Go"  style="height: 30px;width:10%;  margin-left:" />
	  </div>
      </form>
     </div>
   <div id="open" class="open" style=" margin: 0 ; margin-left: 3%; "><a href="javascript://"  onclick="open_close()"><img src="required/menu.png" style="color: white; width: 30px; height: 30px" /></a></div>
   <nav class="headerNav" id="headerNav" >
	
     <ul >
	  <li>
	       <a href="<?php echo $Database->address ?>Mobile-Phones-and-Tablets/">Mobile Phones and Tablets</a>
	  </li>
	  <li>
	       <a href="<?php echo $Database->address ?>Vehicle/">Vehicles</a>
	  </li>
	  <li>
	       <a href="<?php echo $Database->address ?>Electronics/">Electronics</a>
	  </li>
	  <li>
	       <a href="<?php echo $Database->address ?>Home-Furniture/">Home, Furniture and Garden</a>
	  </li>
     
	  <li>
	       <a href="<?php echo $Database->address ?>Real-Estate/">Real Estate</a>
	  </li>
	  <li>
	       <a href="<?php echo $Database->address ?>Fashion-and-Beauty/">Fashion and Beauty</a>
	  </li>
	  <li>
	       <a href="<?php echo $Database->address ?>Jobs-and-Services/">Jobs and Services</a>
	  </li>
     </ul>
     
   </nav>
   </div>
</header>
<div class="MainContent">
 <a href="http://article.zukasell.com/profitable-strategy-on-forex-trading.php">
  <div class="newarticle" >
        <a href="http://article.zukasell.com/profitable-strategy-on-forex-trading.php"><h5>100% Profitable Strategy on Forex Trading</h5></a>
        <content>
            <p>Know the strategy and indicators that work as magic. It is .....</p>
        </content>
    </div>
 </a>
    <a href="http://article.zukasell.com/Asbestos-lung-cancer.php">
     <div class="newarticle" >
        <a href="http://article.zukasell.com/Asbestos-lung-cancer.php"><h5>Asbestos Lung Cancer</h5></a>
        <content>
            <p>Asbestos is a natural occurring mineral that contains fibres, these fibres if inhaled too much could cause cancer.....</p>
        </content>
    </div>
    </a>
</div>
<div style=" clear: both; margin:2px 0">
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

   <div class="mainContent" style="background-color:#c8e0d7;">
      <?php
    if (isset($_SESSION['lgarea']))
{
  if($_SESSION['lgarea'] != "whole country"){
  $county = $_SESSION['lgarea'];
  }else{
   $county = "Nigeria";
  }
    }else {
     $county = "Nigeria";
    }
  ?>
	<article >
	<header class="topHeader" ><h2 style="font-size:large; margin-left: 5%;
	padding-bottom:10px">Latest Ads in <?php echo $county ; ?></h2></header>
	<div id="indexPageAdDisplay" style="background-color:#c8e0d7; " >
	<div>

 <?php
   $buy = new buyandsell();
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
	$sql ="select count(ad_id)  from goodsandservices";
         $res = $Database->add_query($sql);
         $row = $Database->fetch_array($res);
         $rows = array_shift($row);
  $total = $rows;
  $pag = new pagination();
  $pag->paging($page,$per_page,$total);
    $offset = $pag->offset();
    $lg = $_SESSION["lgarea"];
    $buy = new buyandsell();
    $buy->select_from_with_lg_and_name($lg,$cat,$per_page,$offset);
echo '<div style="clear:both; margin-left:10%; padding-top:10px; ">';
       if($pag->total_page()  > 1 ){
if ($pag->is_previous_page()){
 echo '<a href="'.$Database->address.'?cat='.$cat.'&lgarea='.$_SESSION["lgarea"].'&page='. $pag->previous_page().'">  &laquo Previous </a>';
}

if ($pag->is_next_page()){
 echo '<a href="'.$Database->address.'?cat='.$cat.'&lgarea='.$_SESSION["lgarea"].'&page='. $pag->next_page().'"> Next &raquo </a>';
}
}
echo '</div>';
	   }else{
	    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    $_SESSION['page'] = $page;
$per_page = 24;
	 $sql = "select count(ad_id)  from goodsandservices";
         $sql .= " where lg_area = ";
         $sql .= "'". $_SESSION['lgarea'] ."'";
         $res = $Database->add_query($sql);
         $row = $Database->fetch_array($res);
         $rows = array_shift($row);
  $total = $rows;
  $pag = new pagination();
  $pag->paging($page,$per_page,$total);
    $offset = $pag->offset();   
	   $buy->select_from_with_lg($_SESSION['lgarea'],$per_page,$offset);
	   if($pag->total_page()  > 1 ){
if ($pag->is_previous_page()){
 echo '<a href="'.$Database->address.'?lgarea='.$_SESSION["lgarea"].'&page='. $pag->previous_page().'">  &laquo Previous </a>';
}

if ($pag->is_next_page()){
 echo '<a href="'.$Database->address.'?lgarea='.$_SESSION["lgarea"].'&page='. $pag->next_page().'"> Next &raquo </a>';
}
}
echo '</div>';
	        }
	}else
	 {
	  $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    $_SESSION['page'] = $page;
$per_page = 24;
	 $sql = "select count(ad_id)  from goodsandservices";
         $sql .= " where lg_area = ";
         $sql .= "'". $_SESSION['lgarea'] ."'";
         $res = $Database->add_query($sql);
         $row = $Database->fetch_array($res);
         $rows = array_shift($row);
  $total = $rows;
  $pag = new pagination();
  $pag->paging($page,$per_page,$total);
    $offset = $pag->offset(); 
	    $buy->select_from_with_lg( $_SESSION['lgarea'],$per_page,$offset);
echo '<div style="clear:both; margin-left:10%; padding-top:10px; ">';
			if($pag->total_page()  > 1 ){
	    if ($pag->is_previous_page()){
	     echo '<a href="'.$Database->address.'?lgarea='.$_SESSION["lgarea"].'&page='. $pag->previous_page().'">  &laquo Previous </a>';
	    }
	    
	    if ($pag->is_next_page()){
	     echo '<a href="'.$Database->address.'?lgarea='.$_SESSION["lgarea"].'&page='. $pag->next_page().'"> Next &raquo </a>';
	    }
	    }
echo '</div>';
   }
   }else
   {
	     if(isset($_GET['cat']))
	     {
	         if($_GET['cat'] != "")
		 {
	            $cat = preg_replace('/[^-a-zA-Z0-9_, ]/', '', $_GET['cat']);
		    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
			     $_SESSION['page'] = $page;
			 $per_page = 24;
				  $sql = "select count(ad_id)  from goodsandservices";
				  $sql .= " where adname like ";
				  $sql .= "'%". $cat ."%'";
				  $res = $Database->add_query($sql);
				  $row = $Database->fetch_array($res);
				  $rows = array_shift($row);
			   $total = $rows;
			   $pag = new pagination();
			   $pag->paging($page,$per_page,$total);
			     $offset = $pag->offset(); 
	            $buy->select_from_with_name($cat,$per_page,$offset);
		    if($pag->total_page()  > 1 ){
echo '<div style="clear:both; margin-left:10%; padding-top:10px; ">';
if ($pag->is_previous_page()){
 echo '<a href="'.$Database->address.'?cat='.$cat.'&lgarea='.$_SESSION["lgarea"].'&page='. $pag->previous_page().'">  &laquo Previous </a>';
}

if ($pag->is_next_page()){
 echo '<a href="'.$Database->address.'?cat='.$cat.'&lgarea='.$_SESSION["lgarea"].'&page='. $pag->next_page().'"> Next &raquo </a>';
}
}
echo '</div>';
	         }else
		 {
		  $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    $_SESSION['page'] = $page;
$per_page = 24;
	$sql ="select count(ad_id)  from goodsandservices";
         $res = $Database->add_query($sql);
         $row = $Database->fetch_array($res);
         $rows = array_shift($row);
  $total = $rows;
  $pag = new pagination();
  $pag->paging($page,$per_page,$total);
    $offset = $pag->offset(); 
	            $buy->select_from($per_page,$offset);
echo '<div style="clear:both; margin-left:10%; padding-top:10px; ">';
	   if($pag->total_page()  > 1 ){
if ($pag->is_previous_page()){
 echo '<a href="'.$Database->address.'?lgarea='.$_SESSION["lgarea"].'&page='. $pag->previous_page().'">  &laquo Previous </a>';
}

if ($pag->is_next_page()){
 echo '<a style="margin-left:10%" href="'.$Database->address.'?lgarea='.$_SESSION["lgarea"].'&page='. $pag->next_page().'"> Next &raquo </a>';
}
}
echo '</div>';
	         }
	      }else
	      {
	       $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    $_SESSION['page'] = $page;
$per_page = 24;
	$sql ="select count(ad_id) from goodsandservices";
         $res = $Database->add_query($sql);
         $row = $Database->fetch_array($res);
         $rows = array_shift($row);
  $total = $rows;
  $pag = new pagination();
  $pag->paging($page,$per_page,$total);
    $offset = $pag->offset(); 
	            $buy->select_from($per_page,$offset);
		    if($pag->total_page()  > 1 ){
if ($pag->is_previous_page()){
 echo '<a href="'.$Database->address.'?page='. $pag->previous_page().'">  &laquo Previous </a>';
}

if ($pag->is_next_page()){
 echo '<a href="'.$Database->address.'?page='. $pag->next_page().'"> Next &raquo </a>';
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
	$sql ="select count(ad_id) from goodsandservices";
         $res = $Database->add_query($sql);
         $row = $Database->fetch_array($res);
         $rows = array_shift($row);
  $total = $rows;
  $pag = new pagination();
  $pag->paging($page,$per_page,$total);
    $offset = $pag->offset(); 
	   $buy->select_from($per_page,$offset);
     echo '<div style="clear:both; margin-left:10%; padding-top:10px; ">';
	   if($pag->total_page()  > 1 ){
if ($pag->is_previous_page()){
 echo '<a href="'.$Database->address.'?page='. $pag->previous_page().'">  &laquo Previous </a>';
}

if ($pag->is_next_page()){
 echo '<a style="margin-left:10%" href="'.$Database->address.'?page='. $pag->next_page().'"> Next &raquo </a>';
}
}
echo '</div>';
	}	 
		 ?>
		 </div>
</div>
	</article>
</div>
  <div style=" clear: both; margin:2px 0">
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
<?php require_once('footer.php');?>
</html>