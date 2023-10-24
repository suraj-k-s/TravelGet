<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
session_start();

$userid=$_SESSION['uid'];

$selQry="select * from tbl_user where user_id='$userid'";
$resultadmin=$con->query($selQry);
$row=$resultadmin->fetch_assoc();




	if(isset($_POST['btn_change']))
	{
		$first_name=$_POST['txt_firstname'];
		$last_name=$_POST['txt_lastname'];
		$contact=$_POST['txt_contact'];
		
		$address=$_POST['txt_address'];
	
		$upQry="update tbl_user set user_first_name='$first_name',user_last_name='$last_name',user_contact='$contact',user_address='$address' where user_id='$userid'";
		if($con->query($upQry))
		{
				header("location:Myprofile.php");
		}
	}


?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>TravelGet:User edit profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form id="form1" name="form1" method="post" action="">
  <table width="345" height="169" border="1">
    <tr>
      <td width="172">First Name</td>
      <td width="157"><label for="txt_name"></label>
      <input type="text" name="txt_firstname" id="txt_firstname" value="<?php echo $row["user_first_name"]?>" /></td>
    </tr>
    <tr>
      <td width="172">Last Name</td>
      <td width="157"><label for="txt_name"></label>
      <input type="text" name="txt_lastname" id="txt_lastname" value="<?php echo $row["user_last_name"]?>" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $row["user_contact"]?>"/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"><?php echo $row["user_address"]?></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_change" id="btn_change" value="Change" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
<?php
	include("Foot.php");

?>