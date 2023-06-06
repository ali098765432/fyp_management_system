<?php 
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Final Year Project Management System</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="index.css">


</head>
 <body style="background-image:url('bg.jpg');background-size:cover;">
 	<div class="row">
  <div class="col-lg-12 col-md-12">
     <center>
      <nav class="navbar" style="background-color:#66023c" >
       
  <a class="navbar-brand" href="index.php" style="margin-left:33% !important;">
    <img src="logo.png" width="50" height="50" class="d-inline-block align-top" alt="" style="background-color:white;">&nbsp &nbsp
    <b style="color:white;margin-top:10px;line-height:auto;">Final Year Project Management System</b>
  </a>
</nav></center>
    
  </div>
</div>

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">User Login</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                            	 <label for="inputEmail">Username</label>
                                                <input class="form-control" id="inputEmail" type="text" placeholder="username" name="adminname"  required />
                                               
                                            </div>
                                            <div class="form-floating mb-3">
                                            	<label for="inputPassword">Password</label>
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="adminpassword" required />
                                                
                                            </div>
                                          
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="" href="index.php">Admin login</a>
                                                <input type="submit" name="loginadmin" value="login" class="btn btn-primary">
                                              
                                            </div>
                                        </form>
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
    </body>
</html>