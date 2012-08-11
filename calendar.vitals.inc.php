<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// storing credentials in session
session_start();
$_SESSION['client_id'] = addslashes($_GET['a']);
$_SESSION['client_secret'] = addslashes($_GET['b']);
$_SESSION['redirect_uri'] = addslashes($_GET['c']);
$_SESSION['developer_key'] = addslashes($_GET['d']);

include 'calendar.php';
?>

 
