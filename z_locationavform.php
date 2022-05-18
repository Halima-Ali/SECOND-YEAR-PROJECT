<?php
include 'includes\db_config.php';



// property owners
// properties owners
// to select the properties
$sql4="SELECT * FROM property_table";
$result4=mysqli_query($conn,$sql4);

$property_count= mysqli_num_rows($result4);
$properties=mysqli_fetch_all($result4,MYSQLI_ASSOC);

if(isset($_POST['location_report'])){

$location_query=$_POST['location'];
header("Location:z_locationav.php?id=".$location_query);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="agents.css?v=<?php echo time(); ?>">
 <title>Document</title>
</head>
<body>
 <h1 class="formtitle">Choose a <span class="orange">Location</span></h1>
 <form action="z_locationavform.php" method="post">
<select name="location" id="#"> 
 <?php foreach($properties as $property):?>
 <option value="<?php echo htmlspecialchars($property['location']);?>"><?php echo htmlspecialchars($property['location']);?></option>
 <?php endforeach;?>
</select>
<button type="submit" class="btn" name= "location_report">Generate Report</button>
 </form>
</body>
</html>