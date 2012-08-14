<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// storing credentials in session
session_start();
$_SESSION['client_id'] = addslashes($_GET['a']);
$_SESSION['client_secret'] = addslashes($_GET['b']);
$_SESSION['redirect_uri'] = addslashes($_GET['c']);
$_SESSION['developer_key'] = 'AI39si7MpDpXAQb6cBshuZjZ6p-n4oTcmfxO0_Mfy_zkGuzY88BSeYb8AwgRWtXBvolLjWZKu6pMK3vboJR4EDYTSlUhw8Yknw';
// redirecting to API code
include 'calendar.php';
?>

 
