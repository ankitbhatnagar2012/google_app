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
        <li><a href="mods/google_app/index_mystart.php">Home</a></li>        		
	<li class="active">Google Docs</li>		
<?php
	if($cal){
?>		
		<li><a href="mods/google_app/Cals.php">Google Calendars</a></li>		
<?php
	}
	if($you){
?>		
		<li><a href="mods/google_app/you.php">Youtube</a></li>		
<?php		
	}  	  
?>      
    </ul>
</div>

<!-- Content HTML rendered --> 
<div class="input-form">
	<fieldset class="group_form">
            <legend class="group_form">Google Docs</legend>
            <!--
            <center>
                <a href="mods/google_app/Docs.php" target="iframe_target">Access Google Docs</a>
            </center>
            <iframe src="" name="iframe_target" frameborder="0" width="100%" height="500px"></iframe>
            -->
            <center>
                <a href="mods/google_app/Docs.php"><?php echo _AT('access_docs'); ?></a>
            </center>
	</fieldset>	
</div>


<?php 
require (AT_INCLUDE_PATH.'footer.inc.php'); 
?>



 
