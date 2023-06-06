<?php 
session_start();
error_reporting(0);
include 'includes/db.php';


if(isset($_POST['loginstudent'])){
$usermail= $_POST['stdemail'];
 $userpass= $_POST['stdpassword'];

 $sel="SELECT * FROM students WHERE 
 email='$usermail' && 
 password='$userpass'";
 $running=mysqli_query($conn,$sel);
 $check=mysqli_num_rows($running);
 if($check==1){
 

echo "<script> alert('Login successfully');</script>";
$_SESSION['loginuserstd']=$usermail;
echo "<script> window.location=
 'student/userdashboard.php'</script>";

//header('location:dashboard/index.php');
 

 }else{
 echo "<script> alert('Login Failed, invalid detail')</script>";
 echo "<script> window.location=
 'studetlogin.php'</script>";
 }


}

?>
