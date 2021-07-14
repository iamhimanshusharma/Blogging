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

<!--  -->
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
<!--  -->

<div class="w3-container" style="display:block">
<div class="w3-modal" id="reset_password">
<div class="w3-modal-content w3-card-4 w3-animate-right w3-round-large" style="max-width:400px;height:400px">
<div class="w3-center"><br>
<img src="images/blogs/softos2.png" alt="Avatar" style="width:10%;" class="w3-margin-top w3-margin-left">
<h1 >Password Change!</h1>
<form class="w3-container" action="verify_reset" method="POST">
        <div class="w3-section">
          <label><b>Enter your email!</b></label>
          <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="email" placeholder="Enter Email" name="reset_email" required>
          <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit" name="reset_submit">Send OTP</button>
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