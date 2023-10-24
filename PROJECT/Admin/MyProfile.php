

<?php
include("Head.php");
include("../Assets/Connection/Connection.php");

$adminid=$_SESSION['aid'];

$selQry="select * from tbl_admin where admin_id='$adminid'";
$resultadmin=$con->query($selQry);
$row=$resultadmin->fetch_assoc();



?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<form id="form1" name="form1" method="post" action="">
  <br>
  <br>
  <br>
  <br>
  <table width="290" height="132" border="1" align="center"> 
    
    <tr>
      <td>Name</td>
      <td><label for="txt_name"><?php echo $row["admin_name"]?> </label></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"><?php echo $row["admin_contact"]?></label></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"><?php echo $row["admin_email"]?></label></td>
    </tr>
  
</table>
</form>
<body>
</body>
</html>
<?php include("Foot.php"); ?>