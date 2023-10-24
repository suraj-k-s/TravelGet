<?php
ob_start();
include("Head.php"); 
include('../Assets/Connection/Connection.php');
session_start();
$userid=$_SESSION['uid'];


?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="400" height="226" border="1">
  <?php 
 $selqry="select * from tbl_packagebooking p inner join tbl_user q on p.user_id=q.user_id inner join tbl_package pl on pl.package_id=p.package_id inner join tbl_district plk on pl.district_id=plk.district_id where q.user_id='".$_SESSION["uid"]."'";
  $data=$con->query($selqry); 
  $row=$data->fetch_assoc()
  ?>
    <tr>
      <td width="126">Package Name</td>
      <td width="58"><?php echo $row["package_name"] ?></td>
    </tr>
    <tr>
      <td>District</td>
      <td><?php echo $row["district_name"] ?></td>
    </tr>
    <tr>
      <td>Booking to date</td>
      <td><?php echo $row["booking_to_date"] ?></td>
    </tr>
    <tr>
      <td>Guide Service</td>
      <td><?php echo $row["guide_status"] ?></td>
    </tr>
    <tr>
      <td>Coustomer Name</td>
      <td><?php echo $row["user_first_name"] ?></td>
    </tr>
    <tr>
      <td>Persons</td>
      <td><?php echo $_GET["count"] ?></td>
    </tr>
  </table>
 <!-- <table width="352" border="1">
    <tr>
      <td width="142">Apply Promocode</td>
      <td width="320"><label for="txt_promo"></label>
      <input type="text" name="txt_promo" id="txt_promo" /></td>
      <td width="125"><input type="submit" name="btn_check" id="btn_check" value="Check" style="width: 90%; "/></td>
    </tr>
  </table>-->
  <br>
  <table width="300" height="81" border="1">
   <tr>
      <td>Amount to be paid</td>
   </tr>
  <tr>
      <td><?php echo $row["package_rate"] * $_GET["count"] ?></td>
   </tr>
  </table>
  <br>
  <table width="200" border="1">
    <tr>
      <td align="center"><input type="submit" name="btn_pay" id="btn_pay" value="pay" style=" width: 60%;" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
<?php

if(isset($_POST["btn_pay"]))
{
  $amount = $row["package_rate"] * $_GET["count"];
$selQry = "select max(booking_id) as id from tbl_packagebooking";
	$data=$con->query($selQry); 
	$row=$data->fetch_assoc();
header("location:Amount.php?bid=".$row["id"]."&count=".$_GET["count"]."&amount=".$amount);
}


include("Foot.php"); ?>
</html>