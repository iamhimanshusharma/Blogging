<?php
require_once('session.php');
include('blogs_dbcon.php');
require_once('blogs_header.php');


if(isset($_POST['publish']))
{
    $author_id=$_POST['author_id'];
    $author_name=$_POST['author_name'];
    $name=$_POST['name'];
    $category=$_POST['category'];
    $editor=$_POST['content'];
    extract($_REQUEST);

    $filename=str_ireplace(" ","-",strtolower($name)).".html";
    $filename1=str_ireplace(" ","-",strtolower($name)).".txt";
$file=fopen('uploads/'.$filename,"w");
$file=fopen('uploads/'.$filename1,"w");

fwrite($file,"$editor");

$query="INSERT INTO `blogs`(`author_id`,`blog_name`,`blog_category`,`blog_file`,`blog_author`) VALUES ('$author_id','$name','$category','$filename','$author_name')";
$run=mysqli_query($blogs_con,$query);

if($run)
{ 
    setcookie('blog_name',"",time()-86400);
    header('location:content?blog-name='.str_ireplace(" ","-",strtolower($name)));
}
else
{
    echo "nahi hua";
}
}



if(isset($_POST['edit_publish']))
{
    $edit_id=$_POST['edit_id'];
    $edit_author_name=$_POST['edit_author_name'];
    $edit_name=$_POST['edit_new_name'];
    $edit_file=$_POST['edit_old_name'];
    $edit_content=$_POST['edit_content'];
    extract($_REQUEST);

    $filename=str_ireplace(" ","-",strtolower($edit_name)).".txt";
        $file=fopen('uploads/'.$filename,"w");
        fwrite($file,"$edit_content");
    
$edit_query="UPDATE `blogs` SET `blog_name`='$edit_name',`blog_file`='$filename',`blog_author`='$edit_author_name' WHERE `blog_id`='$edit_id'";
$edit_run=mysqli_query($blogs_con,$edit_query);

if($edit_run)
{ 
    setcookie('blog_name',"",time()-3600);
    header('location:content?blog-name='.str_ireplace(" ","-",strtolower($edit_name)));
}
else
{
    echo "nahi hua";
}
}

if(isset($_POST['blogs_delete']))
{
    $delete_id=$_POST['delete_id'];

    $delete_query="DELETE FROM `blogs` WHERE `blog_id`='$delete_id'";
    $delete_run=mysqli_query($blogs_con,$delete_query);

    if($delete_run)
    {
        header('location:index');
    }
    else
    {
        header('location:wrong');
    }
}



