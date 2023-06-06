
<?php 
error_reporting(0);
session_start();


if(!isset($_SESSION['loginuser'])){
  header('location:../adminlogin.php');
}


include '../includes/db.php';

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
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #66023c">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 " href="admindashboard.php">Final Year Project Management System</a>

        </nav>
        <!--header here -->
  
    <?php include"header.php";?>
      <!--content area-->

      <?php 



if(isset($_POST['searchstudent'])){

    $searchdata=$_POST['searchquery'];

//if marks are less than 250 

        $selquery ="select * from students where firstname LIKE '%$searchdata%' OR lastname LIKE 
    '%$searchdata%' OR degree LIKE 
    '%$searchdata%' OR batch LIKE 
    '%$searchdata%'";

    $runsel = mysqli_query($conn,$selquery);

    $countrow=mysqli_num_rows($runsel);

  if($countrow > 0){
     

      ?>



  
<div class="container-fluid" style="margin-top:8%;margin-left:-4%;">
    <div class="row ">
        <div class="col-lg-2"></div>
         <div class="col-lg-1"></div>
        <div class="col-lg-9" style=";">

            <table class="table table-striped custab" style="">
    <thead>
    <a href="#" class="btn  form-control btn-xs pull-right" style="background-color: #66023c;color:white;">Search Student Record Result</a>


    <div class="row" style="margin-top:3%;">
        <form action="searchstudent.php" method="POST">
        <div class="col-lg-10">
           
  <input type="text" class="form-control" placeholder="search by name,degree or batch" style="margin-right:5%;margin-left: 15%; width:70%;" name="searchquery">
            
        </div>
<div class="col-lg-2">
           
  <input type="submit" class="form-control btn btn-primary" placeholder="search by name,degree or batch" value="search" style="margin-left:-100%;" name="searchstudent">
            
        </div>
</form>
    </div><br><br>

     
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Batch</th>
            <th>Degree</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php 


  $i=1;
    while($fetchdata=mysqli_fetch_array($runsel)){
 
        ?>
            <tr>

       
                <td><?php echo $i++;?></td>
        <td><?php echo $fetchdata['firstname'] . " " . $fetchdata['lastname'];?></td>
        <td><?php echo $fetchdata['batch']?></td>
        <td><?php echo $fetchdata['degree']?></td>

      
                <td class="text-center">

                    <a class='btn btn-info btn-xs'
                 href="admin_edit_student.php?id=<?php echo $roww['id'];?>"> Edit</a>

                  <a href="admin_del_student.php?id=<?php echo $roww['id'];?>" class="btn btn-danger btn-xs"> Del</a></td>
            </tr><?php }}else{?>
                              <div class="container-fluid">
  <CENTER>
  <h1 style="color:#41bbe5;margin-top: 150px;font-family: 'Roboto', sans-serif;text-align:center;  ">No Result Found!</h1>

</CENTER>
</div>
                <?php

            }}?>
           
            </tbody>
           
    </table>
        </div>
    
    </div>
</div>
                  
     
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
       
      
    </body>
</html>
