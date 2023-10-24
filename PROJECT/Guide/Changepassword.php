<?php
include("../Assets/Connection/Connection.php");
session_start();


if(isset($_POST['btn_Change']))
{
	
	$email=$_SESSION['guideemail'];
	$guideid=$_SESSION['gid'];
	
	$currentpwd=$_POST['txt_password'];
	$newpassword=$_POST['txt_newpassword'];
	$confirmpassword=$_POST['txt_confirmnewpassword'];
	
	
	$selQry = "select * from tbl_guide where guide_email='$email' and guide_password='$currentpwd' and guide_id='$guideid'";
	$resultguide = $con->query($selQry);

	if($rowUser = $resultguide->fetch_assoc())
	{
		if($newpassword==$confirmpassword)
		{
			$upQry="update tbl_guide set guide_password='$newpassword' where guide_id='$guideid'";
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
include("Head.php");
?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="312" height="187" border="1">
    <tr>
      <td>Current password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr>
      <td>New password</td>
      <td><label for="txt_newpassword"></label>
      <input type="text" name="txt_newpassword" id="txt_newpassword" /></td>
    </tr>
    <tr>
      <td>Confirm new password</td>
      <td><label for="txt_confirmnewpassword"></label>
      <input type="text" name="txt_confirmnewpassword" id="txt_confirmnewpassword" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_Change" id="btn_change" value="Change" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  <a href="HomePage.php">Back to homepage</a>
</form>
</body>
<?php include("Foot.php"); ?>
</html>