// Photo insert functions
if(isset($_POST['photo_submit']))
{
    $photo_id=$_SESSION['ssid'];
    $photo_img=$_FILES['photo_img']['name'];
    $photo_temp=$_FILES['photo_img']['tmp_name'];
    
    $ext=pathinfo($photo_img,PATHINFO_EXTENSION);

    if($ext=='png' || $ext=='PNG'
    || $ext=='jpg' || $ext=='JPG'
    || $ext=='jpeg' || $ext=='JPEG'
    || $ext=='gif' || $ext=='GIF')
    {
    
        if($ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='JPEG')
        {
            $src=imagecreatefromjpeg($photo_temp);
        }
        if($ext=='png' || $ext=='PNG')
        {
            $src=imagecreatefrompng($photo_temp);
        }
        if($ext=='gif' || $ext=='GIF')
        {
            $src=imagecreatefromjpeg($photo_temp);
        }
    
        list($width_min,$height_min)=getimagesize($photo_temp);
    
        $newwidth_min=350;
    
        $newheight_min=($height_min/$width_min)*$newwidth_min;
    
        $tmp_min=imagecreatetruecolor($newwidth_min,$newheight_min);
    
        imagecopyresampled($tmp_min,$src,0,0,0,0,$newwidth_min,$newheight_min,$width_min,$height_min);
    
        imagejpeg($tmp_min,"images/signup/".$photo_img,100);
    
    $photo_query="INSERT INTO `signup_photo`(`photo_id`,`photo`) VALUES ('$photo_id','$photo_img')";

    $photo_run=mysqli_query($blogs_con,$photo_query);
    
    if($photo_run == TRUE)
    {
        ?><script>
            alert("data submit");
        </script><?php
        header('location:dashboard');
    }
    else
    {
        ?>
        <script>
        alert("something is wrong");
        </script>
        <?php
        header('location:dashboard');
    }
}
else
{
    ?>
    <script>
    alert("File format is wrong...");
    header('location:dashboard');
    </script>
    <?php
}
}
// Photo update funtion
if(isset($_POST['photo_update']))
{
    $photo_id=$_SESSION['ssid'];
    $photo_img=$_FILES['photo_img']['name'];
    $photo_temp=$_FILES['photo_img']['tmp_name'];
    
    $ext=pathinfo($photo_img,PATHINFO_EXTENSION);

    if($ext=='png' || $ext=='PNG'
    || $ext=='jpg' || $ext=='JPG'
    || $ext=='jpeg' || $ext=='JPEG'
    || $ext=='gif' || $ext=='GIF')
    {
    
        if($ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='JPEG')
        {
            $src=imagecreatefromjpeg($photo_temp);
        }
        if($ext=='png' || $ext=='PNG')
        {
            $src=imagecreatefrompng($photo_temp);
        }
        if($ext=='gif' || $ext=='GIF')
        {
            $src=imagecreatefromjpeg($photo_temp);
        }
    
        list($width_min,$height_min)=getimagesize($photo_temp);
    
        $newwidth_min=350;
    
        $newheight_min=($height_min/$width_min)*$newwidth_min;
    
        $tmp_min=imagecreatetruecolor($newwidth_min,$newheight_min);
    
        imagecopyresampled($tmp_min,$src,0,0,0,0,$newwidth_min,$newheight_min,$width_min,$height_min);
    
        imagejpeg($tmp_min,"images/signup/".$photo_img,80);
    
      
    $photo_query="UPDATE `signup_photo` SET `photo`='$photo_img' WHERE `photo_id`='$photo_id'";

    $photo_run=mysqli_query($blogs_con,$photo_query);
    
    if($photo_run == TRUE)
    {
        ?><script>
            alert("data submit");
        </script><?php
        header('location:dashboard');
    }
    else
    {
        ?>
        <script>
        alert("something is wrong");
        </script>
        <?php

    }
}
else
{
    ?>
    <script>
    alert("File format is wrong...");
    window.open('dashboard','_self');
    </script>
    <?php
}
}

// Login funtions
if(isset($_POST['login_submit']))
{
    $login_email=$_POST['login_email'];
    $login_password=$_POST['login_password'];
    
$login_query="SELECT * FROM `signup` WHERE `signup_email`='$login_email' AND `signup_password`='$login_password'";

$login_run=mysqli_query($blogs_con,$login_query);

if($login_run)
{

$user_data=mysqli_fetch_assoc($login_run);
$login_session=$user_data['signup_id'];
$_SESSION['ssid']=$login_session;
header('location:dashboard');

}
else
{
    ?><script>alert('login is wrong!');</script><?php
}
}


// Signup functions

include('blogs_dbcon.php');

if(isset($_POST['signup_submit']))
{

    $signup_first_name=$_POST['signup_first_name'];
    $signup_last_name=$_POST['signup_last_name'];
    $signup_email=$_POST['signup_email'];
    $signup_password=$_POST['signup_password'];
    
$ssignup="INSERT INTO `signup`(`signup_first_name`, `signup_last_name`, `signup_email`, `signup_password`,`status`) VALUES ('$signup_first_name','$signup_last_name','$signup_email','$signup_password','unverified')";

$srun=mysqli_query($blogs_con,$ssignup);

if($srun)
{
    $da="SELECT * FROM `signup` WHERE `signup_email`='$signup_email'";
    $da_run=mysqli_query($blogs_con,$da);
    $da_data=mysqli_fetch_assoc($da_run);
    
$_SESSION['ssid']=$da_data['signup_id'];

header('location:dashboard');
}
else
{
echo "ssorry";
}
}


// password reset start


