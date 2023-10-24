<?php
include("../Assets/Connection/Connection.php");

session_start();

$userid=$_SESSION['uid'];

$selQry="select * from tbl_user where user_id='$userid'";
$resultadmin=$con->query($selQry);
$row=$resultadmin->fetch_assoc();

include("Head.php");

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>travelget:User profile</title>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="290" height="132" border="1">
    <tr>
      <td colspan="2" align="center"><img src="../Assets/Files/User/Photo/<?php echo $row["user_photo"]?>" width="75" height="76" /></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><label for="txt_name"><?php echo $row["user_first_name"]?> <?php echo $row["user_last_name"]?></label></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"><?php echo $row["user_contact"]?></label></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"><?php echo $row["user_email"]?></label></td>
    </tr>
  
</table>
</form>
</body>
<a href="HomePage.php">Homepage</a>
<?php include("Foot.php"); ?>
</html>