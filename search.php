<?php
require_once('../session.php');
include('../dbcon.php');
include('blogs_dbcon.php');

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
<title>SoftOS | Home</title>
<link rel="shortcut icon" href="images/admin/softos_logo.png">
  <?php
  include('blogs_login_header.php');
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
<title>SoftOS | Home</title>
<link rel="shortcut icon" href="images/admin/softos_logo.png">
  <?php
  include('blogs_header.php');
}

?>
<?php
if(isset($_POST['search_button']))
{
$search=$_POST['search'];
$search_query="SELECT * FROM `blogs` WHERE `blog_name` LIKE '%$search%'";
$search_run=mysqli_query($blogs_con,$search_query);
while($search_data=mysqli_fetch_assoc($search_run))
{

    ?>
    <div class="polaroid" style="height:200px;width:200px;margin:30px 10px 30px 10px;border-radius:5px;background:linear-gradient(135deg,purple,navy);">
    <a href="content?blog-name=<?php echo str_ireplace(" ","-",strtolower($search_data['blog_name']));?>" id="desc"><img src="images/blogs/main.png" alt="" height="100px" width="100px"></a>
    <hr>
    <div class="container" style="padding-top:0">
          <a class="w3-text-white" href="content?blog-name=<?php echo str_ireplace(" ","-",strtolower($search_data['blog_name']));?>" id="desc"><?php echo $search_data['blog_name'];?></a>
          </div>
</div>
    
    <?php
}
}
else
{
header('location:index');
}

?>