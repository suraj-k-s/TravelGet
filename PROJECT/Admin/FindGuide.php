<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
$bookedplaceid=$_GET["pid"];


?>











<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
  <br>
  <br>
  <br>
<table width="900" height="194" border="1" style="margin-left: 330px;">
  <tr>
    <td width="246">sl number</td>
    <td width="313">Guide Name</td>
    <td width="209">Guide contact</td>
    <td width="158">Guide photo</td>
    <td width="196">Guide place</td>
     <td width="196">Action</td>
  </tr>
  <?php
  
$selQry="select *  from tbl_guide p inner join tbl_place pk on pk.place_id=p.place_id inner join tbl_district pkl on pkl.district_id=pk.district_id  where pkl.district_id ='$bookedplaceid' and guide_status='1'";
$data=$con->query($selQry);
 $i=0;
  while($row=$data->fetch_assoc())
  {
	  $i++;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row["guide_first_name"] ?><?php echo $row["guide_last_name"] ?></td>
    <td><?php echo $row["guide_contact"] ?></td>
    <td> <img src="../Assets/Files/Guide/Photo/<?php echo $row["guide_photo"] ?>" width="75" height="76"</td>
    <td><?php echo $row["place_name"] ?></td>
    <td><?php
    		$sel="select COALESCE(count(*),0) as num from tbl_packagebooking where guide_id='".$row["guide_id"]."' and booking_to_date='".$_GET["bookeddate"]."'";
			$dataS=$con->query($sel);
			$rowS=$dataS->fetch_assoc();
			if($rowS["num"]==0)
			{
	?>
    
	<a href="FindGuide.php?gid=<?php echo $row['guide_id'] ?>&pid=<?php echo $_GET['pid']?>&bid=<?php echo $_GET['bid']?>&bookeddate=<?php echo $_GET['bookeddate']?>">Assign</a></td>
    <?php
			}else{
				
				echo "Already Assigned";	
			}
	?>
  </tr>
  <?Php
  }
  ?>
  </td>
</table>
</td>


<?php
if(isset($_GET['gid']))
{
	$guideid=$_GET['gid'];
	$updqry="update tbl_packagebooking set guide_id='".$_GET['gid']."', booking_status='3' where booking_id='".$_GET["bid"]."'";  
	if($con->query($updqry))
	{
		?>
        	<script>
				alert("Assigned !!");
				window.location="AssignedList.php";
			</script>
        <?php
	}

}

 
?><?php ?>
</body>
<?php include("Foot.php"); ?>
</html>