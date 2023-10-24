<?php
include('../Assets/Connection/Connection.php');
include("Head.php");
$selQry="select * from tbl_user u inner join tbl_place p on u.user_place_id=p.place_id";
$data=$con->query($selQry)
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travelget: Registred Users</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" e>
<a href="HomePage.php">Back to Homepage</a>
  <table width="1100" height="265" border="1" align="right">
    <tr>
    <td>Serial number</td>
      <td>User first name</td>
      <td>User last name</td>
      <td>User contact</td>
      <td>User email</td>
      <td>User dob</td>
      <td>User gender</td>
      <td>User place </td>
      <td>User photo</td>
      <td>User proof</td>
   
    </tr>
    <?php
	$i=0;
	while($row=$data->fetch_assoc())
     {
	$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row["user_first_name"] ?></td>
      <td><?php echo $row["user_last_name"] ?></td>
      <td><?php echo $row["user_contact"] ?></td>
      <td><?php echo $row["user_email"] ?></td>
      <td><?php echo $row["user_dob"] ?></td>
      <td><?php echo $row["user_gender"] ?></td>
      <td><?php echo $row["place_name"] ?></td>
      <td> <img src="../Assets/Files/User/Photo/<?php echo $row["user_photo"] ?>" width="75" height="76"</td>
      <td> <img src="../Assets/Files/User/Proof/<?php echo $row["user_proof"] ?> "width="75" height="76"</td>
     
    </tr>
    <?php 
	 }
	 ?>
  </table>
</form>
</body>
<?php include("Foot.php"); ?>
</html>