<?php

include('blogs_dbcon.php');

    $unfollower_id=$_POST['unfollower_id'];
    $unfollowing_id=$_POST['unfollowing_id'];

    $f_query="    DELETE FROM `follower_following` WHERE `follower_id`='$unfollower_id' AND `following_id`='$unfollowing_id'";
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