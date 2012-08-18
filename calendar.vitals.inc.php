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
/* $$$ File_Id : calendar.vitals.inc.php             >>> Author:ankit $$$ */                       

// storing Google API credentials in session
  session_start();
  $_SESSION['client_id'] = addslashes($_GET['a']);
  $_SESSION['client_secret'] = addslashes($_GET['b']);
  $_SESSION['redirect_uri'] = addslashes($_GET['c']);
  $_SESSION['developer_key'] = 'AI39si7MpDpXAQb6cBshuZjZ6p-n4oTcmfxO0_Mfy_zkGuzY88BSeYb8AwgRWtXBvolLjWZKu6pMK3vboJR4EDYTSlUhw8Yknw';

// redirecting to Calendar API code
  include 'calendar.php';
?>

 
