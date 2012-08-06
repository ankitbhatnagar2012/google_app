<?php
//doesn't allow this file to be loaded with a browser.
if (!defined('AT_INCLUDE_PATH')) { exit; }

// set the file to be loaded within the module object
if (!isset($this) || (isset($this) && (strtolower(get_class($this)) != 'module'))) { exit(__FILE__ . ' is not a Module'); }

//assign the instructor and admin privileges to the constants.
define('AT_PRIV_GOOGLE_APP',       $this->getPrivilege() );
define('AT_ADMIN_PRIV_GOOGLE_APP', $this->getAdminPrivilege() );

/*******
 * create a side menu box/stack.
 */
$this->_stacks['google_app'] = array('title_var'=>'google_app', 'file'=>'mods/google_app/side_menu.inc.php');
// ** possible alternative: **
// $this->addStack('hello_world', array('title_var' => 'hello_world', 'file' => './side_menu.inc.php');

/*******
 * create optional sublinks for module "detail view" on course home page
 * when this line is uncommented, "mods/hello_world/sublinks.php" need to be created to return an array of content to be displayed
 */
//$this->_list['hello_world'] = array('title_var'=>'hello_world','file'=>'mods/hello_world/sublinks.php');

// Uncomment for tiny list bullet icon for module sublinks "icon view" on course home page
//$this->_pages['mods/hello_world/index.php']['icon']      = 'mods/hello_world/hello_world_sm.jpg';

// Uncomment for big icon for module sublinks "detail view" on course home page
//$this->_pages['mods/hello_world/index.php']['img']      = 'mods/hello_world/hello_world.jpg';

// ** possible alternative: **
// the text to display on module "detail view" when sublinks are not available
$this->_pages['mods/google_app/index.php']['text']      = _AT('google_app_text');

/*******
 * if this module is to be made available to students on the Home or Main Navigation.
 */
$_group_tool = $_student_tool = 'mods/google_app/index.php';

/*******
 * add the admin pages when needed.
 */
if (admin_authenticate(AT_ADMIN_PRIV_GOOGLE_APP, TRUE) || admin_authenticate(AT_ADMIN_PRIV_ADMIN, TRUE)) {
	$this->_pages[AT_NAV_ADMIN] = array('mods/google_app/index_admin.php');
	$this->_pages['mods/google_app/index_admin.php']['title_var'] = 'google_app';
	$this->_pages['mods/google_app/index_admin.php']['parent']    = AT_NAV_ADMIN;
        
        $this->_pages['mods/google_app/admin_settings.php']['title_var'] = 'google_app';
	$this->_pages['mods/google_app/admin_settings.php']['parent']    = AT_NAV_ADMIN;
}

/*******
 * instructor Manage section:
 */
$this->_pages['mods/google_app/index_instructor.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/index_instructor.php']['parent']   = 'tools/index.php';
// ** possible alternative: **
// $this->pages['./index_instructor.php']['title_var'] = 'hello_world';
// $this->pages['./index_instructor.php']['parent']    = 'tools/index.php';

/*******
 * student page.
 */
$this->_pages['mods/google_app/index.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/index.php']['img']       = 'mods/google_app/google_app.jpg';

/* public pages */
$this->_pages[AT_NAV_PUBLIC] = array('mods/google_app/index_public.php');
$this->_pages['mods/google_app/index_public.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/index_public.php']['parent'] = AT_NAV_PUBLIC;

/* my start page pages */
$this->_pages[AT_NAV_START]  = array('mods/google_app/index_mystart.php');
$this->_pages['mods/google_app/index_mystart.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/index_mystart.php']['parent'] = AT_NAV_START;

$this->_pages['mods/google_app/doc.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/doc.php']['parent'] = AT_NAV_START;

$this->_pages['mods/google_app/you.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/you.php']['parent'] = AT_NAV_START;

$this->_pages['mods/google_app/Cals.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/Cals.php']['parent'] = AT_NAV_START;

$this->_pages['mods/google_app/createEventForm.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/createEventForm.php']['parent'] = AT_NAV_START;

$this->_pages['mods/google_app/createEvent.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/createEvent.php']['parent'] = AT_NAV_START;

$this->_pages['mods/google_app/getEvent.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/getEvent.php']['parent'] = AT_NAV_START;

$this->_pages['mods/google_app/calendar.php']['title_var'] = 'google_app';
$this->_pages['mods/google_app/calendar.php']['parent'] = AT_NAV_START;

function google_app_get_group_url($group_id) {
	return 'mods/google_app/index.php';
}
?>