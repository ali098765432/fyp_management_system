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

 $getstdfirst= $fetchdata['firstname'];
 $getstdlast= $fetchdata['lastname'];
 $getstdemail= $fetchdata['email'];
 $getstdpassword= $fetchdata['password'];
 $getstdbatch= $fetchdata['batch'];

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
<div class="card-header"><h3 class="text-center font-weight-light my-4" ><b>Profile</b></h3></div>
 <div class="card-body">
<form method="POST">
<div class="row mb-3">
<div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="text" placeholder="Enter first name" required name="user_firstname"  value="<?php echo  $getstdfirst?>" readonly/>
<label for="inputFirstName">First name</label>
 </div>
</div>

<div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="text" placeholder="Enter last name" required name="user_lastname"  value="<?php echo  $getstdlast;?>" readonly/>
<label for="inputFirstName" >Last name</label>
 </div>
</div>

</div>

<div class="row mb-3">
<div class="col-md-6">
     <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="email" placeholder="Enter email" required  name="user_email"  value="<?php echo  $getstdemail;?>" readonly/>
<label for="inputFirstName">Email</label>
 </div>

</div>

<div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="text" placeholder="Enter password"  required  name="user_password" value="<?php echo $getstdpassword;?>" minlength="8" />
<label for="inputFirstName">Password</label>
 </div>
</div>
</div>

<div class="row mb-3">

 <div class="col-md-6">
 <div class="form-floating">
 <input class="form-control" id="inputFirstName" type="text" placeholder="Enter degree" required  name="user_degree" value="<?php echo $getstdegree;?>" readonly />
<label for="inputFirstName">Degree</label>
 </div>
</div>


 <div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
 <input class="form-control" id="inputFirstName" type="text" placeholder="Enter batch" required  name="user_batch"  value="<?php echo  $getstdbatch;?>" readonly/>
<label for="inputFirstName">Batch</label>
 </div>
</div>



</div>


</div>



 <input type="submit" value="Update" class="btn  btn-block form-control" name="updatestudentuserbtn" style="margin-top:30px;background-color: #66023c;color:white;">

  
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
$getuppassword =$_POST['user_password'];







$query="UPDATE students SET 
password='$getuppassword' WHERE id='$getuseridvalue'";

    $run=mysqli_query($conn,$query);

    if($run){
        echo "<script> alert('updated successfully')</script>";

echo "<script> window.location='user_Profile.php'</script>";


}

else{
  echo "<script> alert('Not Updated Try Again')</script>";
  
      
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
