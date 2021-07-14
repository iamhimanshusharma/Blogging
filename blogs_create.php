<?php  
require_once('session.php');
include('blogs_dbcon.php');

if(isset($_SESSION['ssid']))
{
  $signup=$_SESSION['ssid'];
    $dashboard="SELECT * FROM `signup` WHERE `signup_id`='$signup'";
    $dashboard_run=mysqli_query($blogs_con,$dashboard);
    
    $dashboard_data=mysqli_fetch_assoc($dashboard_run);
      
}
else
{
  header('location:login');     
}

?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="discription" content="This website contains mutliple softwares of Windows, MacOS and Linux, it is easy
download by just one click. Here you will get multiple useful software free.">
<meta name="keywords" content="free softwares, softwares for pc, chrome for pc, visual studio download for pc, macos softwares download">
<meta name="author" content="Himanshu Sharma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SoftOS Blogs | <?php echo $_COOKIE['blog_name']; ?></title>
<script src="ckeditor/ckeditor.js" type="text/javascript" ></script>
<?php

$login_photo = $_SESSION['ssid'];

$login_photo_query="SELECT * FROM `signup_photo` WHERE `photo_id`='$login_photo'";
$login_photo_run=mysqli_query($blogs_con,$login_photo_query);

$login_photo_data=mysqli_fetch_assoc($login_photo_run);


?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/css.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body onload="star()">


<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right w3-margin-top" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <img src="images/blogs/blogs1.png" class="w3-left w3-margin-left" alt="" width="144px" height="81px">
    <?php 
    if($login_photo_data['photo'])
    {
      ?><a onclick="profile_portal()"><img src="images/signup/<?php echo $login_photo_data['photo'];?>" alt="login" width="50px" height="50px" class="w3-margin-top w3-circle w3-right w3-margin-right w3-border w3-hover-opacity"></a><?php
    }
    else
    {
      ?><a onclick="profile_portal()"><img src="images/blogs/signup_profile.jpg" alt="login" width="50px" height="50px" class="w3-margin-top w3-circle w3-right w3-margin-right w3-border w3-hover-opacity"></a><?php
    }
    ?>
    
    <a href="index" class="w3-bar-item w3-button w3-hide-small w3-hover-white  w3-round-large w3-hover-shadow  w3-right w3-margin-top w3-text-grey w3-margin-right"><i class="fa fa-home"></i> HOME</a>
    </div>
 
  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium"> 
  <a href="index" class="w3-bar-item w3-button w3-text-grey w3-hover-grey w3-round-large" onclick="toggleFunction()"><i class="fa fa-home"></i> HOME</a>
    </div>
</div>
<br>
<br>
<hr style="margin:40px 0 0 0">

<div class="w3-container">
      <div class="w3-dropdown-click w3-right">
        <div id="profile_portal" class="w3-dropdown-content w3-bar-block" style="right:0;width:350px;">
          <!-- login start -->
        <div class="w3-modal-content w3-border w3-round-large" style="width:350px;">
          <div class="w3-center"><br>
          <?php 
    if($login_photo_data['photo'])
    {
      ?><a href="dashboard"><img src="images/signup/<?php echo $login_photo_data['photo'];?>" alt="login" width="150px" height="150px" class="w3-margin-top w3-circle w3-border w3-hover-opacity"></a><?php
    }
    else
    {
      ?><a href="dashboard"><img src="images/admin/signup_profile.jpg" alt="login" width="150px" height="150px" class="w3-margin-top w3-circle w3-border w3-hover-opacity"></a><?php
    }
    ?>
    </div>
    <div class="w3-container  w3-padding-16 w3-white w3-center w3-round-large">
    <a class="w3-border w3-white w3-hover-blue  w3-text-gray w3-button w3-round-large" href="dashboard">Dashboard</a>
      <a class="w3-border w3-white w3-hover-blue w3-button w3-text-grey w3-round-large" href="logout">Sign Out</a>
        <hr>
        <a href="#" style="text-decoration:none;color:grey"><i>feedback</i></a>
        </div>

          </div>
    </div>
        </div>
      </div>
        </div>

<?php

if(isset($_COOKIE['blog_name']))
{
    ?>
    <script>
    window.open('blogs_create?blog-name='.$_COOKIE['blog_name'],'_self');
    </script>
    <?php
// header('location:blogs_create?blog-name='.$_COOKIE['blogs_name']);
}
else
{
  ?>
    <script>
    window.open('blogs_name','_self');
    </script>
    <?php
}
?>

	<!-- Editor -->
    <form action="blogs_functions.php" method="POST" enctype="multipart/form-data">
    <input type="submit" value="Publish" name="publish" style="background:linear-gradient(135deg,purple,navy);color:white;border-radius:8px;font-size:16px" class="w3-hover-opacity w3-hover-text-white w3-button w3-right w3-section w3-padding">
    <h1 class="w3-center"><?php echo $_COOKIE['blog_name'];?><a href="blogs_name" style="font-size:20px;color:blue">edit</a></h1>
    <input type="text" value="<?php echo $_COOKIE['blog_name'];?>" style="display:none" name="name">
    <input type="text" value="<?php echo $_SESSION['ssid'];?>" style="display:none" name="author_id">
    <input type="text" name="author_name" required="required" class="w3-input w3-border w3-margin-bottom w3-round-large" value="<?php echo $dashboard_data['signup_first_name']." ".$dashboard_data['signup_last_name'];?>" placeholder="Enter author name">
  <select name="category" id="" required="required" class="w3-input w3-border w3-margin-bottom w3-round-large">
  <option value="0" disabled selected>Category</option>
  <option value="Education">Education</option>
  <option value="Environment">Environment</option>
  <option value="Technology">Technology</option>
  </select>
    <textarea id='editor' name="content"></textarea>
    </form>
<br>
	<!-- Script -->
	<script type="text/javascript">
		CKEDITOR.replace( 'editor', {
            height: 500,
            filebrowserUploadUrl: "/website/blogs/upload.php?type=file",
            filebrowserImageUploadUrl: "/website/blogs/upload.php?type=image"
        } );

	</script>
</body>
</html>

<?php include('blogs_footer.php');?>