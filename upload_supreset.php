<?php 
session_start();
error_reporting(0);
include 'includes/db.php';


if(isset($_POST['loginsupreset'])){
$usermail= $_POST['supname'];
 $userpass= $_POST['suppassword'];

 $sel="SELECT * FROM supervisor WHERE 
 email='$usermail'";
 $running=mysqli_query($conn,$sel);
 $check=mysqli_num_rows($running);
 if($check==1){

$query="UPDATE supervisor SET 
password='$userpass' WHERE  email='$usermail'";

    $run=mysqli_query($conn,$query);

    if($run){
        echo "<script> alert('Password Reset successfully');</script>";

echo "<script> window.location=
 'supervisorlogin.php'</script>";


}

else{
  echo "<script> alert('Not Reset, Try Again ')</script>";
 echo "<script> window.location=
 'suppasswordreset.php'</script>";
      
    }




//header('location:dashboard/index.php');
 

 }else{
 echo "<script> alert('invalid account')</script>";
 echo "<script> window.location=
 'suppasswordreset.php'</script>";
 }


}

?>
