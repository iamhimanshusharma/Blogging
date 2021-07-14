<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS | <?php echo $_SERVER['QUERY_STRING'];?></title>
<link rel="shortcut icon" href="images/blogs/softos_logo.png">
<?php

require_once('../session.php');
include('../dbcon.php');

if(isset($_SESSION['ssid']))
{
  include('blogs_login_header.php');
}
else
{
  include('blogs_header.php');
}

?>
<style>
.portal1{
  color:white;
  background-color:navy;
position:relative;

}
.portal{
  color:white;
  background-color:navy;
position:absolute;
left:80%;
top:0px;
}
</style>
<title>SoftOS Blogs | <?php echo $_REQUEST['blog-name']; ?></title>
<?php
 include('blogs_dbcon.php');


if(isset($_SERVER['QUERY_STRING']))
{
  $blog=$_SERVER['QUERY_STRING'];

$read_query="SELECT * FROM `blogs` WHERE `blog_file`='$blog' AND `blog_category`='graphics'";
$read_run=mysqli_query($blogs_con,$read_query);
if(mysqli_num_rows($read_run)>0)
{
$file=file_get_contents('uploads/'.$blog);
?>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-text-white" style="display:none;background-color:rgb(51,63,80);" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>

  <?php 
  $content_query="SELECT * FROM `blogs` WHERE `blog_category`='graphics'";
  $content_run=mysqli_query($blogs_con,$content_query);

  while($content_data=mysqli_fetch_assoc($content_run))
{
    ?><a href="?<?php echo $content_data['blog_file'];?>" class="w3-bar-item w3-button"><?php echo $content_data['blog_name'];?></a><?php
} ?>
<hr>
<a onclick="feedback_portal()" style="margin:20px;text-decoration:none;font-size:16px;cursor:pointer" class="w3-hover-text-blue">Feedback</a>
</div>


<?php
$blogs1_name=$_SERVER['QUERY_STRING'];
$blogs1_query="SELECT * FROM `blogs` WHERE `blog_file`='$blogs1_name'";
$blogs1_run=mysqli_query($blogs_con,$blogs1_query);
$blogs1_data=mysqli_fetch_assoc($blogs1_run);


$user_id=$blogs1_data['author_id'];
$user_query="SELECT * FROM `signup_photo` WHERE `photo_id`='$user_id'";
$user_run=mysqli_query($con,$user_query);
$user_data=mysqli_fetch_assoc($user_run);
?>

<div id="main">
<div style="background-color:white;">
  <button id="openNav" class="w3-button w3-xlarge" onclick="w3_open()"  style="color:rgb(51,63,80);">&#9776;</button>
  <div class="w3-container">
  <div class='w3-row'>
          <div class="w3-col s11">
          <h1 class="w3-text-black w3-center" style="font-family: 'Quicksand', sans-serif;font-weight:700;"><?php echo $blogs1_data['blog_name'];?></h1>
          </div>
          <!-- <div class="w3-dropdown-hover w3-right" >
  <img src="images/blogs/setting.png" alt="" style="padding:20px;background:linear-gradient(135deg,navy,purple)" class="w3-hover-grey" >
  <div class="w3-dropdown-content w3-bar-block w3-border" style="right:0">
    <a onclick="feedback_portal()" class="w3-bar-item w3-button" style="cursor:pointer" >Feedback</a>
  </div>
</div> -->
          </div>
    </div>
</div>

<p class="w3-margin-left" style="font-family: 'Quicksand', sans-serif;font-weight:600">Publisher: <a onclick="user_portal()"  class="w3-hover-shadow" style="cursor:pointer;color:grey;font-size:20px"><img src="../images/signup/<?php echo $user_data['photo'];?>" alt="publisher_image" width="50px" height="50px" class="w3-circle w3-hover-shadow"> <?php echo $blogs1_data['blog_author'];?></a></p>
<div class="w3-dropdown-click">
        <div id="user_portal" class="w3-dropdown-content w3-bar-block w3-border w3-round-large w3-animate-left" style="width:250px;position:fixed">
        <span class="closebtn w3-margin-top w3-margin-right" onclick="user_portal()">&times;</span> 
        <br>
          <!-- login start -->
          <div class="w3-center"><br>
          <?php 
    if($user_data['photo'])
    {
      ?><a href="#about"><img src="images/signup/<?php echo $user_data['photo'];?>" alt="login" width="150px" height="150px" class="w3-margin-top w3-circle w3-border w3-hover-opacity"></a><?php
    }
    else
    {
      ?><a href="#about"><img src="images/blogs/signup_profile.jpg" alt="login" width="150px" height="150px" class="w3-margin-top w3-circle w3-border w3-hover-opacity"></a><?php
    }
    ?>
    </div>
    <div class="w3-container  w3-padding-16 w3-white w3-center w3-round-large">
    <?php
    if(isset($_SESSION['ssid']))
    {
      ?>
      <form action="blogs_functions" method="POST">
      <input type="text" style="display:none" value="<?php echo $blogs1_data['author_id'];?>" name="following_id">
      <input type="text" style="display:none" value="<?php echo $_SESSION['ssid'];?>" name="follower_id">
      <button type="submit" class="w3-border w3-white w3-hover-blue  w3-text-gray w3-button w3-round-large" name="followed">Follow</button>
      </form>
      <?php
    }
    else
    {
      ?>
      <a class="w3-border w3-white w3-hover-blue  w3-text-gray w3-button w3-round-large" onclick="document.getElementById('login_message').style.display='block'">Follow</a>
   <p id="login_message" style="display:none;color:red">Please login to follow!</p>
   <?php
    }
    ?>
    <a class="w3-border w3-white w3-hover-blue w3-button w3-text-grey w3-round-large" href="#about">About</a>
        </div>
      </div>
    </div>

    <div class="w3-dropdown-click w3-right">
        <div id="feedback_portal" class="w3-dropdown-content w3-bar-block w3-border w3-round-large w3-animate-right" style="position:fixed;margin-top:-200px;right:0;width:350px">
        <span class="closebtn w3-margin-top w3-margin-right" onclick="feedback_portal()">&times;</span> 
          <!-- login start -->
          <div class="w3-center"><br>
          
          <p style="color:grey;font-size:20px"  class="w3-margin-left">Feedback</p>
          <hr>
<form action="blogs_functions.php" method="POST">
      <table align="center" width="70%">
      <input type="text" name="feedback_blog_id" value="<?php echo $blogs1_data['blog_id'];?>" style="display:none">
    <tr><td><input class="w3-input w3-border w3-round-large w3-margin-top" type="text" placeholder="Name" name="feedbacker_name" required="required"></td></tr>
    <tr><td><input class="w3-input w3-border w3-round-large" type="email" id="tip" placeholder="Email" name="feedbacker_email" required="required"></td></tr>
    <tr><td><input class="w3-input w3-border w3-round-large" style="width:100%;height:150px" type="text" placeholder="Message" name="feedback"></td></tr>
    <tr><td><button class="w3-input w3-border w3-round-large w3-blue w3-button w3-right w3-margin-bottom" type="submit" style="width:50%" name="submit_feedback" style="width:100%">Send</button></td></tr>
      </table>
      </form>
    </div>
      </div>
    </div>


<div class="w3-container w3-margin-left">
<p><?php echo $file;?></p>
</div>
<p class="w3-margin-left">Last update on: <?php echo $blogs1_data['blog_time'];?></p>
</div>

<p style="color:grey;font-size:20px;font-weight:700"  class="w3-margin-left">Leave your comment:</p>

<p id="comment_id" style="display:none"><?php echo $blogs1_data['blog_id'];?></p>
<p style="color:grey;font-size:16px;font-weight:500;"  class="w3-margin-left" id="comments"></p>

<form id="addform">
      <table align="center" width="70%">
      <input type="text" id="blog_id" value="<?php echo $blogs1_data['blog_id'];?>" style="display:none">
    <tr><td><input class="w3-input w3-border w3-round-large" style="width:100%;height:200px" type="text" placeholder="Leave your comment here..." id="comment" required></td></tr>
    <tr><td><button class="w3-input w3-border w3-round-large w3-blue w3-button w3-right w3-margin-bottom" type="submit" style="width:40%" id="submit_comment" style="width:100%">Comment</button></td></tr>
      </table>
      </form>


      <script type="text/javascript" src="js/jquery.js"></script>
    <script  type="text/javascript" >

    $(document).ready(function(){
function loadho(){
  var com=$("#comment_id").text();
        $.ajax({
url:"comments.php",
type:"post",
data:{c_id:com},
success:function(data){
    $("#comments").html(data);
}
});
}
loadho();


$("#submit_comment").on("click",function(e){
  e.preventDefault();
  var b_id=$("#blog_id").val();
var comments=$("#comment").val();

  $.ajax({
url:"comment_submit.php",
type:"post",
data:{blog_id:b_id, comment:comments},
success:function(data){
    if(data==1)
    {
      loadho();
      $("#addform").trigger("reset");
    }
    else
    {
      alert("cfjkldfj");
    }
}
});
})
    });
    
    </script>
<?php 
}
else
{
  ?>
  <script>
  window.open('index','_self');
  </script>
  <?php
}
}
else
{
  ?>
  <script>
  window.open('index','_self');
  </script>
  <?php
}


//Comments submit start from here
// if(isset($_POST['submit_comment']))
// {


// }

include('blogs_footer.php');?>