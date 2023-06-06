<?php 

//error_reporting(0);
session_start();
if(!isset($_SESSION['loginsup'])){
  header('location:../supervisorlogin.php');
}

include 'db.php';
$getuseridvalue=$_GET['npid'];
$gettingid = $_GET['nid'];

      $notifyid = "update supervisornotification set status='read' where id='$gettingid'";
      $runnoti = mysqli_query($conn,$notifyid);

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
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:#66023c;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 " href="admindashboard.php">Final Year Project Management System</a>

    </nav>
    <!--header here -->
    <?php include"header.php";?>

    <!--content area-->

        <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
  <main>
<div class="container" style="margin-right:1%;margin-left:11%;margin-top:5%;">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="card shadow-lg border-1 rounded-lg mt-5">

 <div class="card-body">
<table class="table">


    <tr>
        <td>Student Name :</td>

             <?php 

        $getsupid = $rowprop['uid'];
        
        

        $selpropdetailsup="select * from students where id ='$getsupid' ";
$runselpropdetailsup = mysqli_query($conn,$selpropdetailsup);

$fetchsupname = mysqli_fetch_array($runselpropdetailsup);

$fetchfullname =$fetchsupname['firstname'] . " " .     $fetchsupname['lastname'];                                              


        ?>
         <td><?php  echo $fetchfullname;?> </td>
    </tr>

     <tr>
        <td>Project Name:</td>
         <td><?php echo $rowprop['projname'];?></td>
    </tr>

     <tr>
        <td>Project File :</td>
         <td><a href="../student/proposalfiles/<?php echo $rowprop['proposalfile']; ?>" class="btn btn-success">View</a></td>
    </tr>

    <tr>
        <td>Marks</td>
         <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Marks
</button></td>
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

        
$selviewmarks = "SELECT * FROM studentmarks where studentid='$getsupid' ";

$runingselviewmarks = mysqli_query($conn,$selviewmarks);
$fetchingselviewmarks=mysqli_fetch_array($runingselviewmarks);


          ?>

          
  <div class="form-group"  style="margin-top:10px;margin-right:10px;margin-left:10px;">
    <label style="text-align:left;">Proposal Marks</label>
    <input type="text" class="form-control" placeholder="Enter Proposal Marks" name="stdpromarks" value="<?php echo $fetchingselviewmarks['proposalmarks']?>" >
  </div>

  <div class="form-group"  style="margin-top:10px;margin-right:10px;margin-left:10px;">
    <label style="text-align:left;">Mid Marks</label>
    <input type="text" class="form-control" placeholder="Enter Mid Marks" name="stdmidmarks" value="<?php echo $fetchingselviewmarks['midmarks']?>">
  </div>


  <div class="form-group"  style="margin-top:10px;margin-right:10px;margin-left:10px;">
    <label style="text-align:left;">Report Marks</label>
    <input type="text" class="form-control" placeholder="Enter Report Marks" name="stdreportsubmarks" value="<?php echo $fetchingselviewmarks['reportmarks']?>">
  </div>

  <div class="form-group"  style="margin-top:10px;margin-right:10px;margin-left:10px;">
    <label style="text-align:left;">Final Submission Marks</label>
    <input type="text" class="form-control" placeholder="Enter Final Submission Marks" name="stdfinalsubmarks" value="<?php echo $fetchingselviewmarks['finalsubmarks']?>">
  </div>

 



 
 


 <center> <button type="submit" class="btn btn-primary" style="margin-top:30px;width:20%;color:white;" name="btnaddmarks">Add</button>

   <button type="submit" class="btn btn-success" style="margin-top:30px;width:20%;color:white;" name="btnupdatemarks">Update</button>

 </center>
</form>
      </div>



      


    </div>
  </div>
