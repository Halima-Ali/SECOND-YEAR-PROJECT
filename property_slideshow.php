<!-- to show the images -->
<?php
 $mysqli= new mysqli('localhost', 'root', '', 'finalproject') or die($mysqli->connect.error);
 $pn=$_GET['name'];
 $result=$mysqli->query("SELECT * FROM property_images WHERE propertyName='$pn'") or die($mysqli-> error);
 
//  $result2=mysqli_query($conn,$sql2);
// $images=mysqli_fetch_assoc($result2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="property_slideshow.css">
 <title>Property slideshow</title>
</head>
<body>
 <div class="slideshow-container">

 <?php while($data=$result->fetch_assoc()){
  // echo "<h2>{$data['img_name']}</h2>";
  
  echo "<img src=\"{$data['img_dir']}\" width=\"100%\"alt=\"\">";
 }?>
  
</div>
<br>
<!-- The dots/circles -->
</body>
</html>
