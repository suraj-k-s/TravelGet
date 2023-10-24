<?php
include('../Assets/Connection/Connection.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMail/src/Exception.php';
require 'phpMail/src/PHPMailer.php';
require 'phpMail/src/SMTP.php';

    


	if(isset($_GET['acid']))
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
		$mail->Body = "Account Accepted";
	  
		
		$aceptid=$_GET['acid'];
		$upQry="update tbl_guide set guide_status='1' where guide_id='$aceptid'";
		if($con->query($upQry))
		{
			if($mail->send()){
				header("location:NewGuidelist.php");
			}
			else
			{
				echo "<script>alert('Failed')</script>";
			}
		}
	}
	
	
	
	if(isset($_GET['rejid']))
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
		$mail->Body = "Account Rejected";
		
		
		$rejectid=$_GET['rejid'];
		$upQry="update tbl_guide set guide_status='2' where guide_id='$rejectid'";
		if($con->query($upQry))
		{
			if($mail->send()){
				header("location:NewGuidelist.php");
			}
			else
			{
				echo "<script>alert('Failed')</script>";
			}
		}
	}
	include("Head.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel-Get: New guide list</title>
</head>

<body>
<a href="HomePage.php">Home</a>

   <table width="200" border="1" style="margin-left: 330px;">
    <tr>
      <td>Sl.nO</td>
      <td>District</td>
      <td>place</td>
      <td>First Name</td>
      <td>Last Name</td>
      <td>Gender</td>
      <td>Contact</td>
      <td>Email</td>
      <td>Address</td>
      <td>Photo</td>
      <td>Proof</td>
      <td>Action</td>
      
      
    </tr>
    <?php
	$selqry="select * from tbl_guide g inner join tbl_place p on g.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where g.guide_status='0'";
	$data=$con->query($selqry); 
	$i=0;
	while($row=$data->fetch_assoc())
	{
		
		$i++;
	?>
    <tr>
      <td height="23"><?php echo $i?></td>
      <td><?php echo $row["district_name"]?></td>
      <td><?php echo $row["place_name"]?></td>
      <td><?php echo $row["guide_first_name"]?></td>
      <td><?php echo $row["guide_last_name"]?></td>
      <td><?php echo $row["guide_gender"]?></td>
      <td><?php echo $row["guide_contact"]?></td>
      <td><?php echo $row["guide_email"]?></td>
      <td><?php echo $row["guide_address"]?></td>
      <td><img src="../Assets/Files/Guide/Photo/<?php echo $row["guide_photo"]?>" width="75" height="76" /></td>
      <td><img src="../Assets/Files/Guide/Proof/<?php echo $row["guide_proof"]?>" width="75" height="75" /></td>
      
      <td><a href="NewGuidelist.php?acid=<?php echo $row['guide_id'] ?>&email=<?php echo $row['guide_email'] ?>">Accept</a>
      /<a href="NewGuidelist.php?rejid=<?php echo $row['guide_id'] ?>&email=<?php echo $row['guide_email'] ?>">Reject</a></td>
    </tr>
    <?php
	}
	?>
  </table>
  <?php include("Foot.php"); ?>
</body>
</html>