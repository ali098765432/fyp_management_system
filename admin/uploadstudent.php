<?php 
error_reporting(0);
include '../includes/db.php';
session_start();
if(!isset($_SESSION['loginuser'])){
  header('location:../adminlogin.php');
}


  if(isset($_POST['addstudentuserbtn'])){

    $getfirst =$_POST['user_firstname'];
    $getlast =$_POST['user_lastname'];
    $getemail =$_POST['user_email'];
    $getpassword =$_POST['user_password'];
    $getdegree =$_POST['user_degree'];
    $getbatch =$_POST['user_batch'];




$check_userquery="SELECT * FROM students WHERE firstname=
'$getfirst' && lastname='$getlast' && email='$getemail'
&& password='$getpassword' && degree='$getdegree' && batch='$getbatch' ";
$runcheck=mysqli_query($conn,$check_userquery);
$numuser=mysqli_num_rows($runcheck);
if($numuser>0){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Student Already Added")';
    
       echo '</script>';  

       echo "<script> window.location=
       'admin_addstudent.php'</script>";


}
else{
   

  $query="insert into students(firstname,lastname,email,password,degree,batch) Values 
  ('$getfirst','$getlast','$getemail','$getpassword','$getdegree','$getbatch')";
    $run=mysqli_query($conn,$query);

    if($run){
      echo "<script> alert('Added Successfully')</script>";
       echo "<script> window.location=
       'admin_viewuser.php'</script>";
     // header('location:userlogin.php');
    }

    else{
     echo "<script> alert('Not Added, Try Again')</script>";
       echo "<script> window.location=
       'admin_addstudent.php'</script>";
    }
  }}

  ?>