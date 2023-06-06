<?php 
error_reporting(0);
?>


  <?php
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
<div class="container" style="margin-right:1%;margin-left:11%;margin-top:5%;">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="card shadow-lg border-0 rounded-lg mt-5">
	<h1 class=" text-white" style="padding:3%;background-color: #66023c;">Notifications &nbsp

<?php 

$selallquestion ="SELECT * FROM notification WHERE status='unread' AND userid='$getuseridvalue'";

$run = mysqli_query($conn,$selallquestion);

$numofrows = mysqli_num_rows($run);


   ?>

   <span class="badge badge-primary" style="border-radius:50%;font-size:18px;margin-left: -3%;margin-bottom:1%;"><?php
if($numofrows > 0){
    echo $numofrows; 
}

    ?></span>

    </h1>

 <div class="card-body">
<table class="table">

      <?php 
$selall ="SELECT * FROM notification 
Where userid='$getuseridvalue'  ORDER BY sentnotitime DESC";

            $runall = mysqli_query($conn,$selall);
           $si =1;
            while($rowfetch = mysqli_fetch_array($runall)){



      ?>


          <?php 
       if($rowfetch['status']=="unread" ){

         
?>
<?php 

if($rowfetch['type']=='proposal'){
?>

    <tr style="background-color:lightgray;">

      
       <td> <a href="user_viewproposal.php?nid=<?php  echo $rowfetch['id'] ?>"><?php echo $rowfetch['msg']  ?></a><br>
       <span>Date: &nbsp <?php 
       $gtingdate= $rowfetch['sentnotitime'];


       echo date('y-m-d',strtotime($gtingdate)) ; ?>&nbsp &nbsp Time :   <?php 
       $gtingdatee= $rowfetch['sentnotitime'];


       echo date('H:i A',strtotime($gtingdatee)) ; ?> </span>
       </td>
    </tr><?php } else{?>


    <!--submission-->


    <tr style="background-color:lightgray;">

      
       <td> <a href="user_viewacceptedproject.php?nid=<?php  echo $rowfetch['id'] ?>"><?php echo $rowfetch['msg']  ?></a><br>

  <span>Date: &nbsp <?php 
       $gtingdate= $rowfetch['sentnotitime'];


       echo date('y-m-d',strtotime($gtingdate)) ; ?>&nbsp &nbsp Time :   <?php 
       $gtingdatee= $rowfetch['sentnotitime'];


       echo date('H:i A',strtotime($gtingdatee)) ; ?> </span>

       </td>
    </tr><?php } ?>



<?php } else{?>



    <?php 
if($rowfetch['type']=='proposal'){



    ?>

       <tr style="background-color:white;">


       <td> <a href="user_viewproposal.php?nid=<?php  echo $rowfetch['id'] ?>"><?php echo $rowfetch['msg']  ?></a><br>
         <span>Date: &nbsp <?php 
       $gtingdate= $rowfetch['sentnotitime'];


       echo date('y-m-d',strtotime($gtingdate)) ; ?>&nbsp &nbsp Time :   <?php 
       $gtingdatee= $rowfetch['sentnotitime'];


       echo date('H:i A',strtotime($gtingdatee)) ; ?> </span>
       </td>
    </tr><?php 
}else{?>

 <tr style="background-color:white;">


       <td> <a href="user_viewacceptedproject.php?nid=<?php  echo $rowfetch['id'] ?>"><?php echo $rowfetch['msg']  ?></a><br>
         <span>Date: &nbsp <?php 
       $gtingdate= $rowfetch['sentnotitime'];


       echo date('y-m-d',strtotime($gtingdate)) ; ?>&nbsp &nbsp Time :   <?php 
       $gtingdatee= $rowfetch['sentnotitime'];


       echo date('H:i A',strtotime($gtingdatee)) ; ?> </span>
       </td>
    </tr>
<?php } ?>

    <?php



}} ?>

   
        

   
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
