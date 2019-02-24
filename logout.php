<?php
session_start();
include_once("connection/config.php");
require ("core/init.php");
unset($_SESSION['user_id']);
session_destroy();
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
header('Location: ' . $home_url);
?>