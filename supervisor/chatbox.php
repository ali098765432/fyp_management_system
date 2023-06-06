<?php 
//error_reporting(0);

session_start();
if(!isset($_SESSION['loginsup'])){
  header('location:../supervisorlogin.php');
}

include 'db.php';

$getsesval = $_SESSION['loginsup'];
$seluserdetail="select * from supervisor where email ='$getsesval' ";
$runseluserdetail = mysqli_query($conn,$seluserdetail);
$fetchdata=mysqli_fetch_array($runseluserdetail);
$getuseridvalue= $fetchdata['id'];
$getloginusernamevalue= $fetchdata['name'];

 $valofid = $fetchdata['id'];

 $touserup= $_GET['uid'];


 $updatemsgstat="UPDATE msgs SET status='read' 
 WHERE tou='$valofid' AND fromu='$touserup'";
 $updatemsgrun=mysqli_query($conn, $updatemsgstat);

 

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Final Year Project Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.slim.min.js" integrity="sha512-5NqgLBAYtvRsyAzAvEBWhaW+NoB+vARl6QiA02AFMhCWvPpi7RWResDcTGYvQtzsHVCfiUhwvsijP+3ixUk1xw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


     <style type="text/css">
         

         .card-bordered {
    border: 1px solid #ebebeb;
}

.card {
    border: 0;
    border-radius: 0px;
    margin-bottom: 30px;
    -webkit-box-shadow: 0 2px 3px rgba(0,0,0,0.03);
    box-shadow: 0 2px 3px rgba(0,0,0,0.03);
    -webkit-transition: .5s;
    transition: .5s;
}

.padding {
    padding: 3rem !important
}

body {
    background-color: #f9f9fa
}

.card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
}


.card-header {
    display: -webkit-box;
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    align-items: center;
    padding: 15px 20px;
    background-color: transparent;
    border-bottom: 1px solid rgba(77,82,89,0.07);
}

.card-header .card-title {
    padding: 0;
    border: none;
}

h4.card-title {
    font-size: 17px;
}

.card-header>*:last-child {
    margin-right: 0;
}

.card-header>* {
    margin-left: 8px;
    margin-right: 8px;
}

.btn-secondary {
    color: #4d5259 !important;
    background-color: #e4e7ea;
    border-color: #e4e7ea;
    color: #fff;
}

.btn-xs {
    font-size: 11px;
    padding: 2px 8px;
    line-height: 18px;
}
.btn-xs:hover{
    color:#fff !important;
}




.card-title {
    font-family: Roboto,sans-serif;
    font-weight: 300;
    line-height: 1.5;
    margin-bottom: 0;
    padding: 15px 20px;
    border-bottom: 1px solid rgba(77,82,89,0.07);
}


.ps-container {
    position: relative;
}

.ps-container {
    -ms-touch-action: auto;
    touch-action: auto;
    overflow: hidden!important;
    -ms-overflow-style: none;
}

.media-chat {
    padding-right: 64px;
    margin-bottom: 0;
}

.media {
    padding: 16px 12px;
    -webkit-transition: background-color .2s linear;
    transition: background-color .2s linear;
}

.media .avatar {
    flex-shrink: 0;
}

.avatar {
    position: relative;
    display: inline-block;
    width: 36px;
    height: 36px;
    line-height: 36px;
    text-align: center;
    border-radius: 100%;
    background-color: #f5f6f7;
    color: #8b95a5;
    text-transform: uppercase;
}

.media-chat .media-body {
    -webkit-box-flex: initial;
    flex: initial;
    display: table;
}

.media-body {
    min-width: 0;
}

.media-chat .media-body p {
    position: relative;
    padding: 6px 8px;
    margin: 4px 0;
    background-color: #f5f6f7;
    border-radius: 3px;
    font-weight: 100;
    color:#9b9b9b;
}

.media>* {
    margin: 0 8px;
}

.media-chat .media-body p.meta {
    background-color: transparent !important;
    padding: 0;
    opacity: .8;
}

.media-meta-day {
    -webkit-box-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    align-items: center;
    margin-bottom: 0;
    color: #8b95a5;
    opacity: .8;
    font-weight: 400;
}

.media {
    padding: 16px 12px;
    -webkit-transition: background-color .2s linear;
    transition: background-color .2s linear;
}

.media-meta-day::before {
    margin-right: 16px;
}

.media-meta-day::before, .media-meta-day::after {
    content: '';
    -webkit-box-flex: 1;
    flex: 1 1;
    border-top: 1px solid #ebebeb;
}

