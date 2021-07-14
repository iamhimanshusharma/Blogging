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
<title>SoftOS Blogs | <?php echo $_REQUEST['edit']; ?></title>
<script src="ckeditor/ckeditor.js" type="text/javascript" ></script>
<?php include('blogs_login_header.php');?>
<?php include('blogs_dbcon.php');?>

<?php
$edit=$_REQUEST['edit'].".txt";
$update="SELECT * FROM `blogs` WHERE `blog_file`='$edit'";
$update_query=mysqli_query($blogs_con,$update);
$update_data=mysqli_fetch_assoc($update_query);

?>

	<!-- Editor -->
    <form action="blogs_functions.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="edit_new_name" value="<?php echo $update_data['blog_name'];?>">
    <input type="text" value="<?php echo $update_data['blog_id'];?>" style="display:none" name="edit_id">
    <input type="text" value="<?php echo $update_data['blog_name'];?>" style="display:none" name="edit_old_name">
    <input type="text" name="edit_author_name" required="required"  value="<?php echo $update_data['blog_author'];?>" class="w3-input w3-border w3-margin-bottom w3-round-large" placeholder="Enter author name">

    <textarea id='editor' name="edit_content"><?php echo file_get_contents('uploads/'.$update_data['blog_file']);?></textarea>
    <input type="submit" value="Update" name="edit_publish" style="background:linear-gradient(135deg,purple,navy);color:white;border-radius:8px;font-size:25px" class="w3-hover-opacity w3-hover-text-white w3-button w3-block w3-section w3-padding">
    </form>

    <a onclick="blogs_delete()" class="w3-bar-item w3-button w3-red">Delete</a>
  <div class="w3-container">
<div class="w3-modal" id="blogs_delete"  style="display:none">
<div class="w3-modal-content w3-card-4 w3-animate-right w3-round-large" style="width:400px;height:400px">
<div class="w3-center">
<div class="w3-container" style="background:linear-gradient(135deg,purple,navy);color:white;border-radius:8px 8px 0 0">
<h1>Delete Blog</h1>
</div>
<img src="images/blogs/softos2.png" alt="Avatar" style="width:100px;" class="w3-margin-top w3-margin-left">
<form class="w3-container" action="blogs_functions" method="POST">
        <div class="w3-section">
        <h4>Do you really want to delete your blog?</h4>
        <input type="text" style="display:none" value="<?php echo $update_data['blog_id'];?>" name="delete_id">
          <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit" name="blogs_delete">Delete</button>
          <a class="w3-button w3-block w3-red w3-section w3-padding" onclick="delete_cut()" name="delete_cut">Cancel</a>

          </div>
      </form>          
</div>
</div>
</div>
</div>


	<!-- Script -->
	<script type="text/javascript">
		CKEDITOR.replace( 'editor', {
            height: 500,
            filebrowserUploadUrl: "/website/blogs/upload.php?type=file",
            filebrowserImageUploadUrl: "/website/blogs/upload.php?type=image"
        } );


        function blogs_delete(){
setTimeout(() => {
  document.getElementById("blogs_delete").style.display="block";
}, 100);
};

function delete_cut(){
  document.getElementById("blogs_delete").style.display="none";
}

	</script>
</body>
</html>

<?php include('blogs_footer.php');?>