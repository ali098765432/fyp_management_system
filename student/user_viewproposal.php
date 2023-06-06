<?php 
error_reporting(0);
session_start();
if(!isset($_SESSION['loginuserstd'])){
  header('location:../studentlogin.php');
}

include 'db.php';

if(isset($_GET['nid'])){

   $gettingid = $_GET['nid'];

      $notifyid = "update notification set status='read' where id='$gettingid'";
      $runnoti = mysqli_query($conn,$notifyid);

}
$getsesval = $_SESSION['loginuserstd'];
$seluserdetail="select * from students where email ='$getsesval' ";
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
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:#66023c">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 " href="admindashboard.php">Final Year Project Management System</a>

        </nav>
        <!--header here -->
      <?php include"header.php";?>

      <!--content area-->
  
<div class="container-fluid" style="margin-top:8%;margin-left:-4%;">
    <div class="row ">
        <div class="col-lg-2"></div>
         <div class="col-lg-1"></div>
        <div class="col-lg-9" style=";">
            <table class="table table-striped custab" style="">
    <thead>
    <a href="#" class="btn form-control btn-xs pull-right" style="background-color:#66023c;color: white; ">Submitted Proposal</a>
        <tr>
            <th>ID</th>
            <th>Project Name</th>
            <th>Selected Supervisor</th>
            <th>Submitted Date</th>
            <th>Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php 

        $selpropdetail="select * from proposalfiles where uid ='$getuseridvalue' ";
$runselpropdetail = mysqli_query($conn,$selpropdetail);

while($rowprop=mysqli_fetch_array($runselpropdetail)){
    $xi =1;?>
            <tr>

        
   <td><?php  echo $xi++;?></td>
        <td><?php echo $rowprop['projname'];   ?></td>

        <?php 

        $getsupid = $rowprop['supid'];
          $getsupdate = $rowprop['submiteddate'];
        

        $selpropdetailsup="select * from supervisor where id ='$getsupid' ";
$runselpropdetailsup = mysqli_query($conn,$selpropdetailsup);

$fetchsupname = mysqli_fetch_array($runselpropdetailsup)                                                 


        ?>
        <td><?php echo $fetchsupname['name'];  ?></td>
        <td><?php echo $rowprop['submiteddate'];    ?></td>
        <td><?php echo $rowprop['status'];   ?></td>
       
        <td class="text-center"><a class='btn btn-primary btn-xs'
                 href="proposalfiles/<?php echo $rowprop['proposalfile']; ?>"  download="<?php echo $rowprop['proposalfile']; ?>"><span class="glyphicon glyphicon-edit"></span>Download</a> 
 
                 </td>
            </tr><?php }



        ?>
           
            </tbody>
           
    </table>
        </div>
    
    </div>
</div>
                  
     
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
       
      
    </body>
</html>
