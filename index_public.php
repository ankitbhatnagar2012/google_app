<?php
$_user_location	= 'public';
define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
$_custom_css = $_base_path . 'mods/google_app/module.css'; // use a custom stylesheet
require (AT_INCLUDE_PATH.'header.inc.php');
?>
<div id="google_app"><?php echo _AT('admin_public'); ?></div>
<?php require (AT_INCLUDE_PATH.'footer.inc.php'); ?>