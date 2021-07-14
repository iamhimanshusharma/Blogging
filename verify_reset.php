<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS | Password Reset</title>
<link rel="shortcut icon" href="images/blogs/softos_logo.png">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/css.css">
<link rel="stylesheet" href="../css/swiper.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body onload="star()">
    <video  autoplay loop width="100%" muted  style="position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);" class="w3-hide-small">
    <source src="testone.mp4" type="video/mp4">
    </video>
    <video  autoplay loop width="100%" muted  style="position:absolute;bottom:0;right:0" class="w3-hide-large w3-hide-medium">
    <source src="testone.mp4" type="video/mp4">
    </video>
</body>
<?php
require_once('../dbcon.php');
if(isset($_POST['reset_submit']))
        {
            $reset_email=$_POST['reset_email'];

            $reset_query="SELECT * FROM `signup` WHERE `signup_email`='$reset_email'";
            $reset_run=mysqli_query($con,$reset_query);

            if(0<mysqli_num_rows($reset_run))
            {

    $reset_otp=rand(100000,999999);

require '../phpmailer/PHPMailerAutoload.php';
$mail=new PHPMailer;
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Port=465;
$mail->SMTPAuth=true;
$mail->SMTPSecure='ssl';

$mail->Username='softosinc@gmail.com';
$mail->Password='Him567890@';

$mail->setFrom('no-reply@softos.in','no-reply, SoftOS Inc.');
$mail->addAddress($reset_email);
$mail->addReplyTo('support@softos.in');

$mail->isHTML(true);
$mail->Subject='Do not share';
$mail->Body="
<center><img src='cid:logo' alt='' width='144px'></center>
<br>
<p style='font-size:20px;padding:20px;'>Hi,<br>You have requested for password change! <br>Here is your OTP: <br>
<b>".$reset_otp."</b><br></p><br><ul style='font-size:20px;padding:20px 40px;color:grey'>Password tips: 
<li>Password length should be eight character long.</li>
<li>Password must have at least capital letter.</li>
<li>Password must have at least a small letter.</li>
<li>Password must have at least a digit.</li>
<li>Password must have at least a special symbol.</li></ul><hr><p style='font-size:15px;padding:20px;'>You have any query or concern related softos, please don't hesitate to let us know at: <a href='#'>support@softos.in</a> <br>
<a href='#'>Terms & Conditions</a> </p>";

$mail->send();
setcookie('otp_cookie',$reset_otp);

?>
<div class="w3-container" style="display:block">
<div class="w3-modal" id="reset_password">
<div class="w3-modal-content w3-card-4 w3-animate-right w3-round-large" style="max-width:400px;height:400px">
<div class="w3-center"><br>
<img src="images/blogs/softos2.png" alt="Avatar" style="width:10%;" class="w3-margin-top w3-margin-left">
<h1 >Password Change!</h1>
<form class="w3-container" action="create_password" method="POST">
        <div class="w3-section">
          <label><b>We have sent otp to your email!</b></label>
          <input type="email" style="display:none" name="email_otp" value="<?php echo $reset_email;?>">
          <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="tel" pattern=[0-9]{6} placeholder="Enter OTP" name="reset_otp" required>
          <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit" name="reset_verify_submit">Verify</button>
          </div>
      </form>
<button class="w3-button w3-blue w3-round-xxlarge" onclick="reset_password_cut()" style="width:30%;margin-top:5px">I'll do later</button>
</div>
</div>
</div>
</div>

<script>

function star(){
setTimeout(() => {
  document.getElementById("reset_password").style.display="block";
}, 100);
};

function reset_password_cut(){ 
  document.getElementById('reset_password').style.display='none';
  window.open('login','_self');
}
</script>
<?php

            }
            else
            {
                ?>
                <div class="w3-container">
    <div id="email_error" class="w3-modal" style="display:block">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="width:30%;height:60%">
    <div class="w3-center"><br>
    <img src="images/blogs/softos2.png" alt="Avatar" style="width:20%;" class="w3-margin-top w3-margin-left">
    <h1 >Email is Wrong!</h1>
    <h3>Enter correct Email! <img src="images/blogs/error.png" alt="pass_changed_icon" width="10%"></h3>
    
    <button class="w3-button w3-blue w3-round-xxlarge" onclick="email_error_cut()" style="width:30%;margin-top:5px">Okay!</button>
    <h4>Don't have an account? <a href="signup" class="w3-text-blue">Signup Here!</a></h4>
    </div>
    </div>
    </div>
    </div>


    <script>
    function star(){
setTimeout(() => {
  document.getElementById("email_error").style.display="block";
}, 100);
};

function email_error_cut(){ 
  document.getElementById('email_error').style.display='none';
  window.open('password_reset','_self');
}
    </script>
                <?php
            }
        }
        else
        {
            header('location:login');
        }
?>