if(isset($_POST['create_password']))
{
$rq_email=$_POST['req_email'];
$rq_password=$_POST['new_password'];

$ch_query="UPDATE `signup` SET `signup_password`='$rq_password' WHERE `signup_email`='$rq_email'";
$ch_run=mysqli_query($blogs_con,$ch_query);

if($ch_run)
{

    require '../phpmailer/PHPMailerAutoload.php';
$mail=new PHPMailer;
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Port=465;
$mail->SMTPAuth=true;
$mail->SMTPSecure='ssl';

$mail->Username='[YOUR EMAIL]';
$mail->Password='[EMAIL PASSWORD]';

$mail->setFrom('[SENDING EMAIL]','[SUBJECT]');
$mail->addAddress($rq_email);
$mail->addReplyTo('[REPLYING EMAIL]');

$mail->isHTML(true);
$mail->Subject='[SUBJECT]';
$mail->Body="[MESSAGE]";

$mail->send();
    ?><div class="w3-container">
    <div id="change" class="w3-modal" style="display:block">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="width:30%;height:60%">
    <div class="w3-center"><br>
    <img src="images/blogs/softos2.png" alt="Avatar" style="width:20%;" class="w3-margin-top w3-margin-left">
    <h1 >Congratulations!</h1>
    <h1>Password Changed! <img src="images/admin/verified.png" alt="pass_changed_icon" width="10%"></h1>
    
    <button class="w3-button w3-blue w3-round-xxlarge" onclick="change_pass_cut()" style="width:30%;margin-top:5px">Okay!</button>
    </div>
    </div>
    </div>
    </div>


    <script>
    function star(){
setTimeout(() => {
  document.getElementById("change").style.display="block";
}, 100);
};

function change_pass_cut(){ 
  document.getElementById('change').style.display='none';
  window.open('login','_self');
}
    </script>
    <?php
}
else
{
    header('location:login');
}
}
else
{
    header('location:login');
}

if(isset($_POST['followed']))
{
    $follower_id=$_POST['follower_id'];
    $following_id=$_POST['following_id'];

    $f_query="INSERT INTO `follower_following`(`follower_id`, `following_id`) VALUES ('$follower_id','$following_id')";
    $f_run=mysqli_query($blogs_con,$f_query);

if($f_run)
{
    ?>
    <script>
    alert('following');
    window.open('index','_self');
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('wrong');
    </script>
    <?php
}
}



// Submission of comment
if(isset($_POST['submit_comment']))
{
    $comment=$_POST['comment'];
    $blog_id=$_POST['blog_id'];

    $comment_query="INSERT INTO `blogs_comment`(`blogs_id`, `blogs_comment`) VALUES ('$blog_id','$comment')";
    $comment_run=mysqli_query($blogs_con,$comment_query);

    $c_query="SELECT * FROM `blogs` WHERE `blog_id`='$blog_id'";
    $c_run=mysqli_query($blogs_con,$c_query);
    $c_data=mysqli_fetch_assoc($c_run);

    if($comment_run)
    {
        header('location:content?'.$c_data['blog_file']);
    }
    else
    {
        header('location:index');
    }
}


// Submission of feedback
if(isset($_POST['submit_feedback']))
{
    $feedback_blog_id=$_POST['feedback_blog_id'];
    $feedbacker_name=$_POST['feedbacker_name'];
    $feedbacker_email=$_POST['feedbacker_email'];
    $feedback=$_POST['feedback'];

    $feedback_query="INSERT INTO `blogs_feedback`(`feedback_blogs_id`, `feedbacker_name`, `feedbacker_email`, `feedback`) VALUES ('$feedback_blog_id','$feedbacker_name','$feedbacker_email','$feedback')";
    $feedback_run=mysqli_query($blogs_con,$feedback_query);

    $f_query="SELECT * FROM `blogs` WHERE `blog_id`='$feedback_blog_id'";
    $f_run=mysqli_query($blogs_con,$f_query);
    $f_data=mysqli_fetch_assoc($f_run);

    if($feedback_run)
    {
        header('location:content?'.$f_data['blog_file']);
    }
    else
    {
        header('location:index');
    }
}


?>