 <?php 

include 'db.php';

$getsesval = $_SESSION['loginsup'];
$seluserdetail="select * from supervisor where email ='$getsesval' ";
$runseluserdetail = mysqli_query($conn,$seluserdetail);
$fetchdata=mysqli_fetch_array($runseluserdetail);
$getuseridvalue= $fetchdata['id'];

//fetching login user msgs notification

$seluserdetailmsg="select * from msgs where tou ='$getuseridvalue' AND status='unread'";
$runseluserdetailmsg = mysqli_query($conn,$seluserdetailmsg);


?>


  <div id="layoutSidenav"> <div id="layoutSidenav_nav"> <nav class="sb-sidenav
  accordion sb-sidenav-dark" id="sidenavAccordion"> <div
  class="sb-sidenav-menu"> <div class="nav">
                           
                            <a class="nav-link" href="supervisordashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas
                            fa-tachometer-alt"></i></div> Dashboard </a>

                            <!--user one here--> <a class="nav-link collapsed"
                            href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayoutsuser"
                            aria-expanded="false"
                            aria-controls="collapseLayouts"> <div
                            class="sb-nav-link-icon"><i class="fa fa-book" aria-hidden="true"></i></div> Proposals <div
                            class="sb-sidenav-collapse-arrow"><i class="fas
                            fa-angle-down"></i></div> </a> <div
                            class="collapse" id="collapseLayoutsuser"
                            aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion"> <nav
                            class="sb-sidenav-menu-nested nav"> <a
                            class="nav-link" href="supervisor_viewsubmitproposalreport.php">View Submitted Proposals</a>
                                   
                                </nav> </div>

                           <!--1st--> <a class="nav-link collapsed" href="#"
                           data-bs-toggle="collapse"
                           data-bs-target="#collapseLayouts"
                           aria-expanded="false"
                           aria-controls="collapseLayouts"> <div
                           class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div> Accepted Proposal Student <div
                           class="sb-sidenav-collapse-arrow"><i class="fas
                           fa-angle-down"></i></div> </a> <div
                           class="collapse" id="collapseLayouts"
                           aria-labelledby="headingOne"
                           data-bs-parent="#sidenavAccordion"> <nav
                           class="sb-sidenav-menu-nested nav"> <a
                           class="nav-link"
                           href="admin_supervisoraddsubmissionschedule.php">Add Submission Schedule</a>

                       <!--<a
                           class="nav-link"
                           href="supervisor_viewcompletesubmissionofsingleuser.php">View Submissions </a>-->

                          </nav> </div>


                        <a class="nav-link" href="supervisor_chatusers.php"> <div
                            class="sb-nav-link-icon"><i class='fas fa-comment-dots'></i></div> Chat

                            <?php

   if(mysqli_num_rows($runseluserdetailmsg)>0){
    ?>&nbsp

    <span class="badge badge-success">New</span>

    <?php
   }



                             ?> 

                          </a>


                             <a class="nav-link" href="supervisor_notifications.php"> <div
                            class="sb-nav-link-icon"><i class="fas fa-bell"></i></div> Notification </a>


                            <a class="nav-link" href="supervisor_profile.php"> <div
                            class="sb-nav-link-icon"><i class="fas fa-user"></i></div>Profile </a>
                        
                            <a class="nav-link" href="supervisor_logout.php"> <div
                            class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div> Sign out </a>
                         
                        </div> </div>




            





                    <div class="sb-sidenav-footer" style="background-color: #66023c;color: white;">
                        
                        Final Year Project Management System </div> </nav>
</div>
           

                                          
                                        
          
            </div> </div>