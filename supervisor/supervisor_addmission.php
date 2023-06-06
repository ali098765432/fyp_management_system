<?php 
error_reporting(0);
?><?php
include 'db.php';
$gettingid = $_GET['pid'];

if(isset($_GET['pid'])){

    $query="SELECT * FROM proposalfiles WHERE id='$gettingid'";
    $run=mysqli_query($conn,$query);

    $fetchdata = mysqli_fetch_array($run);

    $fetchingprojname=$fetchdata['projname'];

    $getuseridvalue= $fetchdata['uid'];
    $getsupidvalue= $fetchdata['supid'];

     $selpropdetailsup="select * from students where id ='$getuseridvalue' ";
$runselpropdetailsup = mysqli_query($conn,$selpropdetailsup);

$fetchsupname = mysqli_fetch_array($runselpropdetailsup);

$fetchfullname =$fetchsupname['firstname'] . " " .     $fetchsupname['lastname'];
$fetchinguridv =$fetchsupname['id'];



?>
<!DOCTYPE html>
<html lang="en">
    <head>
      
        <title>Final Year Project Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #66023c;">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 " href="admindashboard.php">Final Year Project Management System</a>
           
          
          
        </nav>
        <!--header here -->
      <?php include"header.php";?>
     


     <!--content area-->
      <!--content area-->
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
  <main>
<div class="container" style="margin-right:1%;margin-top:3%;">
<div class="row justify-content-center">
<div class="col-lg-7">
<div class="card shadow-lg border-1 rounded-lg mt-5">
<div class="card-header"><h3 class="text-center font-weight-light my-4"><b>Project Submission</b></h3></div>
 <div class="card-body">
<form method="POST" enctype="multipart/form-data">
<div class="row mb-3">
<div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" type="text" placeholder="Project Name" required name="proname" value="<?php  echo $fetchingprojname;?>" readonly  />
<label for="inputFirstName">Project Name</label>
 </div>
</div>


<div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="text" placeholder="Student Name" required name="stdname"  value="<?php echo $fetchfullname?>" readonly  />
 <input type="hidden" name="usridtostore" value="<?php  echo $getuseridvalue?>">
 <input type="hidden" name="supidtostore" value="<?php  echo  $getsupidvalue?>">
<label for="inputFirstName">Student Name</label>
 </div>
</div>

</div>


<div class="row mb-3">

    <div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="text"  required name="protempname" style="margin-top:2%;"  />
<label for="inputFirstName" style="margin-top:-1%;">Template Name</label>
 </div>
</div>

<div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="file"  required name="protempfile" style="margin-top:2%;" />
<label for="inputFirstName" style="margin-top:-1%;">Template File</label>
 </div>
</div>

</div>


<div class="row mb-3">
<div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="date" placeholder="start date" required name="protempstartdate" min="<?= date('Y-m-d')?>" />
<label for="inputFirstName">Start Date</label>
 </div>
</div>

<div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="date" placeholder="Due Date" required name="protempenddate" min="<?= date('Y-m-d')?>" />
<label for="inputFirstName" >Due Date</label>
 </div>
</div>

</div>



  </div>

 <input type="submit" value="Add Submission" class="btn  form-control" name="addpropsubmission" style="background-color:#66023c;color:white;">

  
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



// getting file data 

if(isset($_POST['addpropsubmission'])){


 $getsupervisorid=$_POST['supidtostore'];
 $getusrid=$_POST['usridtostore'];
 $gettempname=$_POST['protempname'];
 $getstartdate=$_POST['protempstartdate'];

 $getduedate=$_POST['protempenddate'];

//img variable
$getfilename =$_FILES['protempfile']['name'];
$getfiletmpname =$_FILES['protempfile']['tmp_name'];


$oldstartdate = date('Y-m-d H');
$newstartdate=date($oldstartdate, $getstartdate);

$oldduedate = date('Y-m-d H');
$newduedate=date($oldduedate, $getduedate);


 $folder ="templatesfiles/".$getfilename;
      move_uploaded_file($getfiletmpname,$folder);



      $insertprop ="INSERT INTO projectsubmissions (pid,
       uid,supid,templatefiile,submissonname,startdate,
        duedate) VALUES(
      '$gettingid','$fetchinguridv','$getsupervisorid',
      '$getfilename','$gettempname','$getstartdate','$getduedate')";

      $runinsertprop=mysqli_query($conn,$insertprop);

      if($runinsertprop){

       

        $innoti = "INSERT INTO notification(msg,userid,sentnotitime,status,type) VALUES ('New Project assignment has been added by supervisor','$fetchinguridv',Now(),'unread','assignment')";

       $runnotiin = mysqli_query($conn,$innoti);

        echo "<script> alert('Submission Added Successfully')</script>";

// echo "<script> window.location=
 //'supervisor_viewsubmitproposalreport.php'</script>";
      
      }
        else{
            echo "<script> alert('Error,not submitted try again')</script>";
        }



}


?>

<div class="container-fluid" style="margin-top:-8%;margin-left:-4%;">
    <div class="row ">
        <div class="col-lg-2"></div>
         <div class="col-lg-1"></div>
        <div class="col-lg-9">
            <table class="table table-striped custab" style="">
    <thead>
    <a href="#" class="btn form-control btn-xs pull-right" style="background-color: #66023c;color:white;">Already Added Submission Assignment</a>
        <tr>
            <th>Sr No</th>
            <th>Name</th>
            <th>Start Date</th>
            <th>Due Date</th>
            <th>Template</th>
        </tr>
    </thead>
    <tbody>


        <?php 

        $selpropdetail="select * from projectsubmissions where pid ='$gettingid' ";
$runselpropdetail = mysqli_query($conn,$selpropdetail);
$xi =1;
while($rowprop=mysqli_fetch_array($runselpropdetail)){
    ?>
            


        <tr>
         <td><?php  echo $xi++;?></td>
            <td><?php echo $rowprop['submissonname'];   ?></td>
            <td><?php 
$sd = $rowprop['startdate'];
$newsd=date('Y-m-d',strtotime($sd));

            echo $rowprop['startdate'];    ?></td>
            <td><?php

$ed = $rowprop['duedate'];
$newsded=date('Y-m-d',strtotime($ed));

             echo $rowprop['duedate'] ;    ?></td>
            <td><a href="templatesfiles/<?php echo $rowprop['templatefiile']; ?>"  target="_blank" class="btn btn-success" >Download</a>
            

               <td>
           <!-- <a href=" "  style="color:white;"  class="btn btn-success" >View</a>-->
        </td>

         
            </td>    
        </tr>


  <?php } ?>
            


       
  
  
            </tbody>
           
    </table>
        </div>
    
    </div>
</div>

<br><br><br>
<br><br><br>
                  




    <?php } ?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
