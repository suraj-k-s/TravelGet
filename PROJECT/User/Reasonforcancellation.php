<?php
session_start();
include('../Assets/Connection/Connection.php');
if(isset($_POST["btn_submit"]))
{ 
    $bid=$_GET["breject"];
    $reason=$_POST['txt_reason'];
	$username=$_SESSION['userfirstname'];
	$insQry="insert into tbl_package_cancellation (cancellation_reason,user_id,user_name,booking_id,package_id,cancellation_date) values('$reason','".$_SESSION['uid']."','$username','$bid','".$_GET['pid']."',curdate())";
	$con->query($insQry);
	if(isset($_GET["breject"]))
		{
			$bid=$_GET['breject'];
			$updqry="update tbl_packagebooking set booking_status='2' where booking_id='$bid' ";
			$con->query($updqry);
			header("location:MyBooking.php");
		}
}
include("Head.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Reason for cancellaton</td>
    </tr>
    <tr>
      <td><label for="txt_reason6"></label>
      <textarea name="txt_reason" id="txt_reason6" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
<?php include("Head.php"); ?>
</html>