</div>




      <div class="container-fluid" style="margin-left:-4%;margin-top:-200px;">
    <div class="row ">
        <div class="col-lg-2"></div>
         <div class="col-lg-1"></div>
        <div class="col-lg-9" style=";">






            <table class="table table-striped custab" style="">
    <thead>
    <a href="#" class="btn form-control btn-xs pull-right" style="background-color: #66023c;color: white;">Student Submission</a>
        <tr>
            <th>Sr No</th>
            <th>Template Name</th>
            <th>Submit Date</th>
            <th>Start Date</th>
            <th>Due Date</th>
            <th>Action</th>
           
          
            
        </tr>
    </thead>

    <tbody>

<?php 

$selpropdetailsb="select * from projectsubmissions where pid ='$getuseridvalue' ";
$runselpropdetailsb = mysqli_query($conn,$selpropdetailsb);
$iv =1;
while($rowpropsb=mysqli_fetch_array($runselpropdetailsb)){
    

?>

        

        <tr>
            <td><?php  echo $iv++;?></td>
            <td><?php echo $rowpropsb['submissonname'] ?></td>
            <td><?php echo 
            $rowpropsb['stdsubmitfiledate'] ?></td>
             <td><?php echo $rowpropsb['startdate'] ?></td>
              <td><?php echo $rowpropsb['duedate'] ?></td>

              <?php
              if($rowpropsb['submitfile']==""){

                ?>

                <td>Not Submitted Yet</td>


                <?php
              } else{

              ?>
            <td><a href="../student/submissionfiles/<?php echo $rowpropsb['submitfile']; ?>" class="btn btn-success">Download File</a>

                <a href="addsubmissioncomment.php?psbid=<?php echo  $rowpropsb['id'];?>" class="btn btn-primary">Add Comments</a>
            
            </td>  <?php } ?>  
        </tr>
<?php } ?>

       

    </tbody>

          </table>

          <br><br><br>


<?php 


if(isset($_POST['btnupdatemarks'])){
//get range of med marks
$getproposalmarksup =$_POST['stdpromarks'];
$getmidmarksup =$_POST['stdmidmarks'];
$getreportmarksup =$_POST['stdreportsubmarks'];
$getfinalmarksup =$_POST['stdfinalsubmarks'];
$getstdidup=$_POST['stduid'];




      //insert data

$selstdalreadyup = "UPDATE studentmarks SET 
proposalmarks='$getproposalmarksup',
midmarks='$getmidmarksup',
reportmarks='$getreportmarksup',finalsubmarks='$getfinalmarksup' Where studentid='$getstdidup'";


$runingstdalreadyup = mysqli_query($conn,$selstdalreadyup);


if($runingstdalreadyup){


 

     echo "<script> alert('Marks Updated Successfully ')</script>";

        echo "<script> window.location=
       'supervisor_viewcompletesubmissionofsingleuser.php?pid=$getuseridvalue'</script>";

 
}else{

  echo "<script> alert('Error, Not Updated Try Again')</script>";


}
     
}


      ?>





      <?php 


if(isset($_POST['btnaddmarks'])){
//get range of med marks
$getproposalmarks =$_POST['stdpromarks'];
$getmidmarks =$_POST['stdmidmarks'];
$getreportmarks =$_POST['stdreportsubmarks'];
$getfinalmarks =$_POST['stdfinalsubmarks'];
$getstdid =$_POST['stduid'];

$messaging ='';


      //insert data

$selstdalready = "SELECT * FROM studentmarks where studentid='$getstdid'";
$runingstdalready = mysqli_query($conn,$selstdalready);

$numofrecordalready= mysqli_num_rows($runingstdalready);

if($numofrecordalready>0){

     echo "<script> alert('you already added the marks now update the marks')</script>";
 
}else{

   $insertcol="INSERT INTO studentmarks(proposalmarks,midmarks, reportmarks,finalsubmarks,studentid) VALUES ('$getproposalmarks','$getmidmarks',
      '$getreportmarks','$getfinalmarks','$getstdid') ";


      $runcol=mysqli_query($conn,$insertcol);

      if($runcol){

        echo "<script> alert('Marks Added Successfully')</script>";


     
}

else {

  echo "<script> alert('Error, not added try again')</script>";


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
