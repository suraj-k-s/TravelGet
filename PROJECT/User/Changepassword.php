<?php
include("../Assets/Connection/Connection.php");


session_start();
include("Head.php");

if(isset($_POST['btn_Change']))
{
	
	$email=$_SESSION['useremail'];
	$userid=$_SESSION['uid'];
	
	$currentpwd=$_POST['txt_password'];
	$newpaassword=$_POST['txt_newpassword'];
	$confirmpassword=$_POST['txt_confirmnewpassword'];
	
	
	$selQry = "select * from tbl_user where user_email='$email' and user_password='$currentpwd' and user_id='$userid'";
	$resultUser = $con->query($selQry);

	if($rowUser = $resultUser->fetch_assoc())
	{
		if($newpaassword==$confirmpassword)
		{
			$upQry="update tbl_user set user_password='$newpaassword' where user_id='$userid'";
			if($con->query($upQry))
				{
							
							echo "Password Changed...";
				}
				else
				{
							echo "Database insertion failure";
				}
		}
		else
		{
			
				echo "Password not same...";
		
		}
		
	}
    else
	{	
	echo "Please type correct current password";
	
	
    } 
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel-Get: Change password</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="529" height="170" border="1">
    <tr>
      <td>Current Password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_newpassword"></label>
      <input type="text" name="txt_newpassword" id="txt_newpassword" /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_confirmnewpassword"></label>
      <input type="text" name="txt_confirmnewpassword" id="txt_confirmnewpassword" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_Change" id="btn_change" value="Change" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
</table>
  <a href="HomePage.php">Back to homepage</a>
 <?php  include("Foot.php"); ?>