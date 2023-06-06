<?php 
error_reporting(0);
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
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:#66023c">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 " href="userdashboard.php">Final Year Project Management System</a>
           
          
          
        </nav>
        <!--header here -->
      <?php include"header.php";?>
     <div class="container" style="margin-top:5%;">
         <div class="row">
             <div class="col-lg-2"></div>
             <div class="col-lg-10">
                   <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">User Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-lg-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Propsal</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="">View Details</a>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Submission</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="">View Details</a>
                                      
                                    </div>
                                </div>
                            </div>
                          
                           
                        </div>
                        
                    
                    </div>
                </main>
              
            </div>
             </div>
      

         </div>
     </div>
     

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