.media-meta-day::after {
    content: '';
    -webkit-box-flex: 1;
    flex: 1 1;
    border-top: 1px solid #ebebeb;
}

.media-meta-day::after {
    margin-left: 16px;
}

.media-chat.media-chat-reverse {
    padding-right: 12px;
    padding-left: 64px;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: reverse;
    flex-direction: row-reverse;
}

.media-chat {
    padding-right: 64px;
    margin-bottom: 0;
}

.media {
    padding: 16px 12px;
    -webkit-transition: background-color .2s linear;
    transition: background-color .2s linear;
}

.media-chat.media-chat-reverse .media-body p {
    float: right;
    clear: right;
    background-color: #48b0f7;
    color: #fff;
}

.media-chat .media-body p {
    position: relative;
    padding: 6px 8px;
    margin: 4px 0;
    background-color: #f5f6f7;
    border-radius: 3px;
}


.border-light {
    border-color: #f1f2f3 !important;
}

.bt-1 {
    border-top: 1px solid #ebebeb !important;
}

.publisher {
    position: relative;
    display: -webkit-box;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    padding: 12px 20px;
    background-color: #f9fafb;
}

.publisher>*:first-child {
    margin-left: 0;
}

.publisher>* {
    margin: 0 8px;
}

.publisher-input {
    -webkit-box-flex: 1;
    flex-grow: 1;
    border: none;
    outline: none !important;
    background-color: transparent;
}

button, input, optgroup, select, textarea {
    font-family: Roboto,sans-serif;
    font-weight: 300;
}

.publisher-btn {
    background-color: transparent;
    border: none;
    color: #8b95a5;
    font-size: 16px;
    cursor: pointer;
    overflow: -moz-hidden-unscrollable;
    -webkit-transition: .2s linear;
    transition: .2s linear;
}

.file-group {
    position: relative;
    overflow: hidden;
} 

.publisher-btn {
    background-color: transparent;
    border: none;
    color: #cac7c7;
    font-size: 16px;
    cursor: pointer;
    overflow: -moz-hidden-unscrollable;
    -webkit-transition: .2s linear;
    transition: .2s linear;
} 

.file-group input[type="file"] {
    position: absolute;
    opacity: 0;
    z-index: -1; 
    width: 20px;
}

.text-info {
    color: #48b0f7 !important;
}
     </style>
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
<div class="container" style="margin-right:1%;margin-left:11%;margin-top:6%;">
<div class="row justify-content-center">

<div class="col-lg-8">
<div class="card shadow-lg border-1 rounded-lg mt-5">

 <div class="card-header">
                <h4 class="card-title"><strong>Selected Student:<b> <?php echo $_GET['uname'];?></b></strong></h4>
                <a class="btn btn-xs btn-secondary" href="supervisor_chatusers.php" data-abc="true">Back</a>
              </div> 



              <!--body-->  

               <div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height:400px !important;">




