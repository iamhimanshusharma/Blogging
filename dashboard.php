<?php

require_once('session.php');
require_once('blogs_dbcon.php');
// include('../dbcon.php');


$login_photo = $_SESSION['ssid'];

$login_photo_query="SELECT * FROM `signup_photo` WHERE `photo_id`='$login_photo'";
$login_photo_run=mysqli_query($blogs_con,$login_photo_query);

$login_photo_data=mysqli_fetch_assoc($login_photo_run);


?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS | Dashboard</title>
<link rel="shortcut icon" href="images/blogs/softos_logo.png">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body onload="star()">


<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right w3-margin-top" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <img src="images/blogs/blogs_logo1.png" class="w3-left w3-margin-left" alt="" width="144px" height="81px">
    <?php 
    if($login_photo_data['photo'])
    {
      ?><a><img src="images/signup/<?php echo $login_photo_data['photo'];?>" alt="login" width="50px" height="50px" class="w3-margin-top w3-circle w3-right w3-margin-right w3-border w3-hover-opacity"></a><?php
    }
    else
    {
      ?><a><img src="images/blogs/signup_profile.jpg" alt="login" width="50px" height="50px" class="w3-margin-top w3-circle w3-right w3-margin-right w3-border w3-hover-opacity"></a><?php
    }
    ?>
    
      <a href="index" class="w3-bar-item w3-button w3-hide-small w3-hover-white  w3-round-large w3-hover-shadow  w3-right w3-margin-top w3-text-grey w3-margin-right"><i class="fa fa-home"></i> HOME</a>
  </div>
 
  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium"> 
  <a href="index" class="w3-bar-item w3-button w3-text-grey w3-hover-grey w3-round-large" onclick="toggleFunction()"><i class="fa fa-home"></i> HOME</a>
    </div>
</div>
<br>
<br>
<hr style="margin:40px 0 0 0">


<?php  
require_once('session.php');
// include('../dbcon.php');

if(isset($_SESSION['ssid']))
{
  $signup=$_SESSION['ssid'];
    $dashboard="SELECT * FROM `signup` WHERE `signup_id`='$signup'";
    $dashboard_run=mysqli_query($blogs_con,$dashboard);
    
    $dashboard_data=mysqli_fetch_assoc($dashboard_run);
      
}
else
{
  header('location:login');     
}

?>

<?php
$signup=$_SESSION['ssid'];
$dashboard="SELECT * FROM `signup_photo` WHERE `photo_id`='$signup'";
$dashboard_run=mysqli_query($blogs_con,$dashboard);

$dashboard_data=mysqli_fetch_assoc($dashboard_run);
?>

<?php if(!$dashboard_data['photo'])
{
  ?>

  <div class="w3-center"><br>
  <div class="w3-center"><br>
  <a class="w3-button w3-green w3-round-xxlarge w3-left w3-margin" href="blogs_create" style="width:150px;margin-top:5px">+Create</a>
  <a class="w3-button w3-blue w3-round-xxlarge w3-right w3-margin" href="logout" style="width:150px;margin-top:5px">Logout</a>
  <div class="w3-container" id="menu">
  <div class="w3-content w3-large" style="max-width:100%">
    <div class="w3-row w3-center w3-card w3-padding">   
<div>
 <img src="images/blogs/signup_profile.jpg" alt="login_logo" style="width:270px;height:270px" class="w3-margin-top w3-circle">
        
 </div>

        <div>
        <img src="images/blogs/edit.png" alt="edit_logo" onclick="hide_button()" id="hide_button" style="display:block;width:50px;height:50px" class="w3-margin-top w3-right w3-margin-right w3-hover-shadow w3-circle">
        </div>
        
       
<div class="w3-container">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom   w3-margin-top  w3-margin-bottom" style="max-width:270px">
    <button class="w3-button w3-block w3-right w3-half w3-red w3-section w3-padding" onclick="show_button()" id="show_button" style="display:none">Cancel</button>

      <form  id="show_form" style="display:none" class="w3-container" action="blogs_functions.php" method="POST"  enctype="multipart/form-data">
        <div class="w3-section">
        <h5 class="w3-center w3-text-grey">Change Profile Picture</Picture></h5>
          <input type="file" class="w3-input w3-border w3-round-large" name="photo_img" id="choose_real" style="display:none">
          <img src="images/blogs/choose.png" alt="choose_logo" id="choose_fake" style="width:200px;height:200px;cursor:pointer" class="w3-opacity-min w3-hover-opacity-off">
          <img src="images/blogs/choose.png" alt="choose_logo" id="just_fake" style="display:none;width:200px;height:200px;" >
        <input type="submit" value="Set Your Picture" class="w3-button w3-block w3-blue w3-section w3-padding" name="photo_submit" id="btn"/>
        </form>

</div>
      
    </div>
  </div>
  <?php
}
else
{
    ?>

  <div class="w3-center"><br>
  <div class="w3-center"><br>
  <a class="w3-button w3-green w3-round-xxlarge w3-left w3-margin" href="blogs_create" style="width:150px;margin-top:5px">+Create</a>
  <a class="w3-button w3-blue w3-round-xxlarge w3-right w3-margin" href="logout" style="width:150px;margin-top:5px">Logout</a>
  <div class="w3-container" id="menu">
  <div class="w3-content w3-large" style="max-width:100%">
    <div class="w3-row w3-center w3-card w3-padding">   
 <div>
 <img src="images/signup/<?php echo $dashboard_data['photo'];?>" alt="login_logo" style="width:270px;height:270px" class="w3-margin-top w3-circle">
        
 </div>

        <div>
        <img src="images/blogs/edit.png" alt="edit_logo" onclick="hide_button()" id="hide_button" style="display:block;width:50px;height:50px" class="w3-margin-top w3-right w3-hover-shadow w3-circle">
        </div>
        
       
<div class="w3-container">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom   w3-margin-top  w3-margin-bottom" style="max-width:270px">
    <button class="w3-button w3-block w3-right w3-half w3-red w3-section w3-padding" onclick="show_button()" id="show_button" style="display:none">Cancel</button>

      <form  id="show_form" style="display:none" class="w3-container" action="blogs_functions.php" method="POST"  enctype="multipart/form-data">
        <div class="w3-section">
        <h5 class="w3-center w3-text-grey">Change Profile Picture</Picture></h5>
          <input type="file" class="w3-input w3-border w3-round-large" name="photo_img" id="choose_real" style="display:none">
          <img src="images/blogs/choose.png" alt="choose_logo" id="choose_fake" style="width:200px;height:200px;cursor:pointer" class="w3-opacity-min w3-hover-opacity-off">
          <img src="images/blogs/choose.png" alt="choose_logo" id="just_fake" style="display:none;width:200px;height:200px;" >
        <input type="submit" value="Change Your Picture" class="w3-button w3-block w3-blue w3-section w3-padding" name="photo_update" id="btn"/>
        </form>

</div>
    </div>
  </div>
  <?php
}
$signup=$_SESSION['ssid'];
    $dashboard="SELECT * FROM `signup` WHERE `signup_id`='$signup'";
    $dashboard_run=mysqli_query($blogs_con,$dashboard);
    $dashboard_data=mysqli_fetch_assoc($dashboard_run);


