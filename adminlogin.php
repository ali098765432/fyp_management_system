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
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">


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
 <div class="col-lg-5"  style="margin-top:6%;">
 <div class="card shadow-lg border-0 rounded-lg mt-5">
 <div class="card-header"><h3 class="text-center font-weight-light my-4">Admin Login</h3></div>
<div class="card-body">
   <form method="POST" action="upload_logadmin.php">
  <div class="form-floating mb-3">
    <label for="inputEmail">Admin Email</label>
    <input class="form-control"  type="Email" placeholder="email" name="adminemail"  required />
                                               
      </div>
   <div class="form-floating mb-3">
<label for="inputPassword">Admin Password</label>
     <input class="form-control"  type="password" placeholder="Password" name="adminpassword" required  id="pass"/>
  </div>

  <i class="bi bi-eye" id="passeye" style="float:right;
 margin-top:-11%;margin-right:2%;position: relative;font-size:15px;" onclick="toggle()"></i>



 
<script type="text/javascript">
  var state = false;
  function toggle(){
    if(state){
      document.getElementById("pass").setAttribute("type","password");

      document.getElementById("passeye").style.color='#66023c';
      state=false;
    }
    else{
      document.getElementById("pass").setAttribute("type","text");
      document.getElementById("passeye").style.color='black';
      state=true;

    }
  }
</script>


<div class="d-flex align-items-center justify-content-between mb-0 float-right">
       <a class="" href="adpasswordreset.php" style="color:#66023c;margin-top:-1%;">Forget Password?</a>
   
                                              
                                            </div>

                                            <br>



     <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
       <a class="" href="index.php" style="color: #66023c">back</a>
    <input type="submit" name="loginadmin" value="login" class="btn" style="background-color: #66023c;color: white;">
                                              
                                            </div>
                                        </form><br>

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