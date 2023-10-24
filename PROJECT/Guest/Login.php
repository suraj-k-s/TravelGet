<?php
include("../Assets/Connection/Connection.php");


session_start();


if(isset($_POST['btn_login']))
{
	
	
	$email=$_POST['txt_email'];
	$password=$_POST['txt_password'];
	
	
	$selAdmin = "select * from tbl_admin where admin_email='$email' and admin_password='$password'";
	$resultAdmin = $con->query($selAdmin);
	
	$selUser = "select * from tbl_user where user_email='$email' and user_password='$password'";
	$resultUser = $con->query($selUser);
	
	$selGuide = "select * from tbl_guide where guide_email='$email' and guide_password='$password' and guide_status='1'";
	$resultGuide = $con->query($selGuide);
	
	
	
	
	if($row = $resultAdmin->fetch_assoc())
	{
		$_SESSION['aid'] = $row['admin_id'];
		$_SESSION['adminname'] = $row['admin_name'];
		header("location:../Admin/HomePage.php");
	}
	else if($row = $resultUser->fetch_assoc())
	{
		$_SESSION['uid'] = $row['user_id'];
		$_SESSION['userfirstname'] = $row['user_first_name'];
		$_SESSION['useremail'] = $row['user_email'];
		$_SESSION['userlastname'] = $row['user_last_name'];
		header("location:../User/HomePage.php");
	  
	}
	else if($row = $resultGuide->fetch_assoc())
	{
		$_SESSION['gid'] = $row['guide_id'];
		
		$_SESSION['guidefirstname'] = $row['guide_first_name'];
		$_SESSION['guidelastname'] = $row['guide_last_name'];
		$_SESSION['guideemail']= $row['guide_email'];
		header("location:../Guide/HomePage.php");
	}
	else
	{
		echo " Please enter a valid email and password";
	}
	
}
	include("Head.php");
	
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel-GET::Login</title>
</head>

<body>
	<h2>Login</h2>
<form id="form1" name="form1" method="post" action="">
  <table width="403" border="1" align="center">
    <tr>
      <td width="134" height="44">Email</td>
      <td width="253"><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td height="29">Password</td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr>
      <td height="31" colspan="2" align="center"><input type="submit" name="btn_login" id="btn_login" value="Login" /></td>
    </tr>
    
  </table>
</form>
</body>
<?php
include("Foot.php");
	
?>
</html>