$pub_query="SELECT * FROM `blogs` WHERE `author_id`='$signup'";
$pub_run=mysqli_query($blogs_con,$pub_query);
$total_article=mysqli_num_rows($pub_run);

$fg_query="SELECT * FROM `follower_following` WHERE `following_id`='$signup'";
$fg_run=mysqli_query($blogs_con,$fg_query);
$fg_total=mysqli_num_rows($fg_run);

$fr_query="SELECT * FROM `follower_following` WHERE `follower_id`='$signup'";
$fr_run=mysqli_query($blogs_con,$fr_query);
$fr_total=mysqli_num_rows($fr_run);

?>


<div class="w3-container">
<h2><?php echo $dashboard_data['signup_first_name']." ".$dashboard_data['signup_last_name'];?></h2>
<div >
<div style="display:inline-block" class="w3-margin-right w3-hover-shadow"><a href="followings" style="text-decoration:none;"><h3>Followers</h3>
<h4><?php echo $fr_total; ?></h4></a>
</div>
<div style="display:inline-block" class="w3-margin-left  w3-hover-shadow"><a href="followers" style="text-decoration:none"><h3>Following</h3>
<h4><?php echo $fg_total; ?></h4></a>
</div>
<div style="display:inline-block" class="w3-margin-left  w3-hover-shadow"><a href="published_article" style="text-decoration:none"><h3>Published Article</h3>
<h4><?php echo $total_article;?></h4></a>
</div>
</div>
<input type="website" placeholder="Website" class="w3-input">
<input type="text" placeholder="Bio" class="w3-input">
<?php if($dashboard_data['status']=="verified") {?>
<h4><?php echo $dashboard_data['signup_email']." <h3 style='color:green'>(".$dashboard_data['status'].") <img src='images/blogs/verified.png' alt='verified_logo' style='width:20px;height:20px' class='w3-circle'></h3>
";?>
</h4>
<?php
}
else{
?><h4><?php echo $dashboard_data['signup_email']." <h4 style='color:red'>(".$dashboard_data['status'].")</h4>";?></h4>
<div class="w3-container">
<div class="w3-modal"   id="verify_otp" >
<div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="max-width:400px;height:60%">
<div class="w3-center"><br>
<img src="images/blogs/softos.png" alt="Avatar" style="width:10%;" class="w3-margin-top w3-margin-left">
<h1 >Welcome to SoftOS!</h1>
<form action="email-verification.php" method="post">
<button type="submit" class="w3-button w3-blue w3-round-xxlarge" name="send_otpp"style="width:40%;margin-top:5px">Send OTP</button>
</form>
<button class="w3-button w3-blue w3-round-xxlarge" onclick="otp_cut()" style="width:40%;margin-top:5px">I'll do later</button>
</div>
</div>
</div>
</div>
<button class="w3-button w3-red w3-round-xxlarge" onclick="otp_show()" style="width:150px;margin-top:5px">Verify</button>
<?php
}
?>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
function hide_button(){
    document.getElementById('show_form').style.display='block';
    document.getElementById('hide_button').style.display='none';
    document.getElementById('show_button').style.display='block';

}
function show_button(){
    document.getElementById('show_form').style.display='none';
    document.getElementById('hide_button').style.display='block';
    document.getElementById('show_button').style.display='none';

}

var choose_fa=document.getElementById('choose_fake');
var choose_re=document.getElementById('choose_real');
var just_fa=document.getElementById('just_fake');

choose_fa.addEventListener("click",function(){

    choose_re.click();

});


function otp_show(){ 
  document.getElementById('verify_otp').style.display='block';
}

function otp_cut(){ 
  document.getElementById('verify_otp').style.display='none';
}

</script>



<?php include('blogs_footer.php'); ?>