<?php 
error_reporting(0);

session_start();
if(!isset($_SESSION['loginsup'])){
  header('location:../supervisorlogin.php');
}

include 'db.php';

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
        <a class="navbar-brand ps-3 " href="admindashboard.php">Final Year Project Management System</a>

    </nav>
    <!--header here -->
    <?php include"header.php";?>

    <!--content area-->

        <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
  <main>
<div class="container" style="margin-right:1%;margin-left:11%;margin-top:6%;">
<div class="row justify-content-center">

<div class="col-lg-8">
<div class="card shadow-lg border-1 rounded-lg mt-5">
<h2 class="text-center" style="margin-top:20px;">Chat Boot</h2>
 <div class="card-body">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <form class="form-inline" style="float:right;" method="POST" action="supervisorsearchstd.php">
 
  <div class="form-group mx-sm-9 mb-2">
   
    <input type="text" class="form-control"  placeholder="Search by name" 
    name="searchq">
  </div>&nbsp &nbsp &nbsp
  <button type="submit" class="btn mb-2" style="background-color: #66023c;color:white" name="searchbtn">Search</button>
</form>
            </div>
        </div>
    </div>


<table class="table" style="margin-top:3%;">

    <thead>


    <tr>
        <th>Student ID</th>
        <th>Student Name</th>
        <th class="text-center">Action</th>
    </tr>
        

    </thead>

     <tbody>


          <?php 

        $selpropdetail="select * from proposalfiles where supid ='$getuseridvalue' AND status='Accepted' ";
$runselpropdetail = mysqli_query($conn,$selpropdetail);
 $xi =1;
while($rowprop=mysqli_fetch_array($runselpropdetail)){
   ?>
            <tr>

        
   
       

        <?php 
//id of supervisor selected user 
        $getsupid = $rowprop['uid'];


        //selecting msgs of the users 

  $selectingmsgs="SELECT * FROM msgs 
        Where fromu='$getsupid' AND tou='$getuseridvalue' AND status='unread'";

        $runselectingmsgs=mysqli_query($conn,$selectingmsgs);

      
        

        $selpropdetailsup="select * from students where id ='$getsupid' ";
$runselpropdetailsup = mysqli_query($conn,$selpropdetailsup);

$fetchsupname = mysqli_fetch_array($runselpropdetailsup);

$fetchfullname =$fetchsupname['firstname'] . " " .     $fetchsupname['lastname'];

$fetchfulid =$fetchsupname['id'];                                              


        ?>

        <tr>
         <td><?php  echo $xi++;?></td>
            <td><?php  echo $fetchfullname?>
            <?php

            if(mysqli_num_rows($runselectingmsgs)>0){

                ?>

                <span >New Message <span class="badge badge-success"><?php echo mysqli_num_rows($runselectingmsgs); ?></span></span>

                <?php
            }


             ?>

              </td>
           
            <td><a href="chatbox.php?uid=<?php  echo $fetchsupname['id']?>&uname=<?php echo $fetchfullname?>" class="btn btn-success"  >Open Chat </a>
            
         
            </td>    
        </tr>


  <?php } ?>

       
      

    </tbody>



   
   
</table>
 </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
      
    </div>






   
          

         



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
