<?php 
error_reporting(0);
include '../includes/db.php';
?>
<?php 
session_start();
if(!isset($_SESSION['loginuser'])){
  header('location:../adminlogin.php');
}
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
   
   <?php include"header.php";?>

    <!--content area-->
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
  <main>
<div class="container" style="margin-right:1%;margin-top:8%;">
<div class="row justify-content-center">
<div class="col-lg-7">
<div class="card shadow-lg border-1 rounded-lg mt-5">
<div class="card-header"><h3 class="text-center font-weight-light my-4"><b>Import Student Data</b></h3></div>
 <div class="card-body">
<form method="POST"  enctype="multipart/form-data">

<div class="row mb-3" style="margin-left:10px;margin-right: 10px;">
<div class="col-md-12">
    <label for="inputqty">Select Data File</label>
 <div class="form-floating">

 <input class="form-control" type="file"  required name="studentdatafile"  style="height:60px;" 
>
 </div>
</div>

</div>




  </div>


 


 <input type="submit" value="Import Data" class="btn  btn-block form-control" name="submitimportdata" style="background-color:#66023c;color:white;">

  
 </form></div>
 <br><br><br><br><br>
 </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
      
    </div>

    <?php 



// getting file data 

if(isset($_POST['submitimportdata'])){


//img variable
$getfilename =$_FILES['studentdatafile']['name'];
$fileExtension = explode('.', $getfilename);
$fileExtension=strtolower(end($fileExtension));
$newFileName=date("Y.m.d")."-".date("h.i.sa")."."
.$fileExtension;
$targetDirectory="studentimportdata/".$newFileName;
$getfiletmpname =$_FILES['studentdatafile']['tmp_name'];

      move_uploaded_file($getfiletmpname,$targetDirectory);

      //insert data

      require "excelReader/excel_reader2.php";
      require "excelReader/SpreadsheetReader.php";

      $reader = new SpreadsheetReader($targetDirectory);

      foreach ($reader as $key => $row) {
        $firstname = $row[0];
        $lastname =$row[1];
        $email=$row[2];
        $password =$row[3];
        $degree =$row[4];
        $batch =$row[5];

         $insertprop ="insert ignore into students(id,firstname,lastname,email,password,degree,batch) Values 
  ('','$firstname','$lastname','$email','$password',
  '$degree','$batch')";

      $runinsertprop=mysqli_query($conn,$insertprop);

        # code...
      }

 echo "<script> alert('Data Successfully Imported')</script>";
 echo "<script> window.location=
       'admin_viewuser.php'</script>";   
    



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
