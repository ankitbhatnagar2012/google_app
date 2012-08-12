<?php
$_user_location = 'users';
define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
$_custom_css = $_base_path . 'mods/google_app/module.css'; // use a custom stylesheet
require (AT_INCLUDE_PATH.'header.inc.php');
// database handling 
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
        <li><a href="<?php echo _AT('BASE_HREF_HOME'); ?>"><?php echo _AT('key_home'); ?></a></li>        		
	<li class="active"><?php echo _AT('key_docs'); ?></li>		
<?php
	if($cal){
?>		
		<li><a href="<?php echo _AT('BASE_HREF_CALS'); ?>"><?php echo _AT('key_calendars'); ?></a></li>		
<?php
	}
	if($you){
?>		
		<li><a href="<?php echo _AT('BASE_HREF_YOU'); ?>"><?php echo _AT('key_youtube'); ?></a></li>		
<?php		
	}  	  
?>      
    </ul>
</div>

<!-- Content HTML rendered --> 
<div class="input-form">
	<fieldset class="group_form">
            <legend class="group_form"><?php echo _AT('key_docs'); ?></legend>
            <center>
                <!-- <a href="mods/google_app/Docs.php"><?php echo _AT('access_docs'); ?></a><br /> -->

		<a href="<?php echo _AT('VITAL_HREF_DOCS'); ?>" 
		      onclick="ATutor.poptastic('<?php echo _AT('VITAL_HREF_DOCS'); ?>'); return false;" 
			  target="_new"><?php echo _AT('access_docs');?></a>		
            </center>
	</fieldset>	
</div>


<?php 
require (AT_INCLUDE_PATH.'footer.inc.php'); 
?>



 
