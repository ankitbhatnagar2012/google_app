<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
admin_authenticate(AT_ADMIN_PRIV_GOOGLE_APP);
$_custom_css = $_base_path . 'mods/google_app/module.css';
require (AT_INCLUDE_PATH.'header.inc.php');

    // check _POST vars
    echo $_POST['client_id'];
    echo $_POST['client_secret'];
    echo $_POST['redirect_uri'];
    echo $_POST['developer_key'];


    // Calendar settings
    $query = "REPLACE INTO AT_config VALUES ('google_app_client_id',$_POST['client_id'])";
    mysql_query($query, $db);
    /*
    $query = "DELETE FROM AT_calendar_settings WHERE idx=1";
    $result = mysql_query($query);
    $query = "INSERT INTO AT_calendar_settings VALUES ('1', 
		$_POST['client_id'],
		$_POST['client_secret'],
		$_POST['redirect_uri'],
		$_POST['developer_key'])";
    $result = mysql_query($query);
    if(!$result){            
            die("Could not execute query successfully");
        }
        else{
            $success = TRUE; 
        }
    */

    // Module settings
    if(isset($_POST['doc'])){
		$doc = $_POST['doc'];
    } else {
		$doc = 0;
	}
    
    if(isset($_POST['cal'])){
		$cal = $_POST['cal'];
    } else {
		$cal = 0;
	}

    if(isset($_POST['you'])){
		$you = $_POST['you'];
    } else {
		$you = 0;
	}    
    
    $flag = "1". $doc . $cal. $you;
    
    $query = "SELECT * FROM ".TABLE_PREFIX."my_admin_settings";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result) ;
    if(!$row){
	$query = "INSERT INTO ".TABLE_PREFIX."my_admin_settings(idx, flags) VALUES ('1', $flag)";
  	$result = mysql_query($query);
        if(!$result){            
            $success = FALSE;
        }
        else{
            $success = TRUE;
        }
    } else {
	$query = "DELETE FROM ".TABLE_PREFIX."my_admin_settings WHERE idx='1'";
  	$result = mysql_query($query);	
        $query = "INSERT INTO ".TABLE_PREFIX."my_admin_settings(idx, flags) VALUES ('1', $flag)";
  	$result = mysql_query($query);
        if(!$result){            
            $success = FALSE;
        }
        else{
            $success = TRUE; 
        }
    }

    if($success){
	  $msg->printFeedbacks('ADMIN_SETTINGS_SAVED_SUCCESSFULLY');
    } else {
	  $msg->printErrors('ADMIN_SETTINGS_SAVED_FAILED');
	}    
?>
<?php require (AT_INCLUDE_PATH.'footer.inc.php'); ?>





