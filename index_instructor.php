<?php
define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
authenticate(AT_PRIV_GOOGLE_APP);
require (AT_INCLUDE_PATH.'header.inc.php');
?>

<div id="google_app">
    This is the instructor's page for the Google App Module....<br />
    Coding here.....
</div>

<?php require (AT_INCLUDE_PATH.'footer.inc.php'); ?>