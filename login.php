<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS | Login</title>
<link rel="shortcut icon" href="images/blogs/softos_logo.png">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
session_start();
if(isset($_SESSION['ssid']))
{
  header('location:dashboard');
}
?>

<!-- login start -->
<div class="w3-container">
    <div class="w3-modal-content w3-border w3-animate-zoom w3-round-large" style="width:400px;margin-top:100px">
  
      <div class="w3-center"><br>
      <a href="."><img src="images/blogs/softos2.png" alt="login_logo" style="width:20%" class="w3-margin-top"></a>
      </div>

      <form class="w3-container" action="blogs_functions" method="POST">
        <div class="w3-section">
          <label><b>Enter Email</b></label>
          <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="email" placeholder="Enter Email" name="login_email" required>
          <label><b>Password</b></label>
          <div class='w3-row'>
          <div class="w3-col s10">
          <input class="w3-input w3-border w3-round-large" type="password" placeholder="Enter Password" id="validation" name="login_password" required>
          </div>
          <div class="w3-col s2">
          <img src="images/blogs/show_password.png" alt="" id="myimg" width="30px" height="30px" class="w3-right" onclick="toggle_password()">
          </div>
          </div>
          <button class="w3-button w3-block w3-blue w3-section w3-padding" type="submit" name="login_submit">Login</button>
          </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-round-large w3-white">
      <span class="w3-left w3-padding w3-text-grey">Don't have an account?</span>
      <a class="w3-blue w3-button w3-round-large" href="signup">Sign Up</a>
        <span class="w3-left w3-padding w3-text-grey">Forgot Password? <a href="password_reset" class="w3-hover-text-pink" style="color:blue;text-decoration:none;font-size:18px">Change password</a></span>
      </div>

    </div>
  </div>
  <hr>
<div class="w3-text-grey w3-center" style="font-size:14px;margin:10px 40px">
<a href="#"  style="text-decoration:none" class="w3-margin-left">Terms & Conditions</a>
<a href="#"  style="text-decoration:none" class="w3-margin-left">Privacy Policy</a>
<a href="#"  style="text-decoration:none" class="w3-margin-left">Language</a>
<a href="about"  style="text-decoration:none" class="w3-margin-left">About</a>
</div>
<!-- login end -->

<script>
function toggle_password(){
  var valider=document.getElementById('validation');
  if(valider.type=='password'){
    valider.type='text';
    document.getElementById("myimg").src = "images/blogs/hide_password.png";
  }
  else{
    valider.type='password';
    document.getElementById("myimg").src = "images/blogs/show_password.png";
  }
}

</script>
<?php// include('footer.php');?>