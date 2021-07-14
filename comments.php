<?php
include('blogs_dbcon.php');

if(isset($_POST['c_id']))
{
$comment_id=$_POST['c_id'];

$c_query="SELECT * FROM `blogs_comment` WHERE `blogs_id`='$comment_id'";
$c_run=mysqli_query($blogs_con,$c_query);

$output ="<p>";
while($c_data=mysqli_fetch_assoc($c_run))
{
    $output .="{$c_data["blogs_comment"]}";
    $output .="</p>";
}
echo $output;
}
else
{
    header('location:index.php');
}
?>