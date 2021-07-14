<?php
include('blogs_dbcon.php');
if(isset($_POST['comment']))
{
$comments=$_POST['comment'];
    $blog_id=$_POST['blog_id'];

    $comment_query="INSERT INTO `blogs_comment`(`blogs_id`, `blogs_comment`) VALUES ('$blog_id','$comments')";
    $comment_run=mysqli_query($blogs_con,$comment_query);
    
if($comment_run)
{
echo 1;
}
else{
    echo 0;
}
}
else
{
    header('location:index');
}
?>