<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS | Home</title>
<link rel="shortcut icon" href="images/admin/softos_logo.png">
<?php
require_once('session.php');
include('blogs_dbcon.php');

if(isset($_SESSION['ssid']))
{
  include('blogs_login_header.php');
}
else
{
  include('blogs_header.php');
  
}

?>

<div class="w3-dropdown-click w3-right">
        <div id="profile_portal" class="w3-dropdown-content w3-bar-block w3-round-large" style="right:0px;width:350px">
          <!-- login start -->
        <div class="w3-padding-16 w3-white w3-center w3-round-large w3-border">
          <?php 
    if($login_photo_data['photo'])
    {
      ?><a href="dashboard"><img src="/images/signup/<?php echo $login_photo_data['photo'];?>" alt="login" width="150px" height="150px" class="w3-margin-top w3-circle w3-border w3-hover-opacity"></a><?php
    }
    else
    {
      ?><a href="dashboard"><img src="/images/admin/signup_profile.jpg" alt="login" width="150px" height="150px" class="w3-margin-top w3-circle w3-border w3-hover-opacity"></a><?php
    }
    ?>
    </div>
    <div class="w3-padding-16 w3-white w3-center w3-round-large">
    <a class="w3-border w3-white w3-hover-blue  w3-text-gray w3-button w3-round-large" href="dashboard">Dashboard</a>
      <a class="w3-border w3-white w3-hover-blue w3-button w3-text-grey w3-round-large" href="logout">Sign Out</a>
        <hr>
        <a href="#" style="text-decoration:none;color:grey"><i>feedback</i></a>
        </div>

          </div>
    </div>

<?php include('blogs_dbcon.php');?>

<form action="" method="GET" id="search_portal" >
<div class="w3-row">
<div class="w3-col s10">
<input type="text"class="w3-input" placeholder="What are you looking for?" name="q" id=search autocomplete>
</div>
<div class="w3-col s2">
<input type="submit" value="Search" class="w3-button" style="width:100%;background-color:rgb(51,63,80);color:white">
</div>
</div>
</form>



<?php
if(isset($_REQUEST['q']))
{
  ?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';window.open('index','_self');">&times;</span> 
  <?php
$search=$_REQUEST['q'];
$search_query="SELECT * FROM `blogs` WHERE `blog_name` LIKE '%$search%'";
$search_run=mysqli_query($blogs_con,$search_query);

if(mysqli_num_rows($search_run)<=1)
{
?>
<h3>Sorry, No data found!</h3>
<?php
}
else
{
while($search_data=mysqli_fetch_assoc($search_run))
{

    ?>
    <div class="polaroid" style="height:200px;width:200px;margin:30px 10px 30px 10px;border-radius:5px;background-color:rgba(51,63,80,1);">
    <a href="content?<?php echo $search_data['blog_file'];?>" id="desc"><img src="images/blogs/main.png" alt="" height="100px" width="100px"></a>
    <hr>
    <div class="container" style="padding-top:0">
          <a class="w3-text-white" href="content?<?php echo $search_data['blog_file'];?>" id="desc"><?php echo $search_data['blog_name'];?></a>
          </div>
</div>
    
    <?php
}
}
}
    ?>
    

</div>

       
<?php
$blogs_query="SELECT * FROM `blogs` LIMIT 0,6";
$blogs_run=mysqli_query($blogs_con,$blogs_query);


?>
<style>
    html, body {
        position: relative;
        height: 100%;
    }
    /* body {
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        margin: 0;
        padding: 0;
    } */
    .swiper-container {
        width: 100%;
        height: 70%;
        margin-left: auto;
        margin-right: auto;
        z-index:0;
        
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;

    }
</style>
<div class="swiper-container w3-hide-small">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="images/blogs/11.png" alt="" width="100%" height="100%"></div>
            <div class="swiper-slide"><img src="images/blogs/12.png" alt="" width="100%" height="100%"></div>
            <div class="swiper-slide"><img src="images/blogs/13.png" alt="" width="100%" height="100%"></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>      
</div>
<div class="swiper-container w3-hide-large w3-hide-medium">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="images/blogs/21.png" alt="" width="100%" height="100%"></div>
            <div class="swiper-slide"><img src="images/blogs/22.png" alt="" width="100%" height="100%"></div>
            <div class="swiper-slide"><img src="images/blogs/23.png" alt="" width="100%" height="100%"></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>      
</div>
<hr>
<p style="color:grey;font-size:30px;font-family:century gothic;text-align:center;font-weight:bold">Categories</p>
<a href="technology?jai-ho.html"><img src="images/catagories/technology.png" alt="" width="100px" height="100px" class="w3-hover-shadow w3-hover-grayscale w3-animate-zoom"></a>
<a href="education?what-is-artificial-intelligence.txt"><img src="images/catagories/education.png" alt="" width="100px" height="100px" class="w3-hover-shadow w3-hover-grayscale w3-animate-zoom"></a>
<a href="#environment"><img src="images/catagories/environment.png" alt="" width="100px" height="100px" class="w3-hover-shadow w3-hover-grayscale w3-animate-zoom"></a>
<a href="#networks"><img src="images/catagories/networks.png" alt="" width="100px" height="100px" class="w3-hover-shadow w3-hover-grayscale w3-animate-zoom"></a>
<a href="#graphics"><img src="images/catagories/graphics.png" alt="" width="100px" height="100px" class="w3-hover-shadow w3-hover-grayscale w3-animate-zoom"></a>

