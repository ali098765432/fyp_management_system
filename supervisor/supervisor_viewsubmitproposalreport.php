<?php 
error_reporting(0);
session_start();
if(!isset($_SESSION['loginsup'])){
  header('location:../supervisorlogin.php');
}

include 'db.php';


$gettingid = $_GET['nid'];

      $notifyid = "update supervisornotification set status='read' where id='$gettingid'";
      $runnoti = mysqli_query($conn,$notifyid);

$getsesval = $_SESSION['loginsup'];
$seluserdetail="select * from supervisor where email ='$getsesval' ";
$runseluserdetail = mysqli_query($conn,$seluserdetail);
$fetchdata=mysqli_fetch_array($runseluserdetail);
$getuseridvalue= $fetchdata['id'];






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
    <a href="#" class="btn  form-control btn-xs pull-right" style="background-color: #66023c;color: white;">Submitted Proposals</a>
        <tr>
            <th>Sr No</th>
            <th>Student Name</th>
            <th>Proposal Name</th>
            <th>Submit Date</th>
            <th>Status</th>
            <th>Action</th>
           
          
            
        </tr>
    </thead>

    <tbody>

          <?php 

        $selpropdetail="select * from proposalfiles where supid ='$getuseridvalue' ";
$runselpropdetail = mysqli_query($conn,$selpropdetail);

while($rowprop=mysqli_fetch_array($runselpropdetail)){
    $xi =1;?>
            <tr>

        
   
       

        <?php 

        $getsupid = $rowprop['uid'];
        
        

        $selpropdetailsup="select * from students where id ='$getsupid' ";
$runselpropdetailsup = mysqli_query($conn,$selpropdetailsup);

$fetchsupname = mysqli_fetch_array($runselpropdetailsup);

$fetchfullname =$fetchsupname['firstname'] . " " .     $fetchsupname['lastname'];                                              


        ?>

        <tr>
         <td style="font-size:12px;"><?php  echo $xi++;?></td>
            <td style="font-size:12px;"><?php  echo $fetchfullname?></td>
            <td style="font-size:12px;"><?php echo $rowprop['projname'];   ?></td>
            <td style="font-size:12px;"><?php echo $rowprop['submiteddate'];    ?></td>
            <td style="font-size:12px;"><?php echo $rowprop['status'];   ?></td>
            <td><a href="../student/proposalfiles/<?php echo $rowprop['proposalfile']; ?>"  target="_blank" class="btn btn-success" style="font-size:12px;" >Download</a>
              <!--  <a href="../student/proposalfiles/<?php// echo $rowprop['proposalfile']; ?>"  target="_blank" class="btn btn-success" >Profile</a>-->
<a class="btn btn-primary" href="acceptproposal.php?pid=<?php echo $rowprop['id'];  ?>&uid=<?php echo $getsupid;?>" style="font-size:12px;">Accept</a>
              <a href="rejectproposal.php?pid=<?php echo $rowprop['id'];  ?> &uid=<?php echo $getsupid;?>" class="btn btn-danger" style="font-size:12px;">Reject</a>

         
            </td>    
        </tr>


  <?php } ?>


 

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
