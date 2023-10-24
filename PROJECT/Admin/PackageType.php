<?php


include('../Assets/Connection/Connection.php');


if(isset($_POST['btnsave']))
{
	$typename=$_POST['txttype'];
	
	$InsQry="insert into tbl_package_type(package_type_name) values('$typename')";
	if($con->query($InsQry))
	{
		header("location:PackageType.php");
	}
	else
	{
		echo "Database insertion failure";
	}
}



if(isset($_GET['did']))
{
	$delQry = "delete from tbl_package_type where package_type_id = ".$_GET['did'];
	if($con->query($delQry))
	{
		header("location:PackageType.php");
	}
}
include("Head.php");

?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel-Get:PackageType</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="294" height="76" border="1" align="center">
    <tr>
      <td>Package Type</td>
      <td><input type="text" name="txttype" id="txttype" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
  <label for="txttype"></label>
</form>
</body>
</html>



<table width="200" border="1" align="center" >
    <tr>
      <td>Sl.nO</td>
      <td>PackageType</td>
      <td>Action</td>
    </tr>
    <?php
	$selqry="select * from tbl_package_type";
	$data=$con->query($selqry); 
	$i=0;
	while($row=$data->fetch_assoc())
	{
		
		$i++;
	?>
    <tr>
      <td height="23"><?php echo $i?></td>
      <td><?php echo $row["package_type_name"]?></td>
      <td><a href="PackageType.php?did=<?php echo $row['package_type_id'] ?>">Delete</a></td>
    </tr>
    <?php
	}
   include("Foot.php"); 
	?>
  </table>