<hr>
<p style="color:grey;font-size:30px;font-family:century gothic;text-align:center;font-weight:bold">Latest Articles</p>
  <?php while($blogs_data=mysqli_fetch_assoc($blogs_run))
{
    ?>
  <div class="polaroid" style="height:200px;width:200px;margin:30px 10px 30px 10px;border-radius:5px;background-color:rgba(51,63,80,1);">
    <a href="<?php echo $blogs_data['blog_category'];?>?<?php echo $blogs_data['blog_file'];?>" id="desc"><img src="images/blogs/main.png" alt="" height="100px" width="100px"></a>
    <hr>
    <div class="container" style="padding-top:0">
          <a class="w3-text-white" href="content?<?php echo $blogs_data['blog_file'];?>" id="desc"><?php echo $blogs_data['blog_name'];?></a>
          </div>
</div>
      
    <?php
} 

?>

<hr>
<p style="font-size:100px;padding:20px" class="w3-hide-small">Write your article!<br>Share your knowledge!</p>
<p style="font-size:50px;padding:20px" class="w3-hide-large w3-hide-medium">Write your article!<br>Share your knowledge!</p>

  <div class="swiper-container" style="width:100%">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
            <div class="w3-panel w3-light-grey" style="margin-top:80px">
    <span style="font-size:300px;line-height:0.3em;opacity:0.2">❝</span>
    <p class="w3-xlarge" style="margin-top:-80px;font-family: 'Quicksand', sans-serif;font-weight:700;"><i>Keep connected to the world
    which will give you lot of happiness and satisfaction when anyone get benefit by your article. Share your knowledge
    who are seeking for it. It is a god gift that you have something to share with others who haven't.</i>
    <hr>
    <img src="images/blogs/admin.jpg" width=50px height=50px class="w3-circle" alt="" style="margin-bottom:30px"><i>Himanshu Sharma</i>
  </div>
            </div>
            <div class="swiper-slide">
            <div class="w3-panel w3-light-grey" style="margin-top:80px">
    <span style="font-size:300px;line-height:0.3em;opacity:0.2">❝</span>
    <p class="w3-xlarge" style="margin-top:-80px;font-family: 'Quicksand', sans-serif;font-weight:700;"><i>Keep learn and keep
    doing good thing because it will return back to you as bless, which will empower you to gain more and share more.</i>
    <hr>
    <img src="images/blogs/admin.jpg" width=50px height=50px class="w3-circle" alt="" style="margin-bottom:30px"><i>Himanshu Sharma</i>
  </div>
            </div>
            <div class="swiper-slide">
            <div class="w3-panel w3-light-grey" style="margin-top:80px">
    <span style="font-size:300px;line-height:0.3em;opacity:0.2">❝</span>
    <p class="w3-xlarge" style="margin-top:-80px;font-family: 'Quicksand', sans-serif;font-weight:700;"><i>Knowledge is immortal, it 
    lives after us!</i>
    <hr>
    <img src="images/blogs/admin.jpg" width=50px height=50px class="w3-circle" alt="" style="margin-bottom:30px"><i>Himanshu Sharma</i>
  </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>      
</div>
</div>
</div>
<hr>

<div class="w3-center" style="margin-top:50px">
<p style="font-size:30px">❝Knowledge sharing is like a worshiping, and holding the god gifts.<br>
It will lead to a world in a new generation!<br>Our community needs better and valuable segments.❞</p>


<p style="font-size:100px;padding:20px">Connect to the World
<div class="w3-container" style="margin-top:-120px;padding:20px">
<div class="w3-quarter w3-center"><p style="font-size:50px"><img src="images/blogs/label1.png" width=40px alt="" style="box-shadow: 0px 0px 50px #aaaaaa;" class="w3-circle">Create</p></div>
<div class="w3-quarter w3-center"><p style="font-size:50px"><img src="images/blogs/label1.png" width=40px alt="" style="box-shadow: 0px 0px 50px #aaaaaa;" class="w3-circle">Publish</p></div>
<div class="w3-quarter w3-center"><p style="font-size:50px"><img src="images/blogs/label1.png" width=40px alt="" style="box-shadow: 0px 0px 50px #aaaaaa;" class="w3-circle">Share</p></div>
<div class="w3-quarter w3-center"><p style="font-size:50px"><img src="images/blogs/label1.png" width=40px alt="" style="box-shadow: 0px 0px 50px #aaaaaa;" class="w3-circle">Read</p></div>
</div>
</p>
</div>

<hr>

<div class="w3-center">
<p style="font-size:30px">✔Create your blog article<br>✔Publish it with the world<br>✔Get connected with the world</p>
<p style="font-size:100px;padding:20px;margin-top:-50px">Create Now</p>
<a href="blogs_create" class="w3-button w3-large w3-text-white w3-round-xlarge" style="background-color:rgb(51,63,80);width:300px;margin-top:-120px"><h2>+Create</h2></a>
</div>
<hr>

<div class="w3-center">
<p style="font-size:50px;padding:20px">Our Categories</p>
<div class="w3-content" style="max-width:400px">
  <img class="mySlides " src="images/catagories/technology.png" style="width:100%">
  <img class="mySlides " src="images/catagories/environment.png" style="width:100%">
  <img class="mySlides " src="images/catagories/networks.png" style="width:100%">
  <img class="mySlides " src="images/catagories/graphics.png" style="width:100%">
  <img class="mySlides " src="images/catagories/education.png" style="width:100%">
</div>
</div>
<!-- Swiper JS -->
<script src="js/swiper.js"></script>

<!-- Initialize Swiper -->
<script>

var swiper = new Swiper('.swiper-container', {
    direction: 'vertical',
    slidesPerView: 1,
    spaceBetween: 30,
    mousewheel: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
});


var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1} 
  x[slideIndex-1].style.display = "block"; 
  setTimeout(carousel, 2000); 
}
</script>

<?php include('blogs_footer.php');?>