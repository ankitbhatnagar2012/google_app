<?php
//
// Generic interaction code to the module
//
$_user_location	= 'public';

define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
$_custom_css = $_base_path . 'mods/google_app/module.css'; // use a custom stylesheet
require (AT_INCLUDE_PATH.'header.inc.php');
?>

<div id="google_app">
	Welcome to Google App Module for ATutor that helps you create and share highly interactive course content using Google Apps from within ATutor.<br />
Features:<br />
<ul>
  <li>Use Google Docs to share your documents, presentations and spreadsheets in the ATutor course cartridge.</li>
  <li>Use Youtube to upload and share course videos in the courses as well.</li>
  <li>Use Google Calendars to include and share important dates and events with respect to the course.</li>
</ul>
<br />
<br />
<center> 
<h2><b>Login with your</b> <a href="mods/google_app/google/login.php?login=true&openid_provider=google"><img src="./mods/google_app/login.jpg" /></a></h2>
</center>
</div>

<?php require (AT_INCLUDE_PATH.'footer.inc.php'); ?>