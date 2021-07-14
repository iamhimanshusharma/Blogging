<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS | Password Reset</title>
<link rel="shortcut icon" href="images/admin/softos_logo.png">

<!--  -->
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/w3.css">
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
<div class="w3-modal-content w3-card-4 w3-animate-right w3-round-large" style="width:90%;height:90%">
<div class="w3-center">
<div class="w3-container" style="background-color:navy;color:white;border-radius:8px 8px 0 0">
<h1>Choose your template</h1>
</div>
<div style="overflow:auto;width:100%;height:350px;" class="w3-border">
<div class="w3-row w3-margin-top w3-margin-left">
<div class="w3-col s2 w3-border w3-margin-right w3-margin-bottom w3-hover-shadow">
<a href="hello"><img src="images/blogs/template.png" alt="" height="90%" width="90%"></a>
</div>
<div class="w3-col s2 w3-border w3-margin-right w3-margin-bottom w3-hover-shadow">
<a href="hello1"><img src="images/blogs/template.png" alt="" height="90%" width="90%"></a>
</div>
</div>
</div>
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