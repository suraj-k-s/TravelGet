




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php

include('../Assets/Connection/Connection.php');
include("Head.php");
?>

<html>
<body>
  <br>
  <br>
  <br>
<table width="888" height="118" border="1" style="margin-left: 330px;">
  <tr>
    <td>Sl number</td>
    <td>Nameof user</td>
    <td>Package</td>
    <td>Booked date</td>
    <td>Booking date</td>
    <td>Guide name</td>
    <td>Status</td>
  </tr>
<?php
  $sel="select *  from tbl_packagebooking p inner join tbl_package ps on ps.package_id=p.package_id inner join tbl_user u on u.user_id=p.user_id inner join tbl_guide pkl on pkl.guide_id=p.guide_id where booking_status>=3";
  $data=$con->query($sel);
  $i=0;
  while($row=$data->fetch_assoc())
  {
	  $i++;
	  $status = $row["guide_status"];
	  
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row["user_first_name"] ?><?php echo $row["user_last_name"] ?></td>
    <td><?php echo $row["package_name"] ?></td>
    <td><?php echo $row["booking_date"] ?></td>
    <td><?php echo $row["booking_to_date"] ?></td>
   <td><?php echo $row["guide_first_name"] ?></td>	
    <td><?php if($row["booking_status"]==3)
	{
		echo "Assigned";
	}
	else if($row["booking_status"]==4)
	{
		echo "Trip ongoing";
	}
	else if ($row["booking_status"]==5)
	{
		echo "trip ended";
	}
  
		
	
	
	 ?></td>	
  </tr>
  <?php
  }
  ?>
</table>


</body>
<?php include("Foot.php"); ?>
</html>