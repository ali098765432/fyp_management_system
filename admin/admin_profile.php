<?php 
//error_reporting(0);

session_start();

if(!isset($_SESSION['loginuser'])){
  header('location:../adminlogin.php');
}

include '../includes/db.php';


$getsesval = $_SESSION['loginuser'];
$seluserdetail="select * from admin where email ='$getsesval' ";
$runseluserdetail = mysqli_query($conn,$seluserdetail);
$fetchdata=mysqli_fetch_array($runseluserdetail);
$getuseridvalue= $fetchdata['id'];
$getuseremailvalue= $fetchdata['email'];
$getuserpasswordvalue= $fetchdata['password'];
$getuserdepartvalue= $fetchdata['department'];


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
<div class="card-header"><h3 class="text-center font-weight-light my-4"><b>Profile Details</b></h3></div>
 <div class="card-body">
<form method="POST">


<div class="row mb-3">
<div class="col-md-12">
 <div class="form-group">
  <label for="user_role">Admin Email</label>

 <input class="form-control" id="inputqty" type="email" placeholder="email" required name="supemail" value="<?php echo  $getuseremailvalue?>" readonly>


</div>
</div>

</div>

<div class="row mb-3">
<div class="col-md-12">
 <div class="form-group">
  <label for="user_role">Admin Password</label>

 <input class="form-control" id="inputqty" type="text" placeholder="password" required name="suppassword" value="<?php echo $getuserpasswordvalue?>" minlength="8">


</div>
</div>

</div>

<div class="row mb-3">
<div class="col-md-12">
 <div class="form-group">
  <label for="user_role">Department</label>

 <input class="form-control" id="inputqty" type="text" placeholder="year" required name="supyear" value="<?php echo  $getuserdepartvalue;?>" readonly>


</div>
</div>

</div>




  </div>

 <input type="submit" value="Update" class="btn btn-block form-control" name="submitsupupdate" style="background-color: #66023c;color:white;">

  
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
$getuppassword =$_POST['suppassword'];

$query="UPDATE admin SET 
password='$getuppassword' WHERE id='$getuseridvalue'";

    $run=mysqli_query($conn,$query);

    if($run){
        echo "<script> alert('Password updated successfully')</script>";

        echo "<script> window.location='admin_Profile.php'</script>";
}

else{
  echo "<script> alert('Not Updated,Try Again')</script>";
      
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
