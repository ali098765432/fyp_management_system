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
 <div class="card-header"><h3 class="text-center font-weight-light my-4">Admin Password Reset</h3></div>
<div class="card-body">
   <form method="POST">
  <div class="form-floating mb-3">
    <label for="inputEmail">Admin Email</label>
    <input class="form-control"  type="Email" placeholder="email" name="adminemail"  required />
                                               
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






     <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
       <a class="" href="index.php" style="color: #66023c">back</a>
    <input type="submit" name="loginadminreset" value="Send Reset password Email" class="btn" style="background-color: #66023c;color: white;">
                                              
                                            </div>
                                        </form><br>
<div class="text-center">
<span>Dont Have An Account? <a href="adminregister.php" style="color: #66023c">Register Here</a></span> </div>
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


<?php 
session_start();
//error_reporting(0);
include 'includes/db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';





if(isset($_POST['loginadminreset'])){

  $getemail = $_POST['adminemail'];
  $rand_refno = rand(1000000,9999999);

   $sel="SELECT * FROM admin WHERE 
 email='$getemail'";
 $running=mysqli_query($conn,$sel);
 $check=mysqli_num_rows($running);
 if($check==1){




    $mail = new PHPMailer(true);

     $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;


    /// jis account se email send krna chahte hain                                    //Enable SMTP authentication
    $mail->Username   = 'awaisiftikhar9063@gmail.com';                     //SMTP username
    $mail->Password   = 'peeisiutjlpuuagr';                               //SMTP password
     $mail->SMTPSecure = 'ssl';  
  //  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


      //Recipients
    //from jis email se mail send krna chahte hain 
   // $mail->setFrom( $_POST['email']);
       $mail->setFrom('awaisiftikhar9063@gmail.com','LMS Password Reset');
      //Add a recipient
       // jis ko mail send krni hai 
    $mail->addAddress($_POST['adminemail'],'LMS Password Reset');     //Add a recipient
//$_POST['email']
    //Content
    $mail->isHTML(true);

                                   //Set email format to HTML
    $mail->Subject = 'LMS New  password';
    $mail->Body="Admin Your New Lms Password:". $rand_refno;


    try{
$mail->send();


$query="UPDATE admin SET 
password='$rand_refno' WHERE  email='$getemail'";

    $run=mysqli_query($conn,$query);

    if($run){
        echo "
    <script>alert('Email Sent Successfully,For Password Reset') </script>";



}
     



    }
 catch (Exception $e) {
     echo "
    <script>alert('Email could not be sent, Try Again') </script>";


}
   
  
    
}else{
   echo "
    <script>alert('Invalid Email, No Account Found') </script>";
}
   



}




?>


