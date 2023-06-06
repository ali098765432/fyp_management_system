<?php 

error_reporting(0);
session_start();
if(!isset($_SESSION['loginsup'])){
  header('location:../supervisorlogin.php');
}

include 'db.php';
$getuseridvalue=$_GET['pid'];

        $selpropdetail="select * from proposalfiles where id ='$getuseridvalue' ";
$runselpropdetail = mysqli_query($conn,$selpropdetail);
$rowprop=mysqli_fetch_array($runselpropdetail);


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
<div class="container" style="margin-right:1%;margin-left:11%;margin-top:3%;">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="card shadow-lg border-1 rounded-lg mt-5">

 <div class="card-body">
<table class="table">
    <tr>

           <?php 

        $getsupid = $rowprop['uid'];
        
        

        $selpropdetailsup="select * from students where id ='$getsupid' ";
$runselpropdetailsup = mysqli_query($conn,$selpropdetailsup);

$fetchsupname = mysqli_fetch_array($runselpropdetailsup);

$fetchfullname =$fetchsupname['firstname'] . " " .     $fetchsupname['lastname'];                                              


        ?>

        <td>Student Name :</td>
         <td><?php echo $fetchfullname; ?></td>
    </tr>

     <tr>
        <td>Project Name:</td>
         <td><?php echo $rowprop['projname'];?></td>
    </tr>

     <tr>
        <td>Project File :</td>
         <td><a href="../student/proposalfiles/<?php echo $rowprop['proposalfile']; ?>" class="btn btn-success">View</a></td>
    </tr>
</table>
 </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
      
    </div>






      <div class="container-fluid" style="margin-left:-4%;margin-top:-300px;">
    <div class="row ">
        <div class="col-lg-2"></div>
         <div class="col-lg-1"></div>
        <div class="col-lg-9" style=";">
            <table class="table table-striped custab" style="">
    <thead>
    <a href="#" class="btn  form-control btn-xs pull-right" style="background-color: #66023c;color:white;">Student Submission</a>
        <tr>
            <th>Sr No</th>
            <th>Template Name</th>
            <th>Submit Date</th>
            <th>Action</th>
           
          
            
        </tr>
    </thead>

    <tbody>

        <tr>
            <td>1</td>
            <td>SRS</td>
            <td>14-1-2023</td>
            <td><a href="" class="btn btn-success">View File</a>
            
            </td>    
        </tr>


        <tr>
            <td>2</td>
            <td>Design</td>
            <td>12-1-2023</td>
            <td><a href="">Not Submit yet</a>
              
            </td>    
        </tr>


        <tr>
            <td>3</td>
            <td>Coding</td>
            <td>14-1-2023</td>
            <td><a href="" >Not Submit Yet</a>
            
            </td>    
        </tr>

    </tbody>

          </table>

         



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
