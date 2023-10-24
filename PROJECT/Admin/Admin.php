<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
if(isset($_POST['btn_submit']))
{
	$name=$_POST['txt_adminname'];
	$email=$_POST['txt_email'];
	$contact=$_POST['txt_contact'];
	$password=$_POST['txt_password'];
	
	 
	 $photo=$_FILES['img_profile']['name']; 
     $path=$_FILES['img_profile']['tmp_name'];
	 move_uploaded_file($path,"../Assets/Files/Admin/AdminProfile/".$photo);
	 
	 
	$InsQry="insert into tbl_admin(admin_name,admin_email,admin_contact,admin_password,admin_image) values('$name','$email','$contact','$password','$photo')";
	if($con->query($InsQry))
{
	
}
else
{
	echo "database insertion failure";
}
}
if(isset($_GET['did']))
{
	$delqry="delete from tbl_admin where admin_id =".$_GET['did'];
	if($con->query($delqry))
	{
			header("location:Admin.php");
	}
}



?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel-Get: Admin</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="296" border="1" align="center">
    <tr>
      <td width="110">Name</td>
      <td width="74"><label for="txt_adminname"></label>
      <input type="text" name="txt_adminname" id="txt_adminname" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" />        <label for="btn_contact"></label></td>
    </tr>
     <td>Photo</td>
      <td><label for="img_photo"></label>
      <input type="file" name="img_profile" id="img_photo" /></td>
    <tr>
      <td>Password</td>
      <td><p>
          <label for="txt_password"></label>
      </p>
      <p>
        <label for="txt_password2"></label>
        <input type="password" name="txt_password" id="txt_password2" />
      </p></td>
   
    </tr>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_clear" id="btn_clear" value="Clear" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <br />
  <table width="478" height="91" border="1" align="center">
    <tr>
      <td width="73">Sl number</td>
      <td width="65">Name</td>
      <td width="93">email</td>
      <td width="82">contact</td>
       <td width="82">Profile</td>
      <td width="45">Password</td>
      <td width="80">Action</td>
    </tr>
    <?php
	$selqry="select * from tbl_admin";
	$data=$con->query($selqry);
	$i=0;
	while($row=$data->fetch_assoc())
	{
		
		$i++;

	?>
    <tr>
      <td><?php echo $i    ?></td>
      <td><?php echo $row["admin_name"]  ?>   </td>
      <td><?php echo $row["admin_email"]   ?>  </td>
      <td><?php echo $row["admin_contact"] ?>    </td>
      <td><img src="../Assets/Files/Admin/AdminProfile/<?php echo $row["admin_image"] ?>" width="75" height="75" /></td>
     <td><?php echo $row["admin_password"] ?>    </td>

      <td> <a href="admin.php?did=<?php echo $row["admin_id"]?>">Delete</a> </td>
    </tr>
	<?php
	}
	?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
<?php include("Foot.php"); ?>
</html>