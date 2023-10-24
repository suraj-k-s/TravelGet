





<?php


include('../Assets/Connection/Connection.php');
if(isset($_POST["btn_submit"]))
{
	$location=$_POST['sel_location'];
	$caption=$_POST['txt_caption'];
	
	
	
	 $photo=$_FILES['img_image']['name']; 
     $path=$_FILES['img_image']['tmp_name'];
	 move_uploaded_file($path,"../Assets/Files/LocationImage/".$photo);
	 
	$insQry="insert into tbl_location_gallery(location_id,location_gallery_caption,location_gallery_image)values('$location','$caption','$photo')";
	$con->query($insQry);
}
if(isset($_GET['did']))
{
	$value=$_GET['did'];
	$delQry="delete from tbl_location_gallery where location_gallery_id='$value'";
	if($con->query($delQry))
	{
		header("location:LocationGallery.php");
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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="367" height="303" border="1" style="margin-left: 300px;">
    <tr>
    
      <td width="173">Place</td>
      <td width="178"><label for="sel_place"></label>
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
      <td>Location</td>
      <td><label for="sel_location"></label>
        <select name="sel_location" id="sel_location">
        <option>--SELECT---</option>
      </select></td>
    </tr>
    <tr>
      <td>Caption</td>
      <td><label for="txt_caption"></label>
      <input type="text" name="txt_caption" id="txt_caption" /></td>
    </tr>
    <tr>
      <td>Image</td>
      <td><label for="img_image"></label>
      <input type="file" name="img_image" id="img_image" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_reset" id="btn_reset" value="Clear" /></td>
    </tr>
  </table>
  <table width="635" height="250" border="1" style="margin-left: 300px;">
    <tr>
      <td>Sl.no</td>
      <td>Place</td>
      <td>Location</td>
      <td>Caption</td>
      <td>Image</td>
      <td>Action</td>
    </tr>
      <?php
	$selQry="select * from tbl_location_gallery p inner join tbl_location q on p.location_id=q.location_id inner join tbl_place r on q.place_id=r.place_id " ;
	
	$data=$con->query($selQry);
	$i=0;
	while($row=$data->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $row['place_name']?></td>
      <td><?php echo $row['location_name']?></td>
      <td><?php echo $row['location_gallery_caption']?></td>
      <td><img src="../Assets/Files/LocationImage/<?php echo $row["location_gallery_image"]?>" width="75" height="76" /></td>
      <td><a href="LocationGallery.php?did=<?php echo $row['location_gallery_id'] ?>">Delete</a></td>
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