<?php 
error_reporting(0);
include '../includes/db.php';


session_start();
if(!isset($_SESSION['loginuser'])){
  header('location:../adminlogin.php');
}


  if(isset($_POST['supyear'])){

    $getname =$_POST['supname'];
    $getemail =$_POST['supemail'];
    $getpassword =$_POST['suppassword'];
    $getyear =$_POST['supyear'];
    $getdepart =$_POST['supdepartment'];




$check_userquery="SELECT * FROM supervisor WHERE name=
'$getname' && email='$getemail' && password='$getpassword'
&& year='$getyear' && department='$getdepart' ";
$runcheck=mysqli_query($conn,$check_userquery);
$numuser=mysqli_num_rows($runcheck);
if($numuser>0){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Supervisor Already Added")';
    
       echo '</script>';  

       echo "<script> window.location=
       'admin_addsupervisor.php'</script>";


}
else{
   

  $query="insert into supervisor(name,email,password,year,department) Values 
  ('$getname','$getemail','$getpassword','$getyear','$getdepart')";
    $run=mysqli_query($conn,$query);

    if($run){
      echo "<script> alert('Added Successfully')</script>";
       echo "<script> window.location=
       'admin_viewsupervisor.php'</script>";
     // header('location:userlogin.php');
    }

    else{
     echo "<script> alert('Not Added ! Try Again')</script>";
       echo "<script> window.location=
       'admin_addsupervisor.php'</script>";
    }
  }}

  ?>