<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS | Email Verification</title>
<link rel="shortcut icon" href="images/admin/softos_logo.png">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/css.css">
<link rel="stylesheet" href="css/swiper.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body onload="star()">
    <!-- <video  autoplay loop width="100%" muted  style="position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);" class="w3-hide-small">
    <source src="testone.mp4" type="video/mp4">
    </video>
    <video  autoplay loop width="100%" muted  style="position:absolute;bottom:0;right:0" class="w3-hide-large w3-hide-medium">
    <source src="testone.mp4" type="video/mp4">
    </video> -->
</body>
<?php

require_once('../session.php');
include('../dbcon.php');


$login_photo = $_SESSION['ssid'];

$login_photo_query="SELECT * FROM `signup_photo` WHERE `photo_id`='$login_photo'";
$login_photo_run=mysqli_query($con,$login_photo_query);

$login_photo_data=mysqli_fetch_assoc($login_photo_run);


?>


<?php
if(isset($_POST['send_otpp']))
{
    $signup=$_SESSION['ssid'];
    $dashboard="SELECT * FROM `signup` WHERE `signup_id`='$signup'";
    $dashboard_run=mysqli_query($con,$dashboard);
    
    $dashboard_data=mysqli_fetch_assoc($dashboard_run);
    

$email=$dashboard_data['signup_email'];

$otp=rand(10000,20000);

require 'phpmailer/PHPMailerAutoload.php';
$mail=new PHPMailer;
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Port=465;
$mail->SMTPAuth=true;
$mail->SMTPSecure='ssl';

$mail->Username='softosinc@gmail.com';
$mail->Password='Him567890@';

$mail->setFrom('no-reply@softos.in','no-reply, SoftOS Inc.');
$mail->addAddress($email);
$mail->addReplyTo('support@softos.in');

$mail->isHTML(true);
$mail->Subject='Do not share';
$mail->Body="<center><img src='cid:logo' alt='' width='144px'></center>
<hr>
<br>
<p style='font-size:20px;padding:20px;'>Hi,<br>You have requested for email verification.<br>Here is your OTP: <br>
<b>".$otp."</b><br></p><br><hr><p style='font-size:20px;padding:20px;'>You have any query or concern related softos, please don't hesitate to let us know at: <a href='#'>support@softos.in</a> <br>
<a href='#'>Terms & Conditions</a> </p>";
$mail->addEmbeddedImage('images/admin/softos2.png','logo');
$mail->send();
setcookie('otp',$otp);
}
else
{
    header('location:dashboard');
}

?>


<div class="w3-container">
<div class="w3-modal" id="otpcutt"  style="display:block">
<div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="max-width:400px;height:80%">
<div class="w3-center"><br>
<img src="images/admin/softos.png" alt="Avatar" style="width:10%;" class="w3-margin-top w3-margin-left">
<h1 >Welcome to SoftOS!</h1>
<form class="w3-container" action="functions" method="POST">
        <div class="w3-section">
          <label><b>OTP has been send to your email!</b></label>
          <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="tel" pattern=[0-9]{5} placeholder="Enter OTP" name="otp" required>
          <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit" name="overify">Verify</button>
          </div>
      </form>
<button class="w3-button w3-blue w3-round-xxlarge" onclick="otp_cutt()" style="width:30%;margin-top:5px">I'll do later</button>
</div>
</div>
</div>
</div>

<script>


function star(){
setTimeout(() => {
  document.getElementById("otpcutt").style.display="block";
}, 100);
};

function otp_cutt(){ 
  document.getElementById('otpcutt').style.display='none';
  window.open('dashboard','_self');
}



</script>