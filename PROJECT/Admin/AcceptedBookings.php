
<?php

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//
//
//require 'phpMail/src/Exception.php';
//require 'phpMail/src/PHPMailer.php';
//require 'phpMail/src/SMTP.php';



include('../Assets/Connection/Connection.php');
//if(isset($_GET['breject']))
//{ 
//
//$mail = new PHPMailer(true);
//$mail->isSMTP();
//		$mail->Host = 'smtp.gmail.com';
//		$mail->SMTPAuth = true;
//		$mail->Username = 'travelget1@gmail.com'; // Your gmail
//		$mail->Password = 'wudctykugnyiunci'; // Your gmail app password
//		$mail->SMTPSecure = 'ssl';
//		$mail->Port = 465;
//	  
//		$mail->setFrom('travelget1@gmail.com'); // Your gmail
//	  
//		$mail->addAddress($_GET["email"]);
//	  
//		$mail->isHTML(true);
//	  
//		$mail->Subject ="Verification";
//		$mail->Body = "Your booking has been Rejected";
//		
//		
//	 $bookingid=$_GET['breject'];
//	$updQry="update tbl_packagebooking set booking_status='2' where booking_id='$bookingid'";
//	if($con->query($updQry))
//	{
//		if($mail->send()){
//				header("location:AcceptedBookings.php");
//			}
//			else
//			{
//				echo "<script>alert('Failed')</script>";
//			}
//		header("location:AcceptedBookings.php");
//		}
//}
include("Head.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Accepted Bookings</title>
</head>
<a href="HomePage.php">Home</a>
<br>
<br>
<br>
<table width="888" height="118" border="1" style="margin-left: 330px;">
  <tr>
    <td>Sl number</td>
    <td>Nameof user</td>
    <td>Package</td>
    <td>Guide</td>
    <td>Booked date</td>
    <td>Booking date</td>
    <td>Action</td>
  </tr>
  <?php
  $sel="select *  from tbl_packagebooking p inner join tbl_package ps on ps.package_id=p.package_id inner join tbl_user u on u.user_id=p.user_id where booking_status='2'";
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
    <td><?php echo $row["guide_status"] ?></td>
    <td><?php echo $row["booking_date"] ?></td>
    <td><?php echo $row["booking_to_date"] ?></td>
   <td>Confirmed
   <?php
   if($status=="Yes")
   {
	   ?>
       /
   <a href="FindGuide.php?pid=<?php echo $row['district_id']?>&bid=<?php echo $row['booking_id']?>&bookeddate=<?php echo $row['booking_to_date']?>">AssignGuide</a>
       <?php
   }
   ?>
   
   </td>	
  </tr>
  <?php
  }
  ?>
</table>
</body>
</html>
<?php include("Foot.php"); ?>
<body>
