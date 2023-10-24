<?php
include('../Assets/Connection/Connection.php');


	
	if(isset($_GET['rejid']))
	{
		$rejectid=$_GET['rejid'];
		$upQry="update tbl_guide set guide_status='2' where guide_id='$rejectid'" ;
		if($con->query($upQry))
		{
		header("location:AcceptedGuidelist.php");
		}
	}
  include("Head.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travelget: Accepted guide list</title>
</head>

<body>
<br>
<br>
<br>

   <table width="200" border="1" style="margin-left: 280px;" >
    <tr>
       <td>Sl.nO</td>
         <td>First Name</td>
      <td>Last Name</td>
      <td>District</td>
      <td>place</td>
    
      <td>Gender</td>
      <td>Contact</td>
      <td>Email</td> 
      <td>Photo</td>
      <td>Proof</td>
      <td>Action</td>
      
      
    </tr>
    <?php
	$selqry="select * from tbl_guide g inner join tbl_place p on g.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where g.guide_status='1'";
	$data=$con->query($selqry); 
	$i=0;
	while($row=$data->fetch_assoc())
	{
		
		$i++;
	?>
    <tr>
      <td height="23"><?php echo $i?></td>
     
     
      <td><?php echo $row["guide_first_name"]?></td>
      <td><?php echo $row["guide_last_name"]?></td>
      
       <td><?php echo $row["district_name"]?></td>
      <td><?php echo $row["place_name"]?></td>
      <td><?php echo $row["guide_gender"]?></td>
      <td><?php echo $row["guide_contact"]?></td>
      <td><?php echo $row["guide_email"]?></td>
       <td><img src="../Assets/Files/Guide/Photo/<?php echo $row["guide_photo"]?>" width="75" height="76" /></td>
      <td><img src="../Assets/Files/Guide/Proof/<?php echo $row["guide_proof"]?>" width="75" height="76" /></td>
      
      <td><a href="AcceptedGuidelist.php?rejid=<?php echo $row['guide_id'] ?>">Reject</a></td>
    </tr>
    <?php
	}
	?>
  </table>

</body>
<a href="HomePage.php">Home</a>
<?php include("Foot.php"); ?>
</html>