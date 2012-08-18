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
/* $$$ File_Id : you.php                             >>> Author:ankit $$$ */                       

$_user_location = 'users';
define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
$_custom_css = $_base_path . 'mods/google_app/module.css';
require (AT_INCLUDE_PATH.'header.inc.php');

// fetching module configuration settings from the module database 
$query = "SELECT * FROM ".TABLE_PREFIX."my_admin_settings";
$result = mysql_query($query, $db);
$row = mysql_fetch_array($result);
$my_string = $row['flags'];
$bit = $my_string[0];
$doc = $my_string[1];
$cal = $my_string[2];
$you = $my_string[3];        
?>

<!-- Navigation fieldset -->
<div id="subnavlistcontainer">
    <div id="subnavbacktopage"></div>
    <ul id="subnavlist">
        <li><a href="mods/google_app/index_mystart.php"><?php echo _AT('key_home'); ?></a></li>
<?php
        
	// check if flags are set and enable links
	if($doc){
?>		
		<li><a href="mods/google_app/doc.php"><?php echo _AT('key_docs'); ?></a></li>		
<?php
	}
	if($cal){
?>		
		<li><a href="mods/google_app/Cals.php"><?php echo _AT('key_calendars'); ?></a></li>		
<?php
	}
?>
                <li class="active"><?php echo _AT('key_youtube'); ?></li>
    </ul>
</div>

<!-- Content HTML rendered -->
<div class="input-form">
	<fieldset class="group_form">
            <legend class="group_form"><?php echo _AT('key_youtube'); ?></legend>
            <center>
                <a href="mods/google_app/you_index.php" 
		      onclick="ATutor.poptastic('mods/google_app/you_index.php'); return false;" 
			  target="_new"><?php echo _AT('access_youtube');?></a>
            </center>
            
	</fieldset>	
</div>

<?php require (AT_INCLUDE_PATH.'footer.inc.php'); ?>
 