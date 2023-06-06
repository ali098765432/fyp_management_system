<?php 
session_start();
error_reporting(0);
include 'includes/db.php';


if(isset($_POST['loginadmin'])){
$usermail= $_POST['adminemail'];
 $userpass= $_POST['adminpassword'];

 $sel="SELECT * FROM admin WHERE 
 email='$usermail' && 
 password='$userpass'";
 $running=mysqli_query($conn,$sel);
 $check=mysqli_num_rows($running);
 if($check==1){
 

echo "<script> alert('Login successfully');</script>";
$_SESSION['loginuser']=$usermail;
echo "<script> window.location=
 'admin/admindashboard.php'</script>";

//header('location:dashboard/index.php');
 

 }else{
 echo "<script> alert('Login Failed, invalid detail')</script>";
 echo "<script> window.location=
 'adminlogin.php'</script>";
 }


}

?>
