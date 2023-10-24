<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Head.php");


if(isset($_GET['did']))
{
		$_SESSION["compid"]=$_GET["did"];
		header("location:ComplaintReply.php");
	
}


$selQry="select * from tbl_complaint p inner join tbl_user q on p.user_id=q.user_id where p.complaint_status='0'";
$data=$con->query($result=$selQry);
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserComplaints</title>
</head>

<body>
<body>
<table width="776" height="330" border="1"  style="margin-left: 330px;">
  <tr>
    <td width="152">Serial number</td>
    <td width="167">Title</td>
    <td width="129">Complaint</td>
    <td width="228">User name</td>
    <td width="228">PostedDate</td>
    <td width="66">Action</td>
  </tr>
  <?php
  $i=0;
  while($row=$data->fetch_assoc())
  {
  $i++;
  
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row["complaint_title"]?></td>
    <td><?php echo $row["complaint_description"]?></td>
    <td><?php echo $row["user_first_name"]?></td>
     <td><?php echo $row["complaint_date"]?></td>
     <td><a href="ViewComplaints.php?did=<?php echo $row['complaint_id'] ?>">ReplyNow</a></td>
  </tr>
  <?php
  }
  ?>
</table>
<form id="form1" name="form1" method="post" action="">
</form>
</body>
<a href="HomePage.php">Go to Home page</a>
<?php include("Foot.php"); ?>
</html>