<?php
include('blogs_dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p id="comments"></p>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script  type="text/javascript" >
    $(document).ready(function(){

function loadho(){
        $.ajax({
url:"tester.php",
type:"post",
success:function(data){
    $("#comments").html(data);
}
});
}
loadho();
    });
    
    </script>
</body>
</html>