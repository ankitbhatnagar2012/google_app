<?php
$_user_location = 'users';
define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
$_custom_css = $_base_path . 'mods/google_app/module.css';
require (AT_INCLUDE_PATH.'header.inc.php');
// fetching module configs 
$query = "SELECT * FROM ".TABLE_PREFIX."my_admin_settings";
$result = mysql_query($query, $db);
$row = mysql_fetch_array($result);
$my_string = $row['flags'];
$bit = $my_string[0];
$doc = $my_string[1];
$cal = $my_string[2];
$you = $my_string[3];
// fetching calendar configs 
$query = "SELECT * FROM ".TABLE_PREFIX."calendar_settings";
$result = mysql_query($query, $db);
$row = mysql_fetch_array($result);
$href_string = "mods/google_app/calendar.vitals.inc.php?a=".$row['client_id'].
		    "&b=".$row['client_secret'].
		    "&c=".$row['redirect_uri'].
		    "&d=".$row['developer_key'];
?>

<!-- Navigation fieldset -->
<div id="subnavlistcontainer">
    <div id="subnavbacktopage"></div>
    <ul id="subnavlist">
        <li><a href="mods/google_app/index_mystart.php"><?php echo _AT('key_home'); ?></a></li>
<?php
        
	// check if flags are set
	if($doc){
?>		
		<li><a href="mods/google_app/doc.php"><?php echo _AT('key_docs'); ?></a></li>		
<?php
	}
?>
                <li class="active"><?php echo _AT('key_calendars'); ?></li>
<?php
	if($you){
?>		
		<li><a href="mods/google_app/you.php"><?php echo _AT('key_youtube'); ?></a></li>		
<?php		
	}  	  
?>      
    </ul>
</div>

<!-- Content HTML rendered -->
<div class="input-form">
	<fieldset class="group_form">
            <legend class="group_form"><?php echo _AT('key_calendars'); ?></legend>
            <center>                
		<a href="<?php echo $href_string; ?>" 
		      onclick="ATutor.poptastic('<?php echo $href_string; ?>'); return false;" 
			  target="_new"><?php echo _AT('access_calendars');?></a>
            </center>
	</fieldset>	
</div>

<?php 
require (AT_INCLUDE_PATH.'footer.inc.php'); 
?>
