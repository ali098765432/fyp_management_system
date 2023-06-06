<?php 
error_reporting(0);
?><?php 
error_reporting(0);
session_start();
 
if(!isset($_SESSION['loginuser'])){
  header('location:../adminlogin.php');
}



include '../includes/db.php';

 $gettingid=$_GET['id'];

 $query="select * from students where 
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
    <nav class="sb-topnav navbar navbar-expand navbar-dark " style="background-color:#66023c;color: white;">
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
<div class="card shadow-lg border-1 rounded-lg mt-5" >
<div class="card-header"><h3 class="text-center font-weight-light my-4" ><b>Edit Student</b></h3></div>
 <div class="card-body">
<form method="POST">
<div class="row mb-3">
<div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="text" placeholder="Enter first name" required name="user_firstname"  value="<?php echo  $row['firstname'];?>"/>
<label for="inputFirstName">First name</label>
 </div>
</div>

<div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="text" placeholder="Enter last name" required name="user_lastname"  value="<?php echo  $row['lastname'];?>"/>
<label for="inputFirstName" >Last name</label>
 </div>
</div>

</div>

<div class="row mb-3">
<div class="col-md-6">
     <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="email" placeholder="Enter email" required  name="user_email"  value="<?php echo  $row['email'];?>"/>
<label for="inputFirstName">Email</label>
 </div>

</div>

<div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="text" placeholder="Enter password" required  name="user_password" value="<?php echo  $row['password'];?>"/>
<label for="inputFirstName">Password</label>
 </div>
</div>
</div>

<div class="row mb-3">

 <div class="col-md-6">
 <div class="form-floating">
 <select class="form-control" required  name="user_degree" required>
  <option selected><?php echo  $row['degree'];?></option>
  <option>BSCS</option>
  <option>BSE</option>
  <option>BEE</option>
  <option>BBA</option>
</select>
<label for="inputFirstName">Degree</label>
 </div>
</div>


 <div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="text" placeholder="Enter batch" required  name="user_batch"  value="<?php echo  $row['batch'];?>"/>
<label for="inputFirstName">Batch</label>
 </div>
</div>



</div>


</div>



 <input type="submit" value="Update Student" class="btn  btn-block form-control" name="updatestudentuserbtn" style="margin-top:30px;background-color: #66023c;color:white;">

  
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
    if(isset($_POST['updatestudentuserbtn'])){
$getupfirst=$_POST['user_firstname'];
$getuplast=$_POST['user_lastname'];
$getupemail=$_POST['user_email'];
$getuppassword =$_POST['user_password'];
$getupdegree =$_POST['user_degree'];
$getupbatch =$_POST['user_batch'];






$query="UPDATE students SET 
firstname='$getupfirst',
lastname='$getuplast',
email='$getupemail',password=
'$getuppassword',
degree='$getupdegree',batch='$getupbatch' WHERE id='$gettingid'";

    $run=mysqli_query($conn,$query);

    if($run){
        echo "<script> alert('updated successfully')</script>";

        echo "<script> window.location='admin_viewuser.php'</script>";



}

else{
  echo "<script> alert('Error Updated Try Again')</script>";
  echo "<script> window.location='admin_viewuser.php'</script>";
      
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
