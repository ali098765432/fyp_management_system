<?php 
error_reporting(0);
?>
<?php
include 'db.php';
$gettingid = $_GET['pid'];
$gettinguid = $_GET['uid'];

if(isset($_GET['pid'])){

	$query="update proposalfiles set status='Rejected' where id='$gettingid '";
    $run=mysqli_query($conn,$query);

    if($run){
    	 echo "<script> alert('Status Updated Successfully')</script>";


    	 $innoti = "INSERT INTO notification(msg,userid,sentnotitime,status,type) VALUES ('Your Proposal has been accepted by supervisor check it out','$gettinguid',Now(),'unread','proposal')";

    	 $runnotiin = mysqli_query($conn,$innoti);
 echo "<script> window.location=
 'supervisor_viewsubmitproposalreport.php'</script>";
    	
    }

    else{
    	 echo "<script> alert('Status Not  Updated, Try Again')</script>";
 echo "<script> window.location=
 'supervisor_viewsubmitproposalreport.php'</script>";
    }


}




?>