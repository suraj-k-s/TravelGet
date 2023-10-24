<?php
ob_start();
include('../Assets/Connection/Connection.php');
include("Head.php");

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="776" height="83" border="1" style="margin-left: 390px; margin-top: 50px;">
  <tr>
    <td>Sl.number</td>
    <td>Promocode</td>
    <td>User name</td>
  </tr>
  <?php
  $selqry="select * from tbl_usedpromocode p inner join tbl_user q on p.user_id=q.user_id";
  $data=$con->query($selqry);
   $i=0;
  while($row=$data->fetch_assoc()){
  $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['promocode_name'] ?></td>
    <td><?php echo $row['user_first_name'] ?></td>
  </tr>
  <?php 
  }
  ?>
</table>
<form id="form1" name="form1" method="post" action="">
</form>
</body>
</html>
