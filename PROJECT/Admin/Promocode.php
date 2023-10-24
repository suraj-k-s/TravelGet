
<?php
include("../Assets/Connection/Connection.php");
 include("Head.php");
if(isset($_POST['btn_submit']))
{
	$promocode=$_POST['txt_promocode'];
	$rate=$_POST['txt_rate'];
    $InsQry="insert into tbl_promocode(promocode_name,promocode_rate) values('$promocode','$rate')";
	if($con->query($InsQry));
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <br>
  <br>
  <br>
  <table width="514" height="200" border="1" align="center">
    <tr>
      <td width="238">Promocode Name</td>
      <td width="260"><label for="txt_promocode"></label>
      <input type="text" name="txt_promocode" id="txt_promocode" /></td>
    </tr>
    <tr>
      <td>Amount to be Reduced</td>
      <td><label for="txt_rate"></label>
      <input type="text" name="txt_rate" id="txt_rate" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
<?php include("Foot.php"); ?>
</html>