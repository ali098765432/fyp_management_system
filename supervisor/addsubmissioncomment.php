<?php 
error_reporting(0);

session_start();
if(!isset($_SESSION['loginsup'])){
  header('location:../supervisorlogin.php');
}

include 'db.php';
$gettingsubmissionupateid =$_GET['psbid'];
$gettingupdatedcommentuserid = $_GET['uid'];

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
    <nav class="sb-topnav navbar navbar-expand navbar-dark " style="background-color:#66023c;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 " href="admindashboard.php">Final Year Project Management System</a>

    </nav>
    <!--header here -->
    <?php include"header.php";?>

    <!--content area-->
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
  <main>
<div class="container" style="margin-right:1%;margin-top:8%;">
<div class="row justify-content-center">
<div class="col-lg-7">
<div class="card shadow-lg border-1 rounded-lg mt-5">
<div class="card-header"><h3 class="text-center font-weight-light my-4"><b>Add Submission Comment</b></h3></div>
 <div class="card-body">
<form method="POST"  enctype="multipart/form-data">

<div class="row mb-3" style="margin-left:10px;margin-right: 10px;">
<div class="col-md-12">
    <label for="inputqty">Submission Comment or Marks</label>
 <div class="form-floating">

  <TEXTAREA class="form-control" required name="submissioncomment" rows="15" cols="8" style="height:150px;"></TEXTAREA>


 </div>
</div>

</div>
  </div>


 


 <input type="submit" value="Submit Submission Comment" class="btn  btn-block form-control" name="submitpropsubmissioncomment" style="background-color:#66023c;color:white;">

  
 </form>

 </div><br><br>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
      
    </div>

    <?php 



// getting file data 

if(isset($_POST['submitpropsubmissioncomment'])){

$getcomments=$_POST['submissioncomment'];


      //insert data

//
      $query="update projectsubmissions set status='checked',comment='$getcomments' where 
      id='$gettingsubmissionupateid'";
    $run=mysqli_query($conn,$query);

    if($run){

       $innoti = "INSERT INTO notification(msg,userid,sentnotitime,status,type) VALUES ('Supervisor added comments to your assignment check it','$gettingupdatedcommentuserid',Now(),'unread','assignmentcomment')";

       $runnotiin = mysqli_query($conn,$innoti);
       echo "<script> alert('Submission Comment Submit Successfully')</script>";
echo "<script> window.location=
 'admin_supervisoraddsubmissionschedule.php'</script>";
      
    }

    else{
       echo "<script> alert(' Not  submitted, Try Again')</script>";
 
    }



}


?>
<script type="text/javascript" src="js/jquery.js"></script>





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
