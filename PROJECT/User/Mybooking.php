
<?php

include('../Assets/Connection/Connection.php');
session_start();

include("Head.php");
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travelget: User bookings</title>
</head>

<body background="url('')">
  <h2> On Going In Hours </h2>
<table width="511" height="137" border="1">
  <tr>
    <td>Sl number</td>
    <td>Package</td>
    <td>Guide</td>
    <td>Booking date</td>
    <td>Boooked date</td>
    <td>Action</td>
  </tr>
  <?php 
  $userid=$_SESSION['uid'];
   $sel="select *  from tbl_packagebooking p inner join tbl_package pq on pq.package_id=p.package_id where user_id='$userid' and booking_status='1' order by booking_id desc";
   $data=$con->query($sel);
  $i=0;
  while($row=$data->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row["package_name"] ?></td>
    <td><?php if($row['guide_status']=="Yes")
	{
		if($row['guide_id']==0)
		{
			echo "Your guide will be assigned soon";
		}
		else
		{
	  $selqry="select * from tbl_guide where guide_id='".$row["guide_id"]."'";
		$data1=$con->query($selqry);
		$guide=$data1->fetch_assoc();
		echo "<p>Name: ".$guide["guide_first_name"]."</p>
		<p>Contact: ".$guide["guide_contact"]."</p>";
		}
			
	}
	else
	{
		echo "Sorry you did not request for a guide assistance";
	}
	?></td>
    <td><?php echo $row["booking_date"] ?></td>
    <td><?php echo $row["booking_to_date"] ?></td>
    <td> <a href="Reasonforcancellation.php?breject=<?php echo $row['booking_id']?>&pid=<?php echo $row['package_id']?>">Cancel</a></td></td>
  </tr>
  <?php
  }
  ?>
</table>
</body>
<?php include("Foot.php"); ?>
</html>