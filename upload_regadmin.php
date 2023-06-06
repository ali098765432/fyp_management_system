<?php 
error_reporting(0);
include 'includes/db.php';


  if(isset($_POST['regadmin'])){

    $getemail =$_POST['adminemail'];
    $getpassword =$_POST['adminpassword'];
    $getdepartment =$_POST['admindep'];



$check_userquery="SELECT * FROM admin WHERE email='$getemail'";
$runcheck=mysqli_query($conn,$check_userquery);
$numuser=mysqli_num_rows($runcheck);
if($numuser>0){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Email Already Register")';
    
       echo '</script>';  
       echo "<script> window.location=
       'adminregister.php'</script>";
}
else{
   

  $query="insert into admin(email,password,department) Values 
  ('$getemail','$getpassword',
   '$getdepartment')";
    $run=mysqli_query($conn,$query);

    if($run){
      echo "<script> alert('Register Successfully')</script>";
       echo "<script> window.location=
       'adminlogin.php'</script>";
     // header('location:userlogin.php');
    }

    else{
     echo "<script> alert('Account Not Created')</script>";
       echo "<script> window.location=
       'adminregister.php'</script>";
    }
  }}

  ?>