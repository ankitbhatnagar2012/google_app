<?php
//doesn't allow this file to be loaded with a browser.
if (!defined('AT_INCLUDE_PATH')) { exit; }

// set the file to be loaded within the module object
if (!isset($this) || (isset($this) && (strtolower(get_class($this)) != 'module'))) { exit(__FILE__ . ' is not a Module'); }

//assign the instructor and admin privileges to the constants.
define('AT_PRIV_GOOGLE_APP',       $this->getPrivilege() );
define('AT_ADMIN_PRIV_GOOGLE_APP', $this->getAdminPrivilege() );

$this->_pages['mods/google_app/index.php']['text']      = _AT('google_app_text');

/*******
 * if this module is to be made available to students on the Home or Main Navigation.
 */
$_group_tool = $_student_tool = 'mods/google_app/index.php';

/*******
 * Admin pages
 */
if (admin_authenticate(AT_ADMIN_PRIV_GOOGLE_APP, TRUE) || admin_authenticate(AT_ADMIN_PRIV_ADMIN, TRUE)) {
	$this->_pages[AT_NAV_ADMIN] = array('mods/google_app/index_admin.php');
	$this->_pages['mods/google_app/index_admin.php']['title_var'] = 'google_app';
	$this->_pages['mods/google_app/index_admin.php']['parent']    = AT_NAV_ADMIN;
        
        $this->_pages['mods/google_app/admin_settings.php']['title_var'] = 'google_app';
	$this->_pages['mods/google_app/admin_settings.php']['parent']    = AT_NAV_ADMIN;
}

/*******
 * Instructor Manage section:
 */

$this->_pages['mods/google_app/index_instructor.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/index_instructor.php']['parent']   = 'tools/index.php';

/*******
 * Student pages.
 */

$this->_pages['mods/google_app/index.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/index.php']['img']       = 'mods/google_app/google_app.jpg';

/******* 
 * Public pages
 */

$this->_pages[AT_NAV_PUBLIC] = array('mods/google_app/index_public.php');
$this->_pages['mods/google_app/index_public.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/index_public.php']['parent'] = AT_NAV_PUBLIC;

$this->_pages[AT_NAV_START]  = array('mods/google_app/index_mystart.php');
$this->_pages['mods/google_app/index_mystart.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/index_mystart.php']['parent'] = AT_NAV_START;

$this->_pages['mods/google_app/doc.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/doc.php']['parent'] = AT_NAV_START;

$this->_pages['mods/google_app/you.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/you.php']['parent'] = AT_NAV_START;

$this->_pages['mods/google_app/Cals.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/Cals.php']['parent'] = AT_NAV_START;

$this->_pages['mods/google_app/calendar.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/calendar.php']['parent'] = AT_NAV_START;

function google_app_get_group_url($group_id) {
	return 'mods/google_app/index.php';
}
?>