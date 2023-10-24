<?php
include('../Assets/Connection/Connection.php');
if(isset($_POST['btn_save']))
{
	$category=$_POST['txt_category'];
	$InsQry="insert into tbl_category(category_name) values('$category')";
	if($con->query($InsQry))
	{
		 
	}
	else
	{
		echo "Failed";
	}
}
?>
<table width="200" border="1">
  <tr>
    <td>Sl.number</td>
    <td>Category</td>
  </tr>
  <?php
  $selqry="select * from tbl_category";
  $data=$con->query($selqry);
  $i=0;
  while($row=$data->fetch_assoc())
  {
	  $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row["category_name"]?></td>
  </tr>
  <?php
  }
  ?>
</table>
<form name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Category</td>
      <td><label for="txt_category"></label>
      <input type="text" name="txt_category" id="txt_category"></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_save" id="btn_save" value="Save">
      </div></td>
    </tr>
  </table> 
</form>
