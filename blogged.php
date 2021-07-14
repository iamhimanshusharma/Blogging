<?php include("blogs_header.php");?>
<?php include('blogs_dbcon.php');?>

<?php
$blogs_query="SELECT * FROM `blogs`";
$blogs_run=mysqli_query($blogs_con,$blogs_query);


?>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <?php while($blogs_data=mysqli_fetch_assoc($blogs_run))
{
    ?><a href="?topic-name=<?php echo $blogs_data['b_topic'];?>" class="w3-bar-item w3-button"><?php echo $blogs_data['b_topic'];?></a><?php
} ?>
</div>


<?php
$blogs1_id=$_GET['topic-name'];
$blogs1_query="SELECT * FROM `blogs` WHERE `b_topic`='$blogs1_id'";
$blogs1_run=mysqli_query($blogs_con,$blogs1_query);
$blogs1_data=mysqli_fetch_assoc($blogs1_run)
?>

<div id="main">
<div style="background-color:navy">
  <button id="openNav" class="w3-button w3-xlarge  w3-text-white" onclick="w3_open()" style="background-color:navy">&#9776;</button>
  <div class="w3-container">
    <h1 class="w3-text-white"><?php echo $blogs1_data['b_topic'];?></h1>
  </div>
</div>

<div class="w3-container">
<p><?php echo $blogs1_data['b_details'];?></p>
</div>
</div>
<?php include('blogs_footer.php');?>