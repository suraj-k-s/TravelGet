<?php

session_start();
include('../Assets/Connection/Connection.php');
include("Head.php");

if(isset($_POST['btnsave']))
{
	$upQry="update tbl_complaint set complaint_reply='".$_POST["txtreply"]."',complaint_status='1',complaint_reply_date=curdate() where complaint_id='".$_SESSION["compid"]."'";
	if($con->query($upQry))
	{
		header("location:SolvedComplaints.php");
	}
	else
	{
		echo "Database insertion failure";
	}
}




?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel-Get:Reply</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="383" height="85" border="1" align="center">
    <tr>
      <td>Reply Messgae</td>
      <td><textarea name="txtreply" id="txtreply"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
  <label for="txtreply"></label>
</form>
</body>
<?php include("Foot.php"); ?>
</html>



