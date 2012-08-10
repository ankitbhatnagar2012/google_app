<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
// $_user_location	= 'users';
// define('AT_INCLUDE_PATH', '../../include/');
// require(AT_INCLUDE_PATH.'vitals.inc.php');
// $_custom_css = $_base_path . 'mods/google_app/module.css'; // use a custom stylesheet
// require (AT_INCLUDE_PATH.'header.inc.php');
require_once('src/apiClient.php');
require_once('src/contrib/apiCalendarService.php');
//echo $_GET['abc'];
session_start();
$client = new apiClient();
$client->setApplicationName("Google App Module");

$client->setClientId('555975419430.apps.googleusercontent.com');
$client->setClientSecret('K2nH9SB_8LiaSJpJRkEIKiYd');
$client->setRedirectUri('http://localhost/atutor/ATutor/mods/google_app/calendar.php');
$client->setDeveloperKey('AI39si7MpDpXAQb6cBshuZjZ6p-n4oTcmfxO0_Mfy_zkGuzY88BSeYb8AwgRWtXBvolLjWZKu6pMK3vboJR4EDYTSlUhw8Yknw');

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
<!-- Form HTML here -->
Enter details of the event : <br />
<form name="myForm" method="GET" action="calendar.php">
    Title : <input type="text" name="title" value="Title" class="hintTextbox" /><br/>
    Description : <input type="text" name="desc" value="Description" class="hintTextbox" /><br />
    Where : <input type="text" name="where" value="Where" class="hintTextbox" /><br />
    Start Date : <input type="text" name="startdate" value="YYYY-MM-DD" class="hintTextbox" />&nbsp;&nbsp;&nbsp;&nbsp;
    Start Time : <input type="text" name="starttime" value="HH:MM 24hr format" class="hintTextbox" /><br />
    End Date : <input type="text" name="enddate" value="YYYY-MM-DD" class="hintTextbox" />&nbsp;&nbsp;&nbsp;&nbsp;
    End Time : <input type="text" name="endtime" value="HH:MM 24hr format" class="hintTextbox" /><br />
    GMT/UTC Offset : <input type="text" name="offset" value="[+/-]DD" class="hintTextbox" />
    *Please enter "+05" if your timezone is "GMT+5"<br />
    <input type="submit" value="SUBMIT" />
</form>
<!-- -->
<?php
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
    <center>Event created at :&nbsp;
    <a href="<?php echo $createdEvent["htmlLink"] ?>"><?php echo $createdEvent["summary"] ?></a><br /><br />
    To embed this calendar-event in your course content, add the following link : <br /><br />
    <?php echo $createdEvent["htmlLink"] ?><br />
    <?php echo $_config['dummy'] ?>

    </center>
    <br /><a href="Cals.php">Go Back</a>

<?php
  } else{
      echo "Your event could not be created";      
  }  
$_SESSION['token'] = $client->getAccessToken();
    }
}
    else {
        $authUrl = $client->createAuthUrl();
        print "<a class='login' href='$authUrl'>Create a Google Calendar Event</a>";
}
?>

  
  