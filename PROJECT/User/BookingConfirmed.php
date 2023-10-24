<?php
include("Head.php");
session_start();
$username=$_SESSION['userfirstname'];

echo "dear " . $_SESSION['userfirstname'] . " has been confirmed by Travel Get";



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p></p>

<p><a href="HomePage.php">GotoHomePage</a></p>
</body>
<?php include("Head.php"); ?>
</html>