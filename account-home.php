<?php session_start();
if(!isset($_SESSION['auth']))
{
	header("Location:index_public.php");
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Account Home : After Successfull Login</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 11px;
	color: #333;
}
-->
</style></head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td><strong>Welcome to ATutor....</strong></td>
  </tr>
  <tr>
    <td>You are Sign In with : <strong><?=$_SESSION['auth'] ?></strong> Account, Under the User ID:  <strong><?=$_SESSION['email'] ?></strong></td>
  </tr>
  <tr>
    <td><a href="sign-out.php">Sign Out</a></td>
  </tr>
</table>


</body>
</html>