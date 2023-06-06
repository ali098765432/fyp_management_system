<?php 
//error_reporting(0);
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


$selpropsalfiledata = "SELECT * FROM proposalfiles where uid='$getuseridvalue' AND status='Accepted'";
$runproposalfiledata = mysqli_query($conn,$selpropsalfiledata);
$fetchdataofacceptedprop = mysqli_fetch_array($runproposalfiledata);

$gtproid=$fetchdataofacceptedprop['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Final Year Project Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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
<div class="container" style="margin-right:0.2%;margin-top:5%;">
<div class="row justify-content-center">
<div class="col-lg-9">
<div class="card shadow-lg border-1 rounded-lg mt-5">

<a href="#" class="btn form-control btn-xs pull-right" style="background-color:#66023c;color: white; ">Project  Assignment</a>
 <div class="card-body">
<form method="post">



<div class="row mb-6">
<div class="col-md-6">
  <label>Project File</label>

</div>

<div class="col-md-6">
  <a href="proposalfiles/<?php echo $fetchdataofacceptedprop['proposalfile']; ?>"  target="_blank">View File</a>


</div>

  </div>


<div class="row mb-6">
<div class="col-md-6">
  <label>Supervisor</label>

</div>

<div class="col-md-6">
  <?php 


  $supidgt=$fetchdataofacceptedprop['supid'];

  $selpropsalfiledatasp = "SELECT * FROM supervisor where id='$supidgt'";
$runproposalfiledatasp = mysqli_query($conn,$selpropsalfiledatasp);
$fetchdataofacceptedpropsp = mysqli_fetch_array($runproposalfiledatasp);
  ?>


  <p href=""><?php  echo $fetchdataofacceptedpropsp['name']?></p>


</div>

  </div>


  <div class="row mb-6">
<div class="col-md-6">
  <label>Start Date</label>

</div>

<div class="col-md-6">
  <p href=""><?php echo 
  $fetchdataofacceptedprop['submiteddate']; ?></p>


</div>

  </div>


  <!--marks data -->

    <div class="row mb-6">
<div class="col-md-6">
  <label>Marks</label>

</div>

<div class="col-md-6">
   <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  View Marks
</button></td>


</div>

  </div>
 

  
 </form>







 <div class="container">
   <div class="row">
     <h5 style="margin-top:20px;margin-left:-10px;">Project Document Submission</h5>

     <div class="col-lg-12"  style="margin-top:15px;">
       <table class="table">
        <thead>
          <tr>
          <th class="text-center;" style="font-size: 15x;">ID</th>
          <th class="text-center" style="font-size: 15px;">Name</th>
          <th class="text-center" style="font-size: 15px;">Start Date</th>
          <th class="text-center" style="font-size: 15px;">Due Date</th>
          <th class="text-center" style="font-size: 15px;">Submission</th>
          <th class="text-center" style="font-size: 15px;">status</th>
          <th class="text-center" style="font-size: 15px;">Reviews</th>
        </tr>
        </thead>

        <tbody>


           <?php 

        $selpropdetail="select * from projectsubmissions where pid ='$gtproid' ";
$runselpropdetail = mysqli_query($conn,$selpropdetail);
$xi =1;
while($rowprop=mysqli_fetch_array($runselpropdetail)){
    ?>

       <tr>
          <td class="text-center;" style="font-size: 14px;"><?php echo $xi++;?></td>
          <td class="text-center;" style="font-size: 14px;"><?php echo $rowprop['submissonname'];?><br>
            <a href="../supervisor/templatesfiles/<?php echo $rowprop['templatefiile']; ?>"  >template download</a></td>
          <td class="text-center;" style="font-size: 14px;"><?php echo $rowprop['startdate'];?></td>
          <td class="text-center;" style="font-size: 14px;"><?php echo $rowprop['duedate'];?></td>





<?php 

$begindate=$rowprop['startdate'];
$b = date('Y-m-d',strtotime($begindate));

$enddate=$rowprop['duedate'];
$e=date('Y-m-d',strtotime($enddate));

$curentdate=date('Y-m-d');

if($begindate>=$curentdate AND $enddate>=$curentdate){

  ?>


  
          <td class="text-center;" style="font-size: 
      14px;color:white">

<a href="submitassignments.php?sbmtid=<?php  echo $rowprop['id'];?>&tempname=<?php  echo $rowprop['submissonname'];?> &pid=<?php  echo $gtproid;?>&sid=<?php  echo $supidgt;?>" class="btn text-white" 
style="background-color: #66023c">submit</a></td>


     


<?php 



}
else {?>

    <td class="text-center;" style="font-size: 
      16x;color:white">

<a href="">Expire</a></td>
  <?php

}

?>


 <?php 
if($rowprop['submitfile']==""){ ?>


          <td >not submit</td>
<?php }else{?>


<td >Submitted</td>

  <?php 



} ?>

  




 


          
          <td class="text-center;" style="font-size: 14;"><?php  echo $rowprop['comment']; ?> <br>
            <!--<a href="">completed file</a></td>-->
        </tr>


  <?php } ?>







          
           


        </tbody>
       </table>
     </div>
   </div>
 </div>
 </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <br>

            <br>
            <br>
        </div>
      
    </div>



  <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <center><h4 class="modal-title text-center">Marks Report</h4></center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" >

          <input type="hidden" name="stduid" value="<?php echo $getsupid; ?>">


          <?php 

        
$selviewmarks = "SELECT * FROM studentmarks where studentid='$getuseridvalue' ";

$runingselviewmarks = mysqli_query($conn,$selviewmarks);
$fetchingselviewmarks=mysqli_fetch_array($runingselviewmarks);


          ?>

          
  <div class="form-group"  style="margin-top:10px;margin-right:10px;margin-left:10px;">
    <label style="text-align:left;">Proposal Marks</label>
    <input type="text" class="form-control"  name="stdpromarks" value="<?php echo $fetchingselviewmarks['proposalmarks']?>" disabled>
  </div>

  <div class="form-group"  style="margin-top:10px;margin-right:10px;margin-left:10px;">
    <label style="text-align:left;">Mid Marks</label>
    <input type="text" class="form-control" name="stdmidmarks" value="<?php echo $fetchingselviewmarks['midmarks']?>" disabled>
  </div>


  <div class="form-group"  style="margin-top:10px;margin-right:10px;margin-left:10px;">
    <label style="text-align:left;">Report Marks</label>
    <input type="text" class="form-control" name="stdreportsubmarks" value="<?php echo $fetchingselviewmarks['reportmarks']?>" disabled>
  </div>

  <div class="form-group"  style="margin-top:10px;margin-right:10px;margin-left:10px;">
    <label style="text-align:left;">Final Submission Marks</label>
    <input type="text" class="form-control"  name="stdfinalsubmarks" value="<?php echo $fetchingselviewmarks['finalsubmarks']?>" disabled>
  </div>

 




</form>
      </div>



      


    </div>
  </div>
</div>
    
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
