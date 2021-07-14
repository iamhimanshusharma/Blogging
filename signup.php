<?php 
session_start();
if(isset($_SESSION['ssid']))
{
  ?>
  <!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS</title>
<link rel="shortcut icon" href="images/blogs/softos_logo.png">
<?php
  include('blogs_header.php');
}
else
{
  ?>
  <!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS | Signup</title>
<link rel="shortcut icon" href="images/blogs/softos_logo.png">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
  // include('header.php');
}
?>


<?php


if(isset($_SESSION['ssid']))
{
  header('location:dashboard.php');
}
?>

<!-- sign up start -->

<div class="w3-container">
    <div class="w3-modal-content w3-border  w3-animate-zoom w3-round-large " style="max-width:450px;margin-top:30px">
  
      <div class="w3-center"><br>
        <a href="."><img src="images/blogs/softos2.png" alt="Avatar" style="width:20%" class="w3-margin-top"></a>
      </div>

      <form class="w3-container" action="blogs_functions.php" method="POST"  onsubmit="return chkpwd()">
        <div class="w3-section">
        <label><b>First Name</b></label>
          <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="text" placeholder="Enter First Name" name="signup_first_name" required>
          <label><b>Last Name</b></label>
          <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="text" placeholder="Enter Last Name" name="signup_last_name" required>
          <label><b>Email</b></label>
          <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="email" placeholder="Enter Email" name="signup_email" required>
          <label><b>Password</b></label>
          <div class='w3-row'>
          <div class="w3-col s10">
          <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="password" placeholder="Enter Password" id="validation" name="signup_password" required>
          </div>
          <div class="w3-col s2">
          <img src="images/admin/show_password.png" alt="" id="myimg" width="30px" height="30px" class="w3-right" onclick="toggle_password()">
          </div>
          </div>
          <p id="valid_message"></p>
          <input class="w3-button w3-block w3-blue w3-section w3-padding" type="submit" name="signup_submit" onclick="chkpwd()" value="Sign Up">
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-white w3-round-large">
      <span class="w3-left w3-padding w3-text-grey">Already have an account?</span>
        <button type="button" onclick="window.open('login','_self')" class="w3-round-large w3-button w3-blue">Log In</button>
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
<!-- Sign up end -->



<script>
function chkpwd(){

  var valid=document.getElementById('validation').value;
var valid_message=document.getElementById('valid_message');

if(valid.length==0)
{
  valid_message.innerHTML="Enter password!";
  valid_message.style.color="red";
  return false;
}else if(valid.length<8)
{
  valid_message.innerHTML="Password is too sort!";
  valid_message.style.color="red";
  return false;
}else if(valid.search(/[0-9]/)==-1)
{
  valid_message.innerHTML="Password must have numbers!";
  valid_message.style.color="red";
  return false;
}
else if(valid.search(/[a-z]/)==-1)
{
  valid_message.innerHTML="Password must have alphabets!";
  valid_message.style.color="red";
  return false;
}
else if(valid.search(/[A-Z]/)==-1)
{
  valid_message.innerHTML="Password must have capital alphabets!";
  valid_message.style.color="red";
  return false;
}
else if(valid.search(/[!\@\#\$\%\^\&\(\)\_\+\.\,\:\;]/)==-1)
{
  valid_message.innerHTML="Password must have special symbols!";
  valid_message.style.color="red";
  return false;
}
else
{
return true;
}
}


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