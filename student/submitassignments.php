<?php 
error_reporting(0);
session_start();
if(!isset($_SESSION['loginuserstd'])){
  header('location:../studentlogin.php');
}

include 'db.php';
$gettingsubmissionid =$_GET['sbmtid'];
$gettingsubmissionname =$_GET['tempname'];
$gettingsubmissionprodjectid =$_GET['pid'];
$gettingsubmissionsupervisorid =$_GET['sid'];



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
<div class="card-header"><h3 class="text-center font-weight-light my-4"><b>Add Project Assigment Submission</b></h3></div>
 <div class="card-body">
<form method="POST"  enctype="multipart/form-data">

<div class="row mb-3" style="margin-left:10px;margin-right: 10px;">
<div class="col-md-12">
    <label for="inputqty">Submission Name</label>
 <div class="form-floating">

 <input class="form-control" id="inputqty" type="text" placeholder="name" required name="submissionprojfilename" value="<?php echo $gettingsubmissionname; ?>" disabled 
>
 </div>
</div>

</div>



<div class="row mb-3" style="margin-left:10px;margin-right: 10px;">
<div class="col-md-12">
    <label for="inputqty">Submission File</label>
 <div class="form-floating">

 <input class="form-control" id="inputqty" type="file" placeholder="submission file" required name="submissionprojfile" style="height:60px;" 
>
 </div>
</div>

</div>




  </div>


 


 <input type="submit" value="Submit Submission" class="btn  btn-block form-control" name="submitpropsubmission" style="background-color:#66023c;color:white;">

  
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

if(isset($_POST['submitpropsubmission'])){


//img variable
$getfilename =$_FILES['submissionprojfile']['name'];
$getfiletmpname =$_FILES['submissionprojfile']['tmp_name'];


 $folder ="submissionfiles/".$getfilename;
      move_uploaded_file($getfiletmpname,$folder);
//,'$getsupervisor'
  //    '$folder','pending',NOW()

    //   supervisorid, proposalfile,status submitdate

      //insert data

//
      $query="update projectsubmissions set status='not checked yet', submitfile='$getfilename', stdsubmitfiledate=NOW() where 
      id='$gettingsubmissionid'";
    $run=mysqli_query($conn,$query);

    if($run){

    $insertnoti = "INSERT INTO supervisornotification(msg,supid,senttime, 
    status,type,pid) VALUES ('Student submit his assignment check it ','$gettingsubmissionsupervisorid',NOW(),'unread','assignment','$gettingsubmissionprodjectid');";

     $runnoti = mysqli_query($conn,$insertnoti);


       echo "<script> alert('Submission Submit Successfully')</script>";
 echo "<script> window.location=
 'user_viewacceptedproject.php'</script>";
      
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
