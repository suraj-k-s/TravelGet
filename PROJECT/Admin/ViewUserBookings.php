<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel-Get: View user bookings</title>
</head>

<body>
<?php
ob_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMail/src/Exception.php';
require 'phpMail/src/PHPMailer.php';
require 'phpMail/src/SMTP.php';

    







include('../Assets/Connection/Connection.php');
include("Head.php");

if(isset($_GET['baccept']))
{   



$mail = new PHPMailer(true);

		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'travelget1@gmail.com'; // Your gmail
		$mail->Password = 'wudctykugnyiunci'; // Your gmail app password
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;
	  
		$mail->setFrom('travelget1@gmail.com'); // Your gmail
	  
		$mail->addAddress($_GET["email"]);
	  
		$mail->isHTML(true);
	  
		$mail->Subject ="Verification";
		$mail->Body = "Dear "  . $_GET['username'] . "&nbsp;" . $_GET['userlastname'] .   " TravelGet has just confirmed your booking for " . $_GET['packagename'] . "at " . $_GET['bookingdate'] . " suscessfully";
     
    $bookingid=$_GET['baccept'];
	$updQry="update  tbl_packagebooking set booking_status='2' where booking_id='$bookingid'";
	if($con->query($updQry))
	{
		if($mail->send()){
				header("location:NewGuidelist.php");
			}
			else
			{
				echo "<script>alert('Failed')</script>";
			}
		header("location:ViewUserBookings.php");
		}
}
/*<?php*/ /*?>if(isset($_GET['breject']))
{ 

$mail = new PHPMailer(true);
$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'travelget1@gmail.com'; // Your gmail
		$mail->Password = 'wudctykugnyiunci'; // Your gmail app password
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;
	  
		$mail->setFrom('travelget1@gmail.com'); // Your gmail
	  
		$mail->addAddress($_GET["email"]);
	  
		$mail->isHTML(true);
	  
		$mail->Subject ="Verification";
		$mail->Body = " Dear Your booking has been Rejected";
		
	 $bookingid=$_GET['breject'];
	$updQry="update tbl_packagebooking set booking_status='2' where booking_id='$bookingid'";
	if($con->query($updQry))
	{
		if($mail->send()){
				header("location:NewGuidelist.php");
			}
			else
			{
				echo "<script>alert('Failed')</script>";
			}
		header("location:ViewUserBookings.php");
		}
}
?><?php */
?>
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
  $sel="select *  from tbl_packagebooking p inner join tbl_package ps on ps.package_id=p.package_id inner join tbl_user u on u.user_id=p.user_id where booking_status=1";
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
    <td><?php echo $row["guide_status"] ?></td>
    <td><?php echo $row["booking_date"] ?></td>
    <td><?php echo $row["booking_to_date"] ?></td>
    <td><a href="ViewUserBookings.php?baccept=<?php echo $row['booking_id']?>&email=<?php echo $row['user_email'] ?>&username=<?php echo $row['user_first_name'] ?>&userlastname=<?php echo $row['user_last_name'] ?>&bookingdate=<?php echo $row['booking_date'] ?>&packagename=<?php echo $row['package_name'] ?>">Confirm</a></td>
   <?php /*?> <a href="ViewUserBookings.php?breject=<?php echo $row['booking_id']?>&email=<?php echo $row['user_email'] ?>">Reject</a></td><?php */?>
  </tr>
  <?php
  }
  ?>
</table>
</body>
<a href="HomePage.php">Home</a>
<?php include("Foot.php"); ?>
</html>