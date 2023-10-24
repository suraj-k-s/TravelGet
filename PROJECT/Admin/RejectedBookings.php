<?php

include('../Assets/Connection/Connection.php');

/*<?php*/ /*?>use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'phpMail/src/Exception.php';
require 'phpMail/src/PHPMailer.php';
require 'phpMail/src/SMTP.php';

if(isset($_GET['baccept']))
{   
$username=$_GET['username'];

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
	  
		$mail->Subject ="Verification Reviewed";
		$mail->Body = "Congradulations dear " . $_GET['username'] . "" . $_GET['userlastname'] . " Your booking has been Accepted";
     
    $bookingid=$_GET['baccept'];
	$updQry="update  tbl_packagebooking set booking_status='1' where booking_id='$bookingid'";
	if($con->query($updQry))
	{
		if($mail->send()){
		
			header("location:RejectedBookings.php");
			}
			else
			{
				echo "<script>alert('Failed')</script>";
			}
	header("location:RejectedBookings.php");
		}
}<?php *//*?>
*/
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
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
    <td>Reason for cancellation</td>
    <td>cancellation date</td>
  </tr>
  <?php
  $sel="select *  from tbl_packagebooking p inner join tbl_package ps on ps.package_id=p.package_id inner join tbl_user u on u.user_id=p.user_id inner join tbl_package_cancellation plk on plk.booking_id=p.booking_id where p.booking_status='2'";
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
    <td><?php echo $row["cancellation_reason"] ?></td>
   <td><?php echo $row["cancellation_date"] ?></td>
	
	<?php /*?><td><a href="RejectedBookings.php?baccept=<?php echo $row['booking_id']?>&email=<?php echo $row['user_email'] ?>&username=<?php echo $row['user_first_name'] ?>&userlastname=<?php echo $row['user_last_name'] ?>">Accept</a></td><?php ?><?php */?>
  </tr>
  +
  <?php
  }
  ?>
</table>
</body>
<?php include("Foot.php"); ?>
<a href="HomePage.php">Home</a>
</html>

