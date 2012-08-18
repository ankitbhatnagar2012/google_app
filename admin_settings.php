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
/* $$$ File_Id : admin_settings.php                  >>> Author:ankit $$$ */                       

define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
admin_authenticate(AT_ADMIN_PRIV_GOOGLE_APP);
$_custom_css = $_base_path . 'mods/google_app/module.css';
require (AT_INCLUDE_PATH.'header.inc.php');    

    // fetch value of $_POST variables. Remember to flush through PHP function addslashes()
    // to eliminate any SQL injections.
    $client_id = addslashes($_POST['client_id']);
    $client_secret = addslashes($_POST['client_secret']);
    $redirect_uri = addslashes($_POST['redirect_uri']);
    
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

    // Calendar settings    
    $query = "DELETE FROM ".TABLE_PREFIX."calendar_settings WHERE idx=1";
    $result = mysql_query($query, $db);
    if(!$result){            
	$success = FALSE;
	}
	  else{
	$success = TRUE; 
	}
    $query = "INSERT INTO ".TABLE_PREFIX."calendar_settings VALUES (1,'$client_id','$client_secret','$redirect_uri')";
    $result = mysql_query($query, $db);
    if(!$result){            
	$success = FALSE;
	}
	  else{
	$success = TRUE; 
	}

    if($success){
	  $msg->printFeedbacks('ADMIN_SETTINGS_SAVED_SUCCESSFULLY');
    } else {
	  $msg->printErrors('ADMIN_SETTINGS_SAVED_FAILED');
	}    
?>
<?php require (AT_INCLUDE_PATH.'footer.inc.php'); ?>





