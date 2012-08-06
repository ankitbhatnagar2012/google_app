<?php
// $_user_location	= 'users';
// define('AT_INCLUDE_PATH', '../../include/');
// require (AT_INCLUDE_PATH.'vitals.inc.php');
// $_custom_css = $_base_path . 'mods/google_app/module.css'; // use a custom stylesheet
// require (AT_INCLUDE_PATH.'header.inc.php');
require_once 'src/apiClient.php';
require_once 'src/contrib/apiCalendarService.php';
session_start();

$client = new apiClient();
$client->setApplicationName("Google App Module");

$client->setClientId('555975419430.apps.googleusercontent.com');
$client->setClientSecret('K2nH9SB_8LiaSJpJRkEIKiYd');
$client->setRedirectUri('http://localhost/atutor/ATutor/mods/google_app/calendar.php');
$client->setDeveloperKey('AI39si7MpDpXAQb6cBshuZjZ6p-n4oTcmfxO0_Mfy_zkGuzY88BSeYb8AwgRWtXBvolLjWZKu6pMK3vboJR4EDYTSlUhw8Yknw');

$cal = new apiCalendarService($client);
if (isset($_GET['logout'])) {
  unset($_SESSION['token']);
}

if (isset($_GET['code'])) {
  $client->authenticate();
  $_SESSION['token'] = $client->getAccessToken();
  header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
}

if (isset($_SESSION['token'])) {
  $client->setAccessToken($_SESSION['token']);
}

if ($client->getAccessToken()) {
  $calList = $cal->calendarList->listCalendarList();
  print "<h1>Calendar List</h1><pre>" . print_r($calList, true) . "</pre>";


$_SESSION['token'] = $client->getAccessToken();
} else {
  $authUrl = $client->createAuthUrl();
  print "<a class='login' href='$authUrl'>Connect Me!</a>";
}

?> 
