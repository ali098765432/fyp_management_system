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





if(isset($_POST['loginstudentreset'])){

	$getemail = $_POST['stdemail'];
	$rand_refno = rand(1000000,9999999);

	 $sel="SELECT * FROM students WHERE 
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
    $mail->addAddress($_POST['stdemail'],'LMS Password Reset');     //Add a recipient
//$_POST['email']
    //Content
    $mail->isHTML(true);

                                   //Set email format to HTML
    $mail->Subject = 'LMS New  password';
    $mail->Body="Your New Lms Password:". $rand_refno;


    try{
$mail->send();


$query="UPDATE students SET 
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


