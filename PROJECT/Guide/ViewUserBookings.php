<?php

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
<form id="form1" name="form1" method="post" action="">
  <table width="772" height="126" border="1">
    <tr>
      <td>Sl number </td>
      <td>Name of user</td>
      <td>Package</td>
      <td>Booked date</td>
      <td>Booking date</td>
      <td>Action</td>
    </tr>
     <?php
	 
	 if(isset($_GET["bid"]))
	 {
		 $updqry="update tbl_packagebooking set booking_status='".$_GET["sts"]."' where booking_id='".$_GET["bid"]."'";
		 $con->query($updqry);
		 header("location:ViewUserBookings.php");
	 }
	 
  $sel="select *  from tbl_packagebooking p inner join tbl_user ps on ps.user_id=p.user_id inner join tbl_package psq on psq.package_id=p.package_id where booking_status>=3 ";
  $data=$con->query($sel);
  $i=0;
  while($row=$data->fetch_assoc())
  {
	  $i++;
	  ?>
    <tr>
    <td><?php echo $i; ?></td>
      <td><?php echo $row["user_first_name"] ?><?php echo $row["user_last_name"] ?></td>
      <td><?php echo $row["package_name"] ?></td>
      <td><?php echo $row["booking_date"] ?></td>
      <td><?php echo $row["booking_to_date"] ?></td>
      <td><?php 
	  	if($row["booking_status"]==3)
	  		{
				?>
                Assigned/<a href="ViewUserBookings.php?bid=<?php echo $row["booking_id"] ?>&sts=4">Start</a>
      		<?php 
			} 
			else if($row["booking_status"]==4)
	  		{
				?>
                Started/<a href="ViewUserBookings.php?bid=<?php echo $row["booking_id"] ?>&sts=5">End</a>
      		<?php 
			} 
			else if($row["booking_status"]==5)
	  		{
				?>
                Trip Ended
      		<?php 
			} 
			?>
	  
	  </td>
    </tr>
      <?php
  }
  ?>
  </table>

</form>
</body>
<?php include("Foot.php"); ?>
</html>