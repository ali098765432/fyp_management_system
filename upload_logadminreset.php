<?php 
session_start();
error_reporting(0);
include 'includes/db.php';


if(isset($_POST['loginadminreset'])){
$usermail= $_POST['adminemail'];
 $userpass= $_POST['adminpassword'];

 $sel="SELECT * FROM admin WHERE 
 email='$usermail'";
 $running=mysqli_query($conn,$sel);
 $check=mysqli_num_rows($running);
 if($check==1){

$query="UPDATE admin SET 
password='$userpass' WHERE  email='$usermail'";

    $run=mysqli_query($conn,$query);

    if($run){
        echo "<script> alert('Password Reset successfully');</script>";

echo "<script> window.location=
 'adminlogin.php'</script>";


}

else{
  echo "<script> alert('Not Reset, Try Again ')</script>";
 echo "<script> window.location=
 'adpasswordreset.php'</script>";
      
    }




//header('location:dashboard/index.php');
 

 }else{
 echo "<script> alert('invalid account')</script>";
 echo "<script> window.location=
 'suppasswordreset.php'</script>";
 }


}

?>
