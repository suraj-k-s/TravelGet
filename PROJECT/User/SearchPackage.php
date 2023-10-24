<?php 
session_start();
include('../Assets/Connection/Connection.php');
if(isset($_SESSION['uid']) && $_SESSION['uid'] != "null") {
  include("Head.php");
} else {
  include("HeadWithoutLogin.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travelget:Search package</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table  border="1" align="center">
    <tr>
      <td >Destination</td>
     <td ><input type="text" name="txt_destination" </td>
      <td >Package type</td>
      <td ><label for="sel_package_type"></label>
        <select name="sel_package_type" id="sel_package_type">
        <option value="">----Select-----</option>
         <?php
			$selqry="select * from tbl_package_type";
			$data=$con->query($selqry); 
			while($row=$data->fetch_assoc())
			{
			?>
            <option value="<?php echo $row["package_type_id"] ?>"><?php echo $row["package_type_name"] ?></option>
			<?php
			
			}
		?>
      	</select>
       </td>
       <td style=" width: 200px;" align="center">
       <input type="submit" value="Search" name="btn_search" style=" width:80%;"/>
       </td>
    </tr>
  </table>
  <table align="center">
  <tr>
  <?php
  if(isset($_POST["btn_search"]))
  {
	  $destination=$_POST["txt_destination"];
	  $i=0;
	  $packagetypeid=$_POST["sel_package_type"];
	  $selQry = "select * from tbl_package where true";
	  if($packagetypeid!="")
	  {
		 $selQry = $selQry." and package_type_id='$packagetypeid'"; 
	  }
	  
	  if($destination!="")
	  {
		 $selQry = $selQry." and package_name LIKE '%$destination%'"; 
	  }
	  
	  $data = $con->query($selQry);
	  while($row = $data->fetch_assoc()){
		  $i++;
		  ?>
          
          <td>
          	
            <table  border="1" style="margin:10px">
            	<tr>
                    <td colspan="2" align="center">
                        <img src="../Assets/Files/PackageImage/<?php echo $row["package_photo"] ?>" width="120" height="120"/>
                    </td>
                </tr>
                <tr>
                    <td>
                    	Package
                    </td>
                    <td>
                    	<?php echo $row["package_name"] ?>
                    </td>
                </tr>
                 <tr>
                    <td>
                    	Rate
                    </td>
                    <td>
                    	<?php echo $row["package_rate"] ?>
                    </td>
                </tr>
                 <tr>
                    <td colspan="2" align="center">
                    	<a href="ViewMore.php?pid=<?php echo $row["package_id"] ?>">View More</a>
                    </td>
                </tr>
            </table>
          
          </td>
          
          <?php
		  if($i==4)
		  {
			  $i=0;
			  echo "</tr><tr>";
		  }
	  }
  }
  
  ?>
  </table>
</form>
</body>
<?php

include("Foot.php");

 ?>
</html>