<?php 
error_reporting(0);
session_start();
if(!isset($_SESSION['loginuserstd'])){
  header('location:../studentlogin.php');
}

include 'db.php';

$getsesval = $_SESSION['loginuserstd'];
$seluserdetail="select * from students where email ='$getsesval' ";
$runseluserdetail = mysqli_query($conn,$seluserdetail);
$fetchdata=mysqli_fetch_array($runseluserdetail);
$getuseridvalue= $fetchdata['id'];
 $getstdegree= $fetchdata['degree'];

 $getstdfulnme= 
 $fetchdata['firstname']." ".$fetchdata['lastname'];





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
<div class="card-header"><h3 class="text-center font-weight-light my-4"><b>Add Proposal</b></h3></div>
 <div class="card-body">
<form method="POST"  enctype="multipart/form-data">

<div class="row mb-3">
<div class="col-md-12">
 <div class="form-group">
  <label for="user_role">Select Supervisor</label>
    <select id="inputState" class="form-control" name="optselsup">
       
<?php



        $selqueryysup ="select * from supervisor where department ='$getstdegree'";
$runqueryysup = mysqli_query($conn,$selqueryysup);

  while ($rowysup=mysqli_fetch_array($runqueryysup)) {
    
      echo "<option value='$rowysup[id]'> $rowysup[name] </option>";

  //  value='".$row['cat_id']."'

     //  value='$rowysup[id]'

    }

    echo "</select>";?>


       
    </div>
</div>
</div>

</div>

<div class="row mb-3" style="margin-left:10px;margin-right: 10px;">
<div class="col-md-12">
    <label for="inputqty">Project Name</label>
 <div class="form-floating">


    <input type="hidden" name="useridd" value="<?php  echo $getuseridvalue ?>">

    

 <input class="form-control" id="inputqty" type="text" placeholder="name" required name="projname" style="height:40px;" 
>
 </div>
</div>

</div>

<div class="row mb-3" style="margin-left:10px;margin-right: 10px;">
<div class="col-md-12">
    <label for="inputqty">Project File</label>
 <div class="form-floating">

 <input class="form-control" id="inputqty" type="file" placeholder="name" required name="projfile" style="height:60px;" 
>
 </div>
</div>

</div>




  </div>


 


 <input type="submit" value="Submit Proposal" class="btn  btn-block form-control" name="submitprop" style="background-color:#66023c;color:white;">

  
 </form>
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

if(isset($_POST['submitprop'])){

$getname=$_POST['projname'];
 $getsupervisor=$_POST['optselsup'];
 $getusrid=$_POST['useridd'];

//img variable
$getfilename =$_FILES['projfile']['name'];
$getfiletmpname =$_FILES['projfile']['tmp_name'];


 $folder ="proposalfiles/".$getfilename;
      move_uploaded_file($getfiletmpname,$folder);
//,'$getsupervisor'
  //    '$folder','pending',NOW()

    //   supervisorid, proposalfile,status submitdate

      //insert data

      $insertprop ="INSERT INTO Proposalfiles(uid,supid,proposalfile,submiteddate,status,projname,  stdname) VALUES(
'$getusrid','$getsupervisor','$getfilename',NOW(),'Not Checked Yet','$getname','$getstdfulnme')";

      $runinsertprop=mysqli_query($conn,$insertprop);

      if($runinsertprop){


    $insertnoti = "INSERT INTO supervisornotification(msg,
     supid,senttime,status,type) VALUES ('New Student Added the Proposal Check it ',
     '$getsupervisor',NOW(),'unread','proposal');";

     $runnoti = mysqli_query($conn,$insertnoti);

        echo "<script> alert('Submitted Successfully,Wait for supervisor response')</script>"; 
      
      }
        else{
            echo "<script> alert('Error,not submitted try again')</script>";
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
