<?php
session_start();
require_once('../header.php');
require_once('../session.php');
require_once('../buyandsellpost.php');
$id = preg_replace('/[^0-9]/', '', $_GET['id']);
$adname = preg_replace('/[^0-9a-zA-Z- ]/', '', $_GET['adname']);
$sadname = str_replace('-',' ',$adname);
?>
<!DOCTYPE html>
<html lang="en">	
<head>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="http://www.zukasell.com/css/main.css">
	<script type="text/javascript" src="http://www.zukasell.com/functions/functions.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
</head>
<body>
<div style="clear:both"></div>
<div style="width:100%;">

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
<div style="max-height:500px;overflow: auto; width: 75%; margin:0; float: left;">
<div style="background-color:#f2f2f2"><p style="margin-left:5%">
<a href="<?php echo $Database->address ?>myads.php">Back to Ad</a>
</p></div>
<?php
$buy = new buyandsell();
$user = $session->user_id;
$buy->select_for_ad($id,$user,$sadname);

?>
</div>
<div class="previewpage_sidebar" style="float:left">
   <a href="<?php echo $Database->address ?>Electronics/edit_ad_page.php?ad_id=<?php echo $id ?>&adname=<?php echo $adname ?>" style="color: white"> <p style="padding: 10px 0;margin-top: 20px; background-color:#008080;text-align: center">Edit Ad</p></a>
    <a href="javascript://" onclick="myads_delete('.$id .')" style="color: white"><p style="padding: 10px 0; margin-top: 20px; background-color:brown;text-align: center">Delete Ad</p></a>
</div>
</div>
</body>
<?php require_once('../footer.php');?>
</html>
