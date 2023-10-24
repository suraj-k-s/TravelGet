
<?php
include("../Assets/Connection/Connection.php");

session_start();

$guideid=$_SESSION['gid'];

$selQry="select * from tbl_guide where guide_id='$guideid'";
$resultguide=$con->query($selQry);
$row=$resultguide->fetch_assoc();




	if(isset($_POST['btn_change']))
	{
		$first_name=$_POST['txt_first_name'];
		$last_name=$_POST['txt_last_name'];
		$contact=$_POST['txt_contact'];
		
		$address=$_POST['txt_address'];
	
		$upQry="update tbl_guide set guide_first_name='$first_name',guide_last_name='$last_name',guide_contact='$contact',guide_address='$address' where guide_id='$guideid'";
		if($con->query($upQry))
		{
				header("location:Myprofile.php");
		}
	}
	
  include("Head.php");
?>






<form id="form1" name="form1" method="post" action="">
  <table width="345" height="169" border="1">
    <tr>
      <td width="172">First Name</td>
      <td width="157"><label for="txt_first_name"></label>
      <input type="text" name="txt_first_name" id="txt_first_name" value=<?php echo $row["guide_first_name"]?> /></td>
    </tr>  
    <tr>
      <td width="172">Last Name</td>
      <td width="157"><label for="txt_last_name"></label>
      <input type="text" name="txt_last_name" id="txt_last_name" value=<?php echo $row["guide_last_name"]?> /></td>
    </tr>  
      <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $row["guide_contact"]?>"/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" value="<?php echo $row["guide_address"]?>" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_change" id="btn_change" value="Change" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  <?php include("Foot.php"); ?>
</form>

