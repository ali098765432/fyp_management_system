<?php

error_reporting(0);
session_start();
if(!isset($_SESSION['loginuserstd'])){
  header('location:../studentlogin.php');
}

include 'db.php';

$getsesval = $_SESSION['loginuserstd'];
$seluserdetail="select * from students where email ='$getsesval' ";
$runseluserdetail = mysqli_query($conn,$seluserdetail);
$fetchdata=mysqli_fetch_array($runseluserdetail);
$getuseridvalue= $fetchdata['id'];
 $getstdegree= $fetchdata['degree'];


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Final Year Project Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark " style="background-color:#66023c;color: white;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 " href="admindashboard.php">Final Year Project Management System</a>

    </nav>
    <!--header here -->
    <?php include"header.php";?>

    <!--content area-->
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
  <main>
<div class="container" style="margin-right:1%;margin-top:5%;">
<div class="row justify-content-center">
<div class="col-lg-7">
<div class="card shadow-lg border-1 rounded-lg mt-5" >
<div class="card-header"><h3 class="text-center font-weight-light my-4" ><b>Weekly Progress Report</b></h3></div>
 <div class="card-body">
<form method="POST">
<div class="row mb-3">
<div class="col-md-12">


 <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="text"  required name="user_week" />
<label for="inputFirstName">Enter Week</label>
 </div>
</div>



</div>

<div class="row mb-3">
<div class="col-md-12">
     <div class="form-floating mb-3 mb-md-0">

        <textarea class="form-control" id="inputFirstName" type="text" placeholder="Enter Progress Report" required  name="user_reportdescp" rows="20"> </textarea>
 
<label for="inputFirstName">Progress Report</label>
 </div>

</div>

</div>


</div>



 <input type="submit" value="Add Weekly Progress Report" class="btn  btn-block form-control" name="updatestudentreportuserbtn" style="margin-top:30px;background-color: #66023c;color:white;">

  
 </form>
 </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
      
    </div>

<?php
    if(isset($_POST['updatestudentreportuserbtn'])){
$getweek= $_POST['user_week'];
$getreportdescp= $_POST['user_reportdescp'];

 $sel="SELECT * FROM weeklyreport WHERE 
 uid='$getuseridvalue' && 
week='$getweek'";
 $running=mysqli_query($conn,$sel);
 $check=mysqli_num_rows($running);
 if($check==1){
 

echo "<script> alert('This Week Report Has Already Been Added');</script>";
//$_SESSION['loginsup']=$usermail;
//echo "<script> window.location=
 //'supervisor/supervisordashboard.php'</script>";

//header('location:dashboard/index.php');
 

 }else{


        $insertnoti = "INSERT INTO weeklyreport(uid,week,progress) VALUES (
        '$getuseridvalue','$getweek','$getreportdescp')";

     $runnoti = mysqli_query($conn,$insertnoti);

     if($runnoti){
        echo "<script> alert('Report Progress Added Successfully')</script>";
       //  echo "<script> window.location=
 //'supervisorlogin.php'</script>";
     }else{
         echo "<script> alert('Not Added,Try Again')</script>";
     }
 

 }



   
}


?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
