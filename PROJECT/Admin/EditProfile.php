

<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Head.php");



$adminid=$_SESSION['aid'];

$selQry="select * from tbl_admin where admin_id='$adminid'";
$resultadmin=$con->query($selQry);
$row=$resultadmin->fetch_assoc();




	if(isset($_POST['btn_change']))
	{
		$name=$_POST['txt_name'];
		$contact=$_POST['txt_contact'];
		
		$email=$_POST['txt_email'];
	
		$upQry="update tbl_admin set admin_name='$name',admin_contact='$contact',admin_email='$email' where admin_id='$adminid'";
		if($con->query($upQry))
		{
				header("location:Myprofile.php");
		}
	}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<br>
<br>
<br>
<br>
<form id="form1" name="form1" method="post" action="">
  <table width="345" height="169" border="1" align="center">
    <tr>
      <td width="172">First Name</td>
      <td width="157"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $row["admin_name"]?>" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $row["admin_contact"]?>"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" cols="45" rows="5"><?php echo $row["admin_email"]?></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_change" id="btn_change" value="Change" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
<body>
</body>
<?php include("Foot.php"); ?>
</html>