<?php 
if(isset($_GET['uid'])){
$touser= $_GET['uid'];
    $chats= "SELECT * FROM msgs where (fromu='$valofid' AND tou='$touser') OR (fromu='$touser' AND tou='$valofid')";

    $runchats= mysqli_query($conn,$chats);}

    else{
        $chats= "SELECT * FROM msgs where (fromu='$valofid' AND tou='$touser') OR (fromu='$touser' AND tou='$valofid')";
    }

    $runchats= mysqli_query($conn,$chats);


    while($chat=mysqli_fetch_array($runchats)){

        if($chat['fromu']==$valofid){


$sendtiming= date('m-d-Y H:i a', strtotime($chat['senddatetime']));

$sndtime= date("m-d-Y h:i a", strtotime($chat['senddatetime']));

if($chat['msg']!=" " && $chat['attachfile']==""){
  echo "<div style='text-align:right'>
        

        <p style='background-color:lightblue;word-wrap:break-word;display:inline-block;padding:5px;border-radius:10px;max-width:70%;'>
".$chat['msg']."<br>  ".$sndtime." </p>

        <span></span>



        </div>";

}


// 2nd condition

elseif($chat['msg']!=" " && $chat['attachfile']!=" "){




   $mediafileext = $chat['attachfile'];

   if(strpos($mediafileext ,".jpg") OR strpos($mediafileext ,".jpeg")  OR strpos($mediafileext ,".png")!== false){
    echo "<a href =".$chat['attachfile']." target='_blank'><div style='text-align:right'>
        
        
        <p style='background-color:lightblue;word-wrap:break-word;display:inline-block;padding:5px;border-radius:10px;max-width:70%;'>

<img src=".$chat['attachfile']." style='width:150px;height:150px;'>

" ."<br>  ".$chat['msg']."<br>  ".$sndtime." </p>

        <span></span>



        </div></a>";
   }


if(strpos($mediafileext ,".doc") OR strpos($mediafileext ,".docx")  OR strpos($mediafileext ,".xlsx") OR strpos($mediafileext ,".xls") OR strpos($mediafileext ,".csv") OR strpos($mediafileext ,".pdf") !== false){






    echo "<a href =".$chat['attachfile']." target='_blank'><div style='text-align:right'>
        
        
        <p style='background-color:lightblue;word-wrap:break-word;display:inline-block;padding:5px;border-radius:10px;max-width:70%;'>

    

<a href =".$chat['attachfile']." target='_blank'>".$chat['attachfilename']." </a>
" ."<br>  ".$chat['msg']."<br>  ".$sndtime."</p>

        <span></span>



        </div></a>";
   }



}


// 3rd condition

else{

//msg is empty but not media
    //msg empty but not media file

    $mediafileext = $chat['attachfile'];


    if(strpos($mediafileext ,".jpg") OR strpos($mediafileext ,".jpeg")  OR strpos($mediafileext ,".png")!== false){
    echo "<a href =".$chat['attachfile']." target='_blank'><div style='text-align:right'>
        
        
        <p style='background-color:lightblue;word-wrap:break-word;display:inline-block;padding:5px;border-radius:10px;max-width:70%;'>

<img src=".$chat['attachfile']." style='width:150px;height:150px;'>

" ."<br>  ".$sndtime." </p>

        <span></span>



        </div></a>";
   }



if(strpos($mediafileext ,".doc") OR strpos($mediafileext ,".docx")  OR strpos($mediafileext ,".xlsx") OR strpos($mediafileext ,".xls") OR strpos($mediafileext ,".csv") OR strpos($mediafileext ,".pdf") !== false){






    echo "<a href =".$chat['attachfile']." target='_blank'><div style='text-align:right'>
        
        
        <p style='background-color:lightblue;word-wrap:break-word;display:inline-block;padding:5px;border-radius:10px;max-width:70%;'>

    

<a href =".$chat['attachfile']." target='_blank'>".$chat['attachfilename']." </a>
" ."<br>  ".$sndtime."</p>

        <span></span>



        </div></a>";
   }


    

   

}






    }

        else{


if($chat['msg']!=" " && $chat['attachfile']==""){
  echo "<div style='text-align:ldap_free_result(result_identifier)'>
        

        <p style='background-color:yellow;word-wrap:break-word;display:inline-block;padding:5px;border-radius:10px;max-width:70%;'>
".$chat['msg']."<br>  ".$sndtime." </p>

        <span></span>



        </div>";

}


elseif($chat['msg']!=" " && $chat['attachfile']!=" "){




   $mediafileext = $chat['attachfile'];

   if(strpos($mediafileext ,".jpg") OR strpos($mediafileext ,".jpeg")  OR strpos($mediafileext ,".png")!== false){
    echo "<a href =".$chat['attachfile']." target='_blank'><div style='text-align:ldap_free_result(result_identifier'>
        
        
        <p style='background-color:yellow;word-wrap:break-word;display:inline-block;padding:5px;border-radius:10px;max-width:70%;'>

<img src=".$chat['attachfile']." style='width:150px;height:150px;'>

" ."<br>  ".$chat['msg']."<br>  ".$sndtime." </p>

        <span></span>



        </div></a>";
   }


if(strpos($mediafileext ,".doc") OR strpos($mediafileext ,".docx")  OR strpos($mediafileext ,".xlsx") OR strpos($mediafileext ,".xls") OR strpos($mediafileext ,".csv") OR strpos($mediafileext ,".pdf") !== false){






    echo "<a href =".$chat['attachfile']." target='_blank'><div style='text-align:ldap_free_result(result_identifier'>
        
        
        <p style='background-color:yellow;word-wrap:break-word;display:inline-block;padding:5px;border-radius:10px;max-width:70%;'>

    

<a href =".$chat['attachfile']." target='_blank'>".$chat['attachfilename']." </a>
" ."<br>  ".$chat['msg']."<br>  ".$sndtime."</p>

        <span></span>



        </div></a>";
   }



}




else{

//msg is empty but not media
    //msg empty but not media file

    $mediafileext = $chat['attachfile'];


    if(strpos($mediafileext ,".jpg") OR strpos($mediafileext ,".jpeg")  OR strpos($mediafileext ,".png")!== false){
    echo "<a href =".$chat['attachfile']." target='_blank'><div style='text-align:ldap_free_result(result_identifier'>
        
        
        <p style='background-color:yellow;word-wrap:break-word;display:inline-block;padding:5px;border-radius:10px;max-width:70%;'>

<img src=".$chat['attachfile']." style='width:150px;height:150px;'>

" ."<br>  ".$sndtime." </p>

        <span></span>



        </div></a>";
   }



if(strpos($mediafileext ,".doc") OR strpos($mediafileext ,".docx")  OR strpos($mediafileext ,".xlsx") OR strpos($mediafileext ,".xls") OR strpos($mediafileext ,".csv") OR strpos($mediafileext ,".pdf") !== false){






    echo "<a href =".$chat['attachfile']." target='_blank'><div style='text-align:ldap_free_result(result_identifier'>
        
        
        <p style='background-color:yellow;word-wrap:break-word;display:inline-block;padding:5px;border-radius:10px;max-width:70%;'>

    

<a href =".$chat['attachfile']." target='_blank'>".$chat['attachfilename']." </a>
" ."<br>  ".$sndtime."</p>

        <span></span>



        </div></a>";
   }


    

   

}




    }


    }




