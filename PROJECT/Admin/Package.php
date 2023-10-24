<?php
include('../Assets/Connection/Connection.php');
if(isset($_POST['btn_submit']))
{
	$packagename =$_POST['txt_packagename'];
	$rate = $_POST['txt_rate'];
	$details = $_POST['txt_details'];
	$typename = $_POST['sel_packagetype'];
	$district = $_POST['sel_district'];
	
	 $photo=$_FILES['img_photo']['name']; 
     $path=$_FILES['img_photo']['tmp_name'];
	 move_uploaded_file($path,"../Assets/Files/PackageImage/".$photo);
	 
	 
	$InsQry="insert into tbl_package(package_name,package_rate,package_details,package_type_id,package_photo,district_id) values('$packagename','$rate','$details','$typename','$photo','$district')";
	if($con->query($InsQry))
	{
		
	}
	else
	{
		echo "Database insertion failure";
	}
}
	if(isset($_GET['did']))
	{
		$delqry="delete from tbl_package where package_id=".$_GET['did'];
		if($con->query($delqry))
		{
		header("location:Package.php");
		}
	}
			
  include("Head.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel-Get: Package</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <br>
  <br>
  <br>
  <table width="584" height="270" border="1"  style="margin-left: 330px;">
  
  <tr>
      <td>Package type</td>
      <td><label for="sel_packagetype"></label>
        <select name="sel_packagetype" id="sel_packagetype">
        <option>----Select---</option>
        <?php
		$SelQry="select * from tbl_package_type";
		$result= $con->query($SelQry);
		while($row = $result->fetch_assoc())
		{
		?>
        <option value="<?php echo $row['package_type_id']?>"><?Php echo $row['package_type_name']?></option>
        <?php
		}
		?>
      </select></td>
      
    </tr>
    <tr>
      <td>Package District</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district">
        <option>----Select---</option>
        <?php
		$SelQry="select * from tbl_district";
		$result= $con->query($SelQry);
		while($row = $result->fetch_assoc())
		{
		?>
        <option value="<?php echo $row['district_id']?>"><?Php echo $row['district_name']?></option>
        <?php
		}
		?>
      </select></td>
      
    </tr>
    <tr>
      <td width="232">Package name</td>
      <td width="203"><label for="txt_packagename"></label>
      <input type="text" name="txt_packagename" id="txt_packagename" /></td>
    </tr>
    <tr>
      <td> Rate</td>
      <td><label for="txt_rate"></label>
      <input type="text" name="txt_rate" id="txt_rate" /></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txt_details"></label>
      <textarea name="txt_details" id="txt_details" cols="45" rows="5"></textarea></td>
    </tr>
     <tr>
      <td>Cover Photo</td>
      <td><label for="img_photo"></label>
      <input type="file" name="img_photo" id="img_photo" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_clear" id="btn_clear" value="Clear" /></td>
    </tr>
  </table>
  <br>
  <br>
  <table width="696" height="133" border="1"  style="margin-left: 330px;">
    <tr>
      <td width="122">Sl.number</td>
      <td width="142">Package name</td>
      <td width="95">Rate</td>
      <td width="104">Details</td>
      <td width="95">Package type</td>
       <td width="95">Cover photo</td>
      <td width="98">Action</td>
    </tr>
    <?php
	$SelQry="select * from tbl_package p inner join tbl_package_type t on p.package_type_id=t.package_type_id";
	$result=$con->query($SelQry);
	$i=0;
	while($row=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td height="76"><?php echo $i?></td>
      <td><?php echo $row["package_name"] ?></td>
      <td><?php echo $row["package_rate"]?> </td>
      <td><?php echo $row["package_details"] ?></td>
      <td><?php echo $row["package_type_name"]?></td>
      <td><img src="../Assets/Files/PackageImage/<?php echo $row["package_photo"]?>" width="75" height="76" /></td>
      <td><a href="Package.php?did=<?php echo $row['package_id'] ?>">Delete</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
<?php include("Foot.php"); ?>
</html>