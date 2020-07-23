<?php
session_start();
require_once("database.php");
require_once("session.php");
$session->log_out();
?>