?>


               

              

              

                

              <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div></div></div>


               <div class="publisher bt-1 border-light" style="width:100%;">

                <form method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="uname" value="<?php  echo $_GET['uname']?>">

                       <input type="hidden" id="fromu" value="<?php echo $valofid  ?>"  name="fromu">

    <input type="hidden" id="fromuname" value="<?php echo $getloginusernamevalue  ?>"  name="fromuname">

    <input type="hidden" id="tou" value="<?php echo  $_GET['uid'] ?>" name="tou">

     <input type="hidden" id="touname" value="<?php echo  $_GET['uname'] ?>" name="touname"><br>
            
                <input class="publisher-input" type="text" placeholder="Write message" name="message" 
                style="width:80%;" 
                >
  <label for="fileInput"> 
  <img id="icon" src="data:image/png;base64,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" style="width:30px;height:30px;position:absolute;margin-left:20px;margin-top:-10px;">
</label>



<input id="fileInput" type="file" style="display:none;"
name="chatimgfiles" onchange="getImage(this.value);" 
accept=".jpg,.jpeg,.png,.doc,.docx,.xlsx, .xls, .csv.pdf" 
>

 <span id="displayimg"></span>

 

                <button id="send" type="submit" name="send" class=" btn" style="float:right;margin-left:400px;margin-top:-30px;background-color: #66023c;color:white"> send</button>
                
            <script type="text/javascript">
                  
                  function getImage(imagename){
                    $('#displayimg').html(imagename);
                  }
              </script>
     


              </div>


</form>

                            </div>
                        </div>










                    </div>
                </div>
            </main>
        </div>
      
    </div>



<?php 
if(isset($_POST['send'])){

 $fromu = $_POST['fromu'];
 $tou =$_POST['tou'];
 $message =$_POST['message'];
 $fromuname =$_POST['fromuname'];
$touname =$_POST['touname'];
$uname =$_POST['uname'];



$getimgname =$_FILES['chatimgfiles']['name'];
$getimgtmpname =$_FILES['chatimgfiles']['tmp_name'];



 if($getimgname != ''){

     $folder ="../chatmedia/".$getimgname;


move_uploaded_file($getimgtmpname,"../chatmedia/$getimgname");

$in= "INSERT INTO msgs(fromu,tou,msg,fromuname,
  touname,senddatetime,status,attachfile,attachfilename) VALUES (
 '$fromu','$tou','$message','$fromuname','$touname',NOW(),'unread','$folder','$getimgname')";

 $run=mysqli_query($conn,$in);

 if($run){
    echo "<script> alert('Message Send');</script>";
    echo "<script> window.location=
 '?uname=$uname&uid=$tou'</script>";
     
 }else{
        echo "<script> alert('Message Not Send,Try Again');</script>";
    

 }



}


else{
$in= "INSERT INTO msgs(fromu,tou,msg,fromuname,
  touname,senddatetime,status) VALUES (
 '$fromu','$tou','$message','$fromuname','$touname',NOW(),'unread')";

 $run=mysqli_query($conn,$in);

 if($run){
    echo "<script> alert('Message Send');</script>";
    echo "<script> window.location=
 '?uname=$uname&uid=$tou'</script>";
     
 }else{
        echo "<script> alert('Message Not Send,Try Again');</script>";
    

 }

}

}
?>


   
          

         



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
