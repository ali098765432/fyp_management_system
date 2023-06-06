<?php 
error_reporting(0);
session_start();


if(!isset($_SESSION['loginuser'])){
  header('location:../adminlogin.php');
}



include '../includes/db.php';

 $gettingid=$_GET['id'];

 $query="select * from supervisor where 
 id ='$gettingid'";
$run=mysqli_query($conn,$query);
$row=mysqli_fetch_array($run);


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
<div class="container" style="margin-right:1%;margin-top:5%;">
<div class="row justify-content-center">
<div class="col-lg-7">
<div class="card shadow-lg border-1 rounded-lg mt-5">
<div class="card-header"><h3 class="text-center font-weight-light my-4"><b>Edit Supervisor</b></h3></div>
 <div class="card-body">
<form method="POST">

<div class="row mb-3">
<div class="col-md-12">
 <div class="form-group">
  <label for="user_role">Supervisor Name</label>

 <input class="form-control" id="inputqty" type="text" placeholder="name" required name="supname" value="<?php echo  $row['name'];?>">


</div>
</div>

</div>

<div class="row mb-3">
<div class="col-md-12">
 <div class="form-group">
  <label for="user_role">Supervisor Email</label>

 <input class="form-control" id="inputqty" type="email" placeholder="email" required name="supemail" value="<?php echo  $row['email'];?>">


</div>
</div>

</div>

<div class="row mb-3">
<div class="col-md-12">
 <div class="form-group">
  <label for="user_role">Supervisor Password</label>

 <input class="form-control" id="inputqty" type="text" placeholder="password" required name="suppassword" value="<?php echo  $row['password'];?>">


</div>
</div>

</div>

<div class="row mb-3">
<div class="col-md-12">
 <div class="form-group">
  <label for="user_role">Year</label>

 <input class="form-control" id="inputqty" type="text" placeholder="year" required name="supyear" value="<?php echo  $row['year'];?>">


</div>
</div>

</div>


<div class="row mb-3">
<div class="col-md-12">
 <div class="form-group">
  <label for="user_role">Supervisor Project Department</label>

<select class="form-control" required  name="supdepartment">
  <option selected><?php echo  $row['department'];?></option>
  <option>BSCS</option>
  <option>BSE</option>
  <option>BEE</option>
  <option>BBA</option>
</select>


</div>
</div>

</div>




  </div>

 <input type="submit" value="Update Supervisor" class="btn btn-block form-control" name="submitsupupdate" style="background-color: #66023c;color:white;">

  
 </form>
 </div>


                            </div>
                        </div>
                    </div>
                </div><br><br>
            </main>
        </div>
      
    </div>




<?php
    if(isset($_POST['submitsupupdate'])){
$getupname=$_POST['supname'];
$getupemail=$_POST['supemail'];
$getuppassword =$_POST['suppassword'];
$getupyear =$_POST['supyear'];
$getupdepart =$_POST['supdepartment'];






$query="UPDATE supervisor SET 
name='$getupname',
email='$getupemail',password=
'$getuppassword',
year='$getupyear',department='$getupdepart' WHERE id='$gettingid'";

    $run=mysqli_query($conn,$query);

    if($run){
        echo "<script> alert('updated successfully')</script>";

        echo "<script> window.location='admin_viewsupervisor.php'</script>";



}

else{
  echo "<script> alert('Error Updated,Try Again')</script>";
  echo "<script> window.location='admin_viewsupervisor.php'</script>";
      
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
