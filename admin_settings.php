<?php
define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
admin_authenticate(AT_ADMIN_PRIV_GOOGLE_APP);
$_custom_css = $_base_path . 'mods/google_app/module.css';
require (AT_INCLUDE_PATH.'header.inc.php');

    
    if(isset($_GET['doc'])){
		$doc = $_GET['doc'];
    } else {
		$doc = 0;
	}
    if(isset($_GET['cal'])){
		$cal = $_GET['cal'];
    } else {
		$cal = 0;
	}
	if(isset($_GET['you'])){
		$you = $_GET['you'];
    } else {
		$you = 0;
	}    
    
    $flag = "1".$doc . $cal. $you;
    
    $query = "SELECT * FROM ".TABLE_PREFIX."my_admin_settings";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result) ;
    if(!$row){
	$query = "INSERT INTO ".TABLE_PREFIX."my_admin_settings(idx, flags) VALUES ('1', $flag)";
  	$result = mysql_query($query);
        if(!$result){            
            die("Could not execute query successfully");
        }
        else{
            $msg->printFeedbacks('ADMIN_SETTINGS_SAVED_SUCCESSFULLY');
        }
    } else {
	$query = "DELETE FROM ".TABLE_PREFIX."my_admin_settings WHERE idx='1'";
  	$result = mysql_query($query);	
        $query = "INSERT INTO ".TABLE_PREFIX."my_admin_settings(idx, flags) VALUES ('1', $flag)";
  	$result = mysql_query($query);
        if(!$result){            
            die("Could not execute query successfully");
        }
        else{
            $msg->printFeedbacks('ADMIN_SETTINGS_SAVED_SUCCESSFULLY');
        }
    }
    ?>

<?php require (AT_INCLUDE_PATH.'footer.inc.php'); ?>





