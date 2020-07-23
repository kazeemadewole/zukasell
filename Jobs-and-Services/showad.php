<?php
session_start();
require_once("../database.php");
require_once("../user.php");
require_once("../buyandsellpost.php");
$page = "http://www.zukasell.com/";
$id = preg_replace('/[^0-9]/', '', $_GET['ad_id']);
$adname = preg_replace('/[^0-9a-z-_A-Z.]/', '', $_GET['adname']);
$adname = str_replace('-', ' ', $adname);
$sql = "select description,category, subcategory from goodsandservices";
     $sql .= " where ad_id = ";
     $sql .= "'".$id."'";
     $sql .= " limit 1 ";
 
    $res = $Database->add_query($sql);
    $result = $Database->fetch_array($res);
$desc = $result['description'];
$cat = $result['category'];
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
	<title><?php echo $adname ?></title>
<meta name="description" content="<?php echo $adname ?>: <?php echo $desc ?> " /> 
	<link type="text/css" rel="stylesheet" href="http://www.zukasell.com/css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
       
    <meta name="keywords" content="<?php echo $cat ?>, <?php echo $adname ?>"/>
    
    
          <meta property="og:locale" content="en_EN" />
    
          <meta property="og:type" content="website" />
    
          <meta property="og:title" content="<?php echo $adname ?> in <?php echo $cat ?> | Zukasell.com" />
    
          <meta property="og:description" content="<?php echo $adname ?>: <?php echo $desc ?>" />
    
          <meta property="og:site_name" content="Zukasell.com — #1 Nigerian Commercial Website." />
       <script type="text/javascript" src="http://www.zukasell.com/functions/functions.js"></script>
</head>

<body class="content" style="background-color:#949d85; width:100% ; ">
<?php include_once("../analyticstracking.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/header.php');
 ?>  
 <div class="show_ad_content" >
<div style="margin:2px 0; clear: both">
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
<div>
<?php
$buy = new buyandsell();
 $buy->show_ad($id);
?>
</div>
<div style="clear:both"></div>
<div style="clear:both; margin-top:20px;" class="showad_ad_familiar" >
<p>RELATED ADS</p>
<div style="margin:5px 0 ">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- zukksk mobile -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-9386381840362693"
     data-ad-slot="3057336364"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                    
</div>
<div >
<?php
$buy->show_familiar($id);
?>
</div>
</div>
</div>
<div style="clear:both"></div>
</body>
<?php require_once('../footer.php');?>
</html>
        