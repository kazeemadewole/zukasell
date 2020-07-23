<?php
require_once('database.php');
require_once ('session.php');
$id = $_GET['id'];
$sql = "DELETE from goodsandservices ";
$sql .=" where ad_id = ";
$sql .= "'".$id."'";
$sql .= " and user_id = ";
$sql .= "'".$session->user_id."'";
$sql .= " LIMIT 1";
$res = $Database->add_query($sql);
?>