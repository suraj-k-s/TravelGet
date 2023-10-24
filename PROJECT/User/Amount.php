

<?php
ob_start();
include("Head.php"); 
include('../Assets/Connection/Connection.php');
session_start();
$userid=$_SESSION['uid'];
$finalrate=$_GET["amount"];
if(isset($_GET["promo"]))
		{
			$count = $_GET["count"];
			$promocode_name1=$_GET["promo"];
			$selqry1="select * from tbl_promocode where promocode_name='$promocode_name1'";
			$row12=$con->query($selqry1);
			$row123=$row12->fetch_assoc();
			$bookid=$_GET["bid1"];
			$selqry="select * from tbl_packagebooking p inner join tbl_package q on p.package_id=q.package_id where booking_id='$bookid' and user_id='$userid'";
			
			$data12=$con->query($selqry); 
			$data123=$data12->fetch_assoc(); 
			
			
			 $ratewithoutpromo=$data123['package_rate']*$count;
			   $ratewithpromo=$row123['promocode_rate'];
			   $finalrate= $ratewithoutpromo - $ratewithpromo;
		}

if(isset($_POST["btn_check"]))
{
	$validpromo=$_POST["txt_promo"];
	$selqry="select * from tbl_promocode where promocode_name='$validpromo'";
$result=$con->query($selqry);	
	
	if($result->num_rows>0)
		{
			$selqryused="select  COALESCE(count(*),0) as num from tbl_usedpromocode p inner join tbl_user q on p.user_id=q.user_id where promocode_name='".$_POST["txt_promo"]."' and p.user_id='".$_SESSION["uid"]."'";
			$data=$con->query($selqryused);
			$rowS=$data->fetch_assoc();
			if($rowS["num"]>0)
				{
						echo '<script>alert("Dear user please try a new promo code you have already used this !!");</script>';
				}
		else{
			
			echo '<script>alert("Dear user your promocode has been approved !!");</script>';
			
			$userid=$_SESSION["uid"];
			$promocode_name=$_POST["txt_promo"];
		
			
			
			$insqry="insert into tbl_usedpromocode (promocode_name,user_id) values ('$promocode_name','$userid')";
			$con->query($insqry);
			
			$selQry = "select max(booking_id) as id from tbl_packagebooking";
	$data=$con->query($selQry); 
	$row=$data->fetch_assoc();
$bid1=$row["id"];

		    header("location:Amount.php?count=".$_GET["count"]."&promo=".urlencode($promocode_name) . "&bid1=" . urlencode($bid1));
			exit();
	
	
			
		}
		
		
} else{
 echo '<script>alert("Dear user please enter a valid promo code !!");</script>';
}
}


if(isset($_POST["btn_submit"]))
{
$selQry = "select max(booking_id) as id from tbl_packagebooking";
					$data=$con->query($selQry); 
					$row=$data->fetch_assoc();
					header("location:Payment.php?bid=".$row["id"]."&rate=".$finalrate);
				}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<table width="500" border="1" >
<form method="post">
    <tr>
      <td width="142">Apply Promocode</td>
      <td width="320" align="center"><label for="txt_promo" ></label>
      <input type="text" name="txt_promo" id="txt_promo" /></td>
      <td width="125"><input type="submit" name="btn_check" id="btn_check" value="Check" style="width: 90%; "/></td>
    </tr>
  </table>
<body>
<form id="form1" name="form1" method="post" action="">
	<br>
 <?php

    	if(isset($_GET["promo"]))
		{
			
?>
 <table width="500" border="1">
    <tr>
      <td width="73">Amount to be Paid</td>
      <td width="10">Promocode discount  </td>
      <td width="95">Total Amount after promo code</td>
    </tr>
<?php
		
	
	?>
    <tr>
      <td><?php echo $ratewithoutpromo?></td>
      <td><?php echo $ratewithpromo ?></td>
      <td><?php echo $finalrate; ?></td>  </tr>
  </table>
	  <?php
		}
	  
	   ?>
	  
  <br>
  <table width="200" border="1">
    <tr>
      <td align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" style="width:60%;" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
 <?php  include("Foot.php"); ?>
</form>
</body>
</html>