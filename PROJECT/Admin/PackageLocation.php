
<?php


include('../Assets/Connection/Connection.php');
if(isset($_POST["btn_submit"]))
{
	$package=$_POST['sel_package'];
	$location=$_POST['sel_location'];
	$insQry="insert into tbl_package_location(package_id,location_id)values('$package','$location')";
	$con->query($insQry);
}
if(isset($_GET['did']))
{
	$value=$_GET['did'];
	$delQry="delete from tbl_package_location where package_location_id='$value'";
	if($con->query($delQry))
	{
		header("location:PackageLocation.php");
	}
}
include("Head.php");
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <br>
  <br>
  <table width="335" height="256" border="1"  style="margin-left: 330px;">
    <tr>
      <td width="168">Select Package</td>
      <td width="151"><label for="sel_package"></label>
      <select name="sel_package" id="sel_package">
      <option>--SELECT--</option>
         <?php
		$selQry = "select * from tbl_package";
		$result = $con->query($selQry);
		while($row = $result->fetch_assoc())
		{
		?>
        <option value="<?php echo $row['package_id']?>"><?php echo $row['package_name']?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Select Place</td>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place" onchange="getPlace(this.value)">
        <option>--SELECT--</option>
        <?php
		$selQry = "select * from tbl_place";
		$result = $con->query($selQry);
		while($row = $result->fetch_assoc())
		{
		?>
         <option value="<?php echo $row['place_id']?>"><?php echo $row['place_name']?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Select Location</td>
      <td><label for="sel_location"></label>
        <select name="sel_location" id="sel_location">
        <option>--SELECT--</option>
      </select></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_clear" id="btn_clear" value="clear" /></td>
    </tr>
  </table>
  <br>
  <br>
  <table width="852" height="201" border="1"  style="margin-left: 330px;">
    <tr>
      <td>Sl.number</td>
      <td>Package</td>
      <td>Place</td>
      <td>Location</td>
      <td>Action</td>
    </tr>
    <?php
	$selQry="select * from tbl_package_location p inner join tbl_location q on p.location_id=q.location_id inner join tbl_place d on q.place_id=d.place_id inner join tbl_package t on p.package_id=t.package_id" ;
	
	$data=$con->query($selQry);
	$i=0;
	while($row=$data->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['package_name']?></td>
      <td><?php echo $row['place_name']?></td>
      <td><?php echo $row['location_name']?></td>
      <td><a href="PackageLocation.php?did=<?php echo $row['package_location_id'] ?>">Delete</a> </td>
    </tr>
	<?php
    }
    ?>
  </table>
</form>
</body>
<script src="../Assets/Jquery/jQuery.js"></script>
<script>
function getPlace(did)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxLocation.php?did="+did,
	  success: function(html){
		$("#sel_location").html(html);
	  }
	});
}
</script>
<?php include("Foot.php"); ?>
</html>