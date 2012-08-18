<?php
/* * ******************************************************************** */
/* ATutor							          */
/* * ******************************************************************** */
/* Copyright (c) 2002-2012                                                */
/* Inclusive Design Institute	                                          */
/* http://atutor.ca                                                       */
/*                                      			          */
/* This program is free software. You can redistribute it and/or          */
/* modify it under the terms of the GNU General Public License            */
/* as published by the Free Software Foundation.                          */
/* * ******************************************************************** */
/* $$$ File_Id : calendar.php                        >>> Author:ankit $$$ */                       

// check if a session already exists
if(!isset($_SESSION['client_id'])) {
    session_start();
    }

require_once('src/apiClient.php');
require_once('src/contrib/apiCalendarService.php');

$client = new apiClient();
$client->setApplicationName("Google App Module");

$client->setClientId($_SESSION['client_id']);
$client->setClientSecret($_SESSION['client_secret']);
$client->setRedirectUri($_SESSION['redirect_uri']);
$client->setDeveloperKey($_SESSION['developer_key']);

$service = new apiCalendarService($client);

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
?>

<!-- Output Form HTML here -->
Enter details of the event : <br /><br />
<form name="myForm" method="GET" action="calendar.php">
    <label for="title">Title : </label><input type="text" name="title" id="title" value="Title" class="hintTextbox" /> <br/>
    
    <label for="desc">Description : </label><input type="text" name="desc" id="desc" value="Description" class="hintTextbox" /><br />
    
    <label for="where">Where : </label><input type="text" name="where" id="where" value="Where" class="hintTextbox" /><br />
    
    <label for="startdate">Start Date : </label><input type="text" name="startdate" id="startdate" value="YYYY-MM-DD" class="hintTextbox" />&nbsp;&nbsp;&nbsp;&nbsp;
    
    <label for="starttime">Start Time : </label><input type="text" name="starttime" id="starttime" value="HH:MM 24hr format" class="hintTextbox" /><br />
    
    <label for="enddate">End Date : </label><input type="text" name="enddate" id="enddate" value="YYYY-MM-DD" class="hintTextbox" />&nbsp;&nbsp;&nbsp;&nbsp;
    
    <label for="endtime">End Time : </label><input type="text" name="endtime" id="endtime" value="HH:MM 24hr format" class="hintTextbox" /><br />
    
    <label for="offset">GMT/UTC Offset</label><input type="text" name="offset" id="offset" value="[+/-]DD" class="hintTextbox" />
    *Please enter "+05" if your timezone is "GMT+5"<br />
    
    <input type="submit" value="CREATE CALENDAR EVENT" />
</form>

<a href="#" onclick='window.close();'>Close this window</a>
<!-- -->

<?php
  // executing Calendar API code here 
    if(isset($_GET['desc'])){
  $event = new Event();
  $event->setSummary($_GET['desc']);  
  $event->setLocation($_GET['where']);
  
  $start = new EventDateTime();
  $start_string = $_GET['startdate']."T".$_GET['starttime'].":00.000".$_GET['offset'].":00";  
  $start->setDateTime($start_string);
  $event->setStart($start);
  
  $end = new EventDateTime();
  $end_string = $_GET['enddate']."T".$_GET['endtime'].":00.000".$_GET['offset'].":00";  
  $end->setDateTime($end_string);
  $event->setEnd($end); 
  
  $createdEvent = $service->events->insert('primary', $event);
  if(isset($createdEvent)){
    
?>
    <!-- Output HTML here after Calendar event has been created -->
    <center>Google Calendar event created at :&nbsp;
    <a href="<?php echo $createdEvent["htmlLink"]; ?>"><?php echo $createdEvent["summary"]; ?></a><br /><br />
    To embed this Google Calendar event into your course, add the following link : <br />
    <?php // $msg->printErrors('ADDED_CALENDAR_EVENT'); 
	  echo $createdEvent["htmlLink"]; 
    ?>
    <br /><br />
    </center>
    <br /><a href="#" onclick='window.close();'>Close this window</a>

<?php
  } else{
       // $msg->printErrors('FAILED_TO_CREATE_CALENDAR_EVENT');
      echo "Failed to create Calendar event. Please try again.";
  }  
$_SESSION['token'] = $client->getAccessToken();
    }
}
    else {
        $authUrl = $client->createAuthUrl();
        print "<a class='login' href='$authUrl'>Create a Google Calendar Event</a>";
}
?>

  
  