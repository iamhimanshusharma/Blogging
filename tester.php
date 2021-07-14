<?php
include('blogs_dbcon.php');

$c_query="SELECT * FROM `blogs_comment`";
$c_run=mysqli_query($blogs_con,$c_query);

$output ="<p>";
while($c_data=mysqli_fetch_assoc($c_run))
{
    $output .="{$c_data["blogs_comment"]}";
    $output .="</p>";
}
echo $output;
?>