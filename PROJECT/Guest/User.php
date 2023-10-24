<?php
include('../Assets/Connection/Connection.php');

if(isset($_POST['btn_submit']))
{
	$first_name=$_POST['txt_firstname'];
	$last_name=$_POST['txt_lastname'];
	$contact=$_POST['txt_contact'];
	$email=$_POST['txt_email'];
	$address=$_POST['txt_address'];
	$dob=$_POST['txt_dob'];
	$gender=$_POST['rad_gender'];
	$password=$_POST['txt_password'];
	$place_id=$_POST['sel_place'];
	
	
	 $photo=$_FILES['img_photo']['name']; 
     $path=$_FILES['img_photo']['tmp_name'];
	 move_uploaded_file($path,"../Assets/Files/User/Photo/".$photo);
	
	
	$proof=$_FILES['img_proof']['name'];
	$path=$_FILES['img_proof']['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/User/Proof/".$proof);
	
	
	
	
	$selAdmin = "select * from tbl_admin where admin_email='$email'";
	$resultAdmin = $con->query($selAdmin);
	
	$selUser = "select * from tbl_user where user_email='$email'";
	$resultUser = $con->query($selUser);
	
	$selGuide = "select * from tbl_guide where guide_email='$email'";
	$resultGuide = $con->query($selGuide);
	
	
	
	if($resultAdmin->num_rows>0 || $resultUser->num_rows>0 || $resultGuide->num_rows>0)
	{
		?>
			<script>
				alert("Email Already Exist !!!");
				window.location="User.php";
            </script>
        <?php
	}
	
	
	
	
	
	$insqry="insert into tbl_user (user_first_name,user_last_name,user_contact,user_email,user_address,user_dob,user_gender,user_password,user_photo,user_proof,user_place_id) values ('$first_name','$last_name','$contact','$email','$address','$dob','$gender','$password','$photo','$proof','$place_id')";
	if($con->query($insqry))
	{
		header("location:Login.php");
	}
	else
	{
	echo "failure";
	}
}





include("Head.php");
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel-Get:New user registration</title>
</head>

<body>
  <h2>User registration</h2>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="536" height="504" border="1">
  <tr>
      <td>District</td>
      <td><label for="sel_districtname"></label>
        <select name="sel_districtname" id="sel_districtname" onchange="getPlace(this.value)">
        <option>----select---</option>
        <?php
		$selqry="select * from tbl_district";
		$result=$con->query($selqry);
		while($row=$result->fetch_assoc())
		{
		?>
        <option value="<?php echo $row['district_id']?>"><?php echo $row['district_name']?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
       <select name="sel_place" id="sel_place">
        <option>----select---</option>
      
      </select></td>
    </tr>
    <tr>
      <td>First name</td>
      <td><label for="txt_firstname"></label>
      <input type="text" name="txt_firstname" id="txt_firstname" /></td>
    </tr>
    <tr>
      <td width="233">Last name</td>
      <td width="157"><label for="txt_name"></label>
      <input type="text" name="txt_lastname" id="txt_lastname" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="rad_gender" id="rad_male" value="male" />
        Male
          <label for="rad_male"></label>
      <input type="radio" name="rad_gender" id="rad_female" value="female" />
      <label for="rad_female">Female</label></td>
    </tr>
    <tr>
      <td>Date of birth</td>
      <td><label for="txt_dob"></label>
      <input type="date" name="txt_dob" id="txt_dob" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" required pattern="([0-9]{10,10})" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" /></td>
    </tr>
       <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea></td>
    </tr>
    
    <tr>
      <td>Photo</td>
      <td><label for="img_photo"></label>
      <input type="file" name="img_photo" id="img_photo" /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="img_proof"></label>
      <input type="file" name="img_proof" id="img_proof" /></td>
    </tr>
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_clear" id="btn_clear" value="Clear" /></td>
    </tr>
  </table>
</form>
</body>
<?php
include("Foot.php");
?>
<script src="../Assets/Jquery/jQuery.js"></script>
<script>
function getPlace(did)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
	  success: function(html){
		$("#sel_place").html(html);
	  }
	});
}
</script>
</html>