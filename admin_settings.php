<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
admin_authenticate(AT_ADMIN_PRIV_GOOGLE_APP);
$_custom_css = $_base_path . 'mods/google_app/module.css';
require (AT_INCLUDE_PATH.'header.inc.php');

    // check _POST vars
    $client_id = addslashes($_POST['client_id']);
    $client_secret = addslashes($_POST['client_secret']);
    $redirect_uri = addslashes($_POST['redirect_uri']);
    $developer_key = addslashes($_POST['developer_key']);

    // Calendar settings
    $query = "DELETE FROM ".TABLE_PREFIX."calendar_settings WHERE idx=1";
    $result = mysql_query($query, $db);
    if(!$result){            
            $success = FALSE;
        }
        else{
            $success = TRUE; 
        }
    $query = "INSERT INTO ".TABLE_PREFIX."calendar_settings VALUES (1,'$client_id','$client_secret','$redirect_uri','$developer_key')";
    $result = mysql_query($query, $db);
    if(!$result){            
            $success = FALSE;
        }
        else{
            $success = TRUE; 
        }
    
    // Module settings
    if(isset($_POST['doc'])){
		$doc = addslashes($_POST['doc']);
    } else {
		$doc = 0;
	}
    
    if(isset($_POST['cal'])){
		$cal = addslashes($_POST['cal']);
    } else {
		$cal = 0;
	}

    if(isset($_POST['you'])){
		$you = addslashes($_POST['you']);
    } else {
		$you = 0;
	}    
    
    $flag = "1". $doc . $cal. $you;
    
    $query = "SELECT * FROM ".TABLE_PREFIX."my_admin_settings";
    $result = mysql_query($query, $db);
    $row = mysql_fetch_array($result) ;
    if(!$row){
	$query = "INSERT INTO ".TABLE_PREFIX."my_admin_settings(idx, flags) VALUES ('1', $flag)";
  	$result = mysql_query($query, $db);
        if(!$result){            
            $success = FALSE;
        }
        else{
            $success = TRUE;
        }
    } else {
	$query = "DELETE FROM ".TABLE_PREFIX."my_admin_settings WHERE idx='1'";
  	$result = mysql_query($query, $db);	
        $query = "INSERT INTO ".TABLE_PREFIX."my_admin_settings(idx, flags) VALUES ('1', $flag)";
  	$result = mysql_query($query, $db);
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





