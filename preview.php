<?php
session_start();
require_once('header.php');
require_once('session.php');
require_once('buyandsellpost.php');
$id = $_GET['id'];
?>
<div style="max-height:500px;overflow: auto; width: 75%; margin-left:0; float: left"><?php
$buy = new buyandsell();
$user = $session->user_id;
$buy->select_for_ad($id,$user);

?>
</div>
<div class="previewpage_sidebar">
   <a href="<?php echo $Database->address ?>edit_ad_page.php?id=<?php echo $id ?>" style="color: white"> <p style="padding: 10px 0;margin-top: 20px; background-color:#008080;text-align: center">Edit Ad</p></a>
    <a href="javascript://" onclick="myads_delete('.$this->id .')" style="color: white"><p style="padding: 10px 0; margin-top: 20px; background-color:brown;text-align: center">Delete Ad</p></a>
</div>
