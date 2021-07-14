<link rel="stylesheet" href="css/swiper.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/style.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">

<style>
    *{
        font-family: 'Quicksand', sans-serif;
    }
.alert {
  padding: 20px;
  background-color:white;
  color:black;
}

.closebtn {
  margin-left: 15px;
  color:black;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: grey;
}
</style>
<body>


<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right w3-margin-top" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <a href="."><img src="images/blogs/blogs_logo1.png" class="w3-left w3-margin-left" alt="" width="144px" height="81px"></a>      
      <a onclick="window.open('login','_self')"><img src="images/blogs/login_logo.png" alt="login" width="50px" height="50px" class="w3-margin-top w3-circle w3-right w3-margin-right w3-border w3-hover-opacity"></a>
      <a href="blogs_create" class="w3-button w3-hide-small w3-large w3-margin-top w3-right w3-margin-right w3-text-white w3-round-xlarge" style="background-color:rgb(51,63,80);">+Create</a>    
    
      <a href="." class="w3-bar-item w3-button w3-hide-small w3-hover-white  w3-round-large w3-hover-shadow  w3-right w3-margin-top w3-text-grey w3-margin-right"><i class="fa fa-home"></i> HOME</a>
    </div>
   
    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium"> 
    <a href="." class="w3-bar-item w3-button w3-text-grey w3-hover-grey w3-round-large" onclick="toggleFunction()"><i class="fa fa-home"></i> HOME</a>
    
    </div>
  </div>
  <br>
  <br>
  <hr style="margin:40px 0 0 0">
