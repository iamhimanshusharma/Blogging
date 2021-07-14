<?php

include('blogs_dbcon.php');

    $follower_id=$_POST['follower_id'];
    $following_id=$_POST['following_id'];

    $f_query="INSERT INTO `follower_following`(`follower_id`, `following_id`) VALUES ('$follower_id','$following_id')";
    $f_run=mysqli_query($blogs_con,$f_query);

if($f_run)
{
    echo 1;
}
else
{
    echo 0;
}

?>