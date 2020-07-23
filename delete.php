<?php
require_once('database.php');
$id = $_GET['id'];
$sql = "DELETE from message_counts ";
$sql .=" where ad_id = ";
$sql .= "'".$id."'";
$sql .= " LIMIT 1";
$res = $Database->add_query($sql);



?>