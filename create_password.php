<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS | Create Password</title>
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
if(isset($_POST['reset_verify_submit']))
      {
          $req_email=$_POST['email_otp'];
          $reset=$_POST['reset_otp'];

          if($_COOKIE['otp_cookie']==$reset)
          {
              ?>
            <div class="w3-container">
            <div class="w3-modal" id="reset_password"  style="display:block">
            <div class="w3-modal-content w3-card-4 w3-animate-right w3-round-large" style="max-width:400px;height:450px">
            <div class="w3-center"><br>
            <img src="images/blogs/softos2.png" alt="Avatar" style="width:10%;" class="w3-margin-top w3-margin-left">
            <h1 >Password Change!</h1>
            <form class="w3-container" action="blogs_functions" method="POST" onsubmit="return new_check()">
                    <div class="w3-section">
                    <input type="email" value="<?php echo $req_email;?>" style="display:none" name="req_email">
                    <label><b>Enter your new password!</b></label>
                      <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="text" id="new_pass" placeholder="Again Enter Password" name="new_password" required>
                      <p id="new_mess"></p>
                    <label><b>Again enter your new password!</b></label>
                      <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="text" id="new1_pass" placeholder="Again Enter Password" name="new_password" required>
                      <p id="new1_mess"></p>
                      <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit" name="create_password" onclick="new_check()">Create New Password</button>
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


function new_check(){

  var valid=document.getElementById('new_pass').value;
  var valid1=document.getElementById('new1_pass').value;
var valid_message=document.getElementById('new_mess');
var valid1_message=document.getElementById('new1_mess');


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
  valid_message.innerHTML="Password must have digits!";
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
else if(valid!=valid1)
{
    valid1_message.innerHTML="Password not matched!";
    valid1_message.style.color="red";
return false;
}
else
{
    return true;  
}
}
</script>
         <?php   
          }
          else
          {
              ?>
              <div class="w3-container">
    <div id="create_error" class="w3-modal" style="display:block">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="width:30%;height:60%">
    <div class="w3-center"><br>
    <img src="images/admin/softos2.png" alt="Avatar" style="width:20%;" class="w3-margin-top w3-margin-left">
    <h1 >Something is Wrong!</h1>
    <h1>Password has not changed! <img src="images/admin/error.png" alt="pass_changed_icon" width="10%"></h1>
    
    <button class="w3-button w3-blue w3-round-xxlarge" onclick="create_error_cut()" style="width:30%;margin-top:5px">Okay!</button>
    </div>
    </div>
    </div>
    </div>


    <script>
    function star(){
setTimeout(() => {
  document.getElementById("create_error").style.display="block";
}, 100);
};

function create_error_cut(){ 
  document.getElementById('create_error').style.display='none';
  window.open('login','_self');
}
    </script>
              <?php
          }
        }
        else{
            header('location:login');
        }
        ?>