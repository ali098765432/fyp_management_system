<?php 
error_reporting(0);
?><?php
error_reporting(0);
session_start();
 
if(!isset($_SESSION['loginuser'])){
  header('location:../adminlogin.php');
}




include '../includes/db.php';

$gettingid=$_GET['id'];
$query="delete from students where id='$gettingid'";
$run=mysqli_query($conn,$query);

if($run){


	 echo "<script> alert('Deleted successfully')</script>";

	echo "<script> window.location='admin_viewuser.php'</script>";



       
	
}
else{
	echo "<script> alert('Error not  Deleted')</script>";
	echo "<script> window.location='admin_viewuser.php'</script>";
}

?>