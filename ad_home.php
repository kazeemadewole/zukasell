<?php
session_start();
require_once("includes/session.php");
require_once("header.php");
require_once("includes/database.php");
require_once("includes/user.php");
require_once("includes/buyandsellpost.php");
?>
<div style="clear:both"></div>
<div class="content" style="width: 100%">
<div style="margin-top: 20px; margin-bottom: 10px">
<a href="buyandsellad.php"><button style="padding:5px">Place an Ad</button></a><span style="margin-left: 5%"><a href="buyandsell.php"><button style="padding:5px">Ad Arena</button></a></span><span style="margin-left: 5%"><a href="ad_home.php"><button style="padding:5px">My Ads</button></a></span>
</div>

<div>
<div style="margin-top: 20px; margin-bottom: 10px">

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- sharingresponsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9386381840362693"
     data-ad-slot="7955621162"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<?php
$table = User::$country."adtable";
$buy = new buyandsell();
if(User::$country != ""){
$buy->show_user_post($_SESSION['user_id'], $table);
}else{
echo "update your home country";
}
 ?>
</div>
<div style="margin-top:20px; margin- bottom: 40px">

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- sharingresponsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9386381840362693"
     data-ad-slot="7955621162"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
</div>
<?php 
require_once('includes/footer.php');
?>