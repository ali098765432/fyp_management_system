<?php 
session_start();
error_reporting(0);
include 'includes/db.php';


if(isset($_POST['loginsup'])){
$usermail= $_POST['supname'];
 $userpass= $_POST['suppassword'];

 $sel="SELECT * FROM supervisor WHERE 
 email='$usermail' && 
 password='$userpass'";
 $running=mysqli_query($conn,$sel);
 $check=mysqli_num_rows($running);
 if($check==1){
 

echo "<script> alert('Login successfully');</script>";
$_SESSION['loginsup']=$usermail;
echo "<script> window.location=
 'supervisor/supervisordashboard.php'</script>";

//header('location:dashboard/index.php');
 

 }else{
 echo "<script> alert('Login Failed, invalid detail')</script>";
 echo "<script> window.location=
 'supervisorlogin.php'</script>";
 }


}

?>
