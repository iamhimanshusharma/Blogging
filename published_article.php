<?php

require_once('session.php');
include('blogs_dbcon.php');


$login_photo = $_SESSION['ssid'];

$login_photo_query="SELECT * FROM `signup_photo` WHERE `photo_id`='$login_photo'";
$login_photo_run=mysqli_query($blogs_con,$login_photo_query);

$login_photo_data=mysqli_fetch_assoc($login_photo_run);

?>
<?php include("blogs_login_header.php");?>
<?php include("blogs_dbcon.php");?>

<?php
$published_query="SELECT * FROM `blogs` WHERE `author_id`='$login_photo'";
$published_run=mysqli_query($blogs_con,$published_query);

?>

<?php while($published_data=mysqli_fetch_assoc($published_run))
{
    ?>
    <div class="polaroid" style="height:200px;width:200px;margin:30px 10px 30px 10px;border-radius:5px;background:linear-gradient(135deg,purple,navy);">
    <a href="blogs_edit?edit=<?php echo str_ireplace(" ","-",strtolower($published_data['blog_name']));?>"><img src="images/blogs/main.png" alt="" height="100px" width="100px"></a>
    <hr>
    <div class="container" style="padding-top:0">
          <a class="w3-text-white" href="content?blog-name=<?php echo str_ireplace(" ","-",strtolower($published_data['blog_name']));?>" id="desc"><?php echo $published_data['blog_name'];?></a>
          </div>
</div>
    
    <?php
} 


  
?>
<?php include("blogs_footer.php");?>