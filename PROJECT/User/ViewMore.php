<?php include("Head.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Package booking details</title>
</head>

<body>
<?php
session_start();
include('../Assets/Connection/Connection.php');



$packageid=$_GET["pid"];
$_SESSION["pack"]=$packageid;
$userid=$_SESSION["uid"];

$selQry = "select * from tbl_package p inner join tbl_package_type q on q.package_type_id=p.package_type_id where package_id='$packageid' ";
$data=$con->query($selQry); 
if($row=$data->fetch_assoc())
{
?>
<?php
if(isset($_POST["btn_submit"]))
	{
	if((isset($_SESSION['uid']) && $_SESSION['uid'] == "null"))
  {
  header("location:../Guest/Login.php");
  }
  else
  {
			$guideservice=$_POST["rad_guide"];
			$insQry="insert into tbl_packagebooking(person_count,package_id,booking_date,booking_to_date,user_id,guide_status)values('".$_POST["txt_count"]."','".$_SESSION["pack"]."',curdate(),'".$_POST["txtd"]."','".$_SESSION["uid"]."','$guideservice')";
		

			if($con->query($insQry))
				{
					$selQry = "select max(booking_id) as id from tbl_packagebooking";
					$data=$con->query($selQry); 
					$row=$data->fetch_assoc();
					header("location:Calculation.php?bid=".$row["id"]."&count=".$_POST["txt_count"]);
				}
	}
}
?>

<form id="form1" name="form1" method="post" action="">
  <table width="700" border="1" align="center">
    <tr>
      <td colspan="2"  align="center">
      	<img src="../Assets/Files/PackageImage/<?php echo $row["package_photo"] ?>" width="400" height="200" />
      </td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $row["package_name"] ?></td>
    </tr>
    <tr>
      <td>Rate</td>
      <td><?php echo $row["package_rate"] ?></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><?php echo $row["package_details"] ?></td>
    </tr>
    <tr>
      <td>Type</td>
      <td><?php echo $row["package_type_name"] ?></td>
    </tr>
    <tr>
    <td>Want guide Service?</td>
       <td><input type="radio" name="rad_guide" id="txt_male" value="Yes" />
       Yes
         <input type="radio" name="rad_guide" id="txt_female" value="No" />
         No
     </td>
    <tr>
      <td>Booking To</td>
      <td><input type="date" name="txtd" min="<?php echo date("Y-m-d") ?>"  /></td>
    </tr>
    <tr>
      <td>Persons</td>
      <td><input type="number" name="txt_count"   min="0" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" value="Book Now" style=" width: 60%;"/></td>
    </tr>
  </table>
  <br>
  <table  width="1500" align="center" border="1">
  	<tr>
    	<?php 
		
			$sel= "select * from tbl_package_location pl inner join tbl_location l on l.location_id=pl.location_id inner join tbl_location_gallery lg on l.location_id=lg.location_id where package_id='".$_GET["pid"]."'";
			$data = $con->query($sel);
			while($row = $data->fetch_assoc())
			{
				?>
                	<td width="300" align="center">
                    <?php echo $row["location_name"] ?><br />
                    <img src="../Assets/Files/LocationImage/<?php echo $row["location_gallery_image"] ?>" width="400" height="200" /><br />
                    <?php echo $row["location_gallery_caption"] ?><br />
                    </td>
                <?php
			}
		
		?>
    </tr>
  </table>
</form>
<?php
}

?>



</body>
<?php include("Foot.php"); ?>
</html>
