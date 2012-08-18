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
/* $$$ File_Id : index_public.php                  >>> Author:ankit $$$ */                       

// This file contains the code that is executed when the module is not logged.
 
$_user_location	= 'public';
define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
$_custom_css = $_base_path . 'mods/google_app/module.css'; // use a custom stylesheet
require (AT_INCLUDE_PATH.'header.inc.php');
?>

<div id="google_app"><?php echo _AT('admin_public'); ?></div>

<?php require (AT_INCLUDE_PATH.'footer.inc.php'); ?>