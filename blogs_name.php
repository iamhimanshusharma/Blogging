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
<title>SoftOS Blogs | Create your own blog ?></title>
<link rel="shortcut icon" href="images/blogs/softos_logo.png">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body onload="star()">
    <video  autoplay loop width="100%" muted  style="position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);" class="w3-hide-small">
    <source src="testone.mp4" type="video/mp4">
    </video>
    <video  autoplay loop width="100%" muted  style="position:absolute;bottom:0;right:0" class="w3-hide-large w3-hide-medium">
    <source src="testone.mp4" type="video/mp4">
    </video>
</body>

<div class="w3-container">
<div class="w3-modal" id="enter_name"  style="display:block">
<div class="w3-modal-content w3-card-4 w3-animate-right w3-round-large" style="width:400px;height:400px">
<div class="w3-center">
<div class="w3-container" style="background:linear-gradient(135deg,purple,navy);color:white;border-radius:8px 8px 0 0">
<h1>Blog's Name</h1>
</div>
<img src="images/blogs/softos2.png" alt="Avatar" style="width:100px;" class="w3-margin-top w3-margin-left">
<form class="w3-container" action="" method="POST">
        <div class="w3-section">
          <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="text" placeholder="Enter Blog Name" name="blog_name" required>
          <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit" name="submit_name">Create</button>
          <a class="w3-button w3-block w3-red w3-section w3-padding" onclick="blog_cut()" name="submit_name">I'll do later</a>

          </div>
      </form>          
</div>
</div>
</div>
</div>

<?php
include('blogs_dbcon.php');

if(isset($_POST['submit_name']))
{
    $name=$_POST['blog_name'];
    $newname=$name.".txt";

    $query="SELECT * FROM `blogs` WHERE `blog_file`='$newname'";
    $run=mysqli_query($blogs_con,$query);


    if(mysqli_num_rows($run)>0)
    {
        ?>
        <div class="w3-container">
<div class="w3-modal" id="enter_name"  style="display:block">
<div class="w3-modal-content w3-card-4 w3-animate-right w3-round-large" style="width:400px;height:400px">
<div class="w3-center">
<div class="w3-container" style="background:linear-gradient(135deg,purple,navy);color:white;border-radius:8px 8px 0 0">
<h1>Blog's Name</h1>
</div>
<img src="images/blogs/softos2.png" alt="Avatar" style="width:100px;" class="w3-margin-top w3-margin-left">
<form class="w3-container" action="" method="POST">
        <div class="w3-section">
          <input class="w3-input w3-border w3-margin-bottom w3-round-large" type="text" placeholder="Enter Blog Name" name="blog_name" required>
          <p style="color:red;">This name is already exist!</p>
          <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit" name="submit_name">Create</button>
          <a class="w3-button w3-block w3-red w3-section w3-padding" onclick="blog_cut()" name="submit_name">I'll do later</a>

          </div>
      </form>          
</div>
</div>
</div>
</div>

        <script>
        
        </script>
        <?php
    }
    else
    {
        setcookie('blog_name',$name);
        header('location:blogs_create.php?blog-name='.$name);
    }
}

?>
<script>

function star(){
setTimeout(() => {
  document.getElementById("enter_name").style.display="block";
}, 100);
};

function blog_cut(){
  document.getElementById("enter_name").style.display="block";
window.open('index','_self');
}

	</script>
</body>
</html>

<?php// include('blogs_footer.php');?>
