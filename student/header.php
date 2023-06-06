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


$seluserdetailmsg="select * from msgs where tou ='$getuseridvalue' AND status='unread'";
$runseluserdetailmsg = mysqli_query($conn,$seluserdetailmsg);
?>


  <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                           
                            <a class="nav-link" href="">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <!--user one here-->
                              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsuser" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                               Proposal
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutsuser" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="user_addproposal.php">Add Proposal</a>
                                    <a class="nav-link" href="user_viewproposal.php">View Proposal Status</a>
                                   
                                </nav>
                            </div>

                           <!--1st-->
      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
        <div class="sb-nav-link-icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                                Project
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                    <a class="nav-link" href="user_viewacceptedproject.php">Project Assignment</a>
                                    
                                  
                                </nav>
                            </div>

                               <!--4rd Menu-->

                                  <a class="nav-link" href="chatbox.php" style="font-size:15px;">
                                <div class="sb-nav-link-icon"><i class='fas fa-comment-dots'></i></div>
                                Chat with supervisor

                                 <?php

   if(mysqli_num_rows($runseluserdetailmsg)>0){
    ?>&nbsp

    <span class="badge badge-success"><?php echo mysqli_num_rows($runseluserdetailmsg) ?></span>

    <?php
   }



                             ?> 
                            </a>

                           

                         


                            <!--3rd menu-->
                             <a class="nav-link collapsed" 
              href="student_viewnotification.php" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsaccounts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                                Notification &nbsp 
   <?php 

$selallquestion ="SELECT * FROM notification WHERE status='unread' AND userid='$getuseridvalue'";

$run = mysqli_query($conn,$selallquestion);

$numofrows = mysqli_num_rows($run);

if($numofrows>0){


   ?>

<span class="badge badge-primary" style="border-radius:50%;"><?php echo $numofrows; ?></span>

<?php } ?>


                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                              <div class="collapse" id="collapseLayoutsaccounts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
 <a class="nav-link" href="student_viewnotification.php">View Notification</a>
                                   
                                   
                                  
                                </nav>
                            </div>


<!--report weekly-->

<?php 
$electingreport = "SELECT * FROM proposalfiles WHERE uid='$getuseridvalue' AND status='Accepted' ";
$runingelecting = mysqli_query($conn,$electingreport);

$numofelecting=mysqli_num_rows($runingelecting);

if($numofelecting>0){

?>



<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsuserreport" aria-expanded="false" aria-controls="collapseLayouts">
<div class="sb-nav-link-icon"><i class="fas fa-spinner"></i></div>Weekly Report
        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
             </a>
        <div class="collapse" id="collapseLayoutsuserreport" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
             <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="user_weeklyprogress.php">Add Weekly Progress</a>
                                    <a class="nav-link" href="user_viewprogress.php">View Weekly Progress</a>
                                   
                                </nav>
                            </div>


<?php } ?>

                              <a class="nav-link" href="user_Profile.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Profile
                            </a>
                         
                        
                            <a class="nav-link" href="user_signout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                Sign out
                            </a>
                         
                        </div>
                    </div>




            





                    <div class="sb-sidenav-footer"style="
                    background-color: #66023c;color:white;">
                        
                        Final Year Project Management System
                    </div>
                </nav>
            </div>
           

                                          
                                        
          
            </div>
        </div>