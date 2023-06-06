<?php 
error_reporting(0);
session_start();
if(!isset($_SESSION['loginsup'])){
  header('location:../supervisorlogin.php');
}

include 'db.php';

$getsesval = $_SESSION['loginsup'];
$getuid = $_GET['uid'];

 $selpropdetail="select * from weeklyreport where uid='$getuid'";
$runselpropdetail = 
mysqli_query($conn,$selpropdetail);






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
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:#66023c;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 " href="supervisordashboard.php">Final Year Project Management System</a>

    </nav>
    <!--header here -->
    <?php include"header.php";?>

    <!--content area-->






      <div class="container-fluid" style="margin-left:-4%;margin-top:120px;">
    <div class="row ">
        <div class="col-lg-2"></div>
         <div class="col-lg-1"></div>
        <div class="col-lg-9" style=";">
            <table class="table table-striped custab" style="">
    <thead>
    <a href="#" class="btn form-control btn-xs pull-right" style="background-color: #66023c;color:white;">Weekly Progress Report</a>
        <tr>
            <th>Sr No</th>
            <th>Week</th>
            <th>Progress</th>     
        </tr>
    </thead>

    <tbody>


<?php 

if($numrows=mysqli_num_rows($runselpropdetail)>0){
   $i =1; 
  while($rowprop=mysqli_fetch_array($runselpropdetail)){

?>
        <tr>
            <td><?php echo  $i++; ?></td>
            <td><?php  echo $rowprop['week']; ?></td>
            <td><?php  echo $rowprop['progress']; ?></td>
             
        </tr>

<?php }  } ?>
     

       

    </tbody>

    </tbody>

          </table>


          <!--modal-->

   
</div>


         



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
