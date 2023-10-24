
<?php
include("../Assets/Connection/Connection.php");

session_start();

$guideid=$_SESSION['gid'];

$selQry="select * from tbl_guide where guide_id='$guideid'";
$resultguide=$con->query($selQry);
$row=$resultguide->fetch_assoc();
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
  <table width="290" height="132" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"><?php echo $row["guide_first_name"]?> <?php echo $row["guide_last_name"]?></label></td>
     
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"><?php echo $row["guide_contact"]?></label>
    
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"><?php echo $row["guide_email"]?></label>
      
    </tr>
  </table>
</form>
</body>
<?php include("Foot.php"); ?>
</html>