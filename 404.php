<!DOCTYPE html>
<html lang="en">	
<head>
	<meta charset="utf-8" />
	<title>404 Error Page</title>
	<link type="text/css" rel="stylesheet" href="http://www.zukasell.com/css/main.css">
 <script type="text/javascript" src="http://www.zukasell.com/functions/functions.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >

</head>
<?php
require_once("database.php");
require_once("user.php");
require_once("session.php");
require_once("buyandsellpost.php");
?>
<body class="content" style="background-color:#c8e0d7; width:100% ;  ">
  <?php require_once('header.php'); ?>
  <div class="div404" >
	<div style="" >
  <div style="margin-left:5%; ">
	<p style="font-size:larger"><strong> Oops! Page not Found</strong></p>
  </div>
  <div><p>
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
</p>
	</div>
  <div>
	<p style="margin-left:5%; margin-top: 15px;">Go through our Pages listed here, it may lead you to the right page</p>
	<ul>
		<li>
		<a href="<?php echo $Database->address ?>">Zukasell-homepage</a>	
		</li>
		<li>
		<a href="<?php echo $Database->address ?>Mobile Phones and Tablets/">Zukasell-Mobile Phones and Tablets</a>	
		</li>
		<li>
		<a href="<?php echo $Database->address ?>Electronics/">Zukasell-Electronics</a>	
		</li>
		<li>
		<a href="<?php echo $Database->address ?>Vehicle/">Zukasell-Vehicles</a>	
		</li>
		<li>
		<a href="<?php echo $Database->address ?>Home,Furniture/">Zukasell-Home, Furniture and Garden</a>	
		</li>
		<li>
		<a href="<?php echo $Database->address ?>Real Estate/">Zukasell-Real Estate</a>	
		</li>
		<li>
		<a href="<?php echo $Database->address ?>Fashion and Beauty/">Zukasell-Fashion and Beauty</a>
		</li>
		<li>
		<a href="<?php echo $Database->address ?>Jobs and Services/">Zukasell-Jobs and Services</a>
		</li>
	</ul>
  </div>
  </div>
	<div><p>
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
</p>
	</div>
  </div>
</body>
<?php require_once('footer.php'); ?>
</html>