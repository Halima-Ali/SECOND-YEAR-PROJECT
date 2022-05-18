<?php
include 'includes\db_config.php';
$location_query=$_GET['id'];
// to select pending properties
$sql="SELECT * FROM property_table WHERE location='$location_query'";
$result=mysqli_query($conn,$sql);

$location_count= mysqli_num_rows($result);
$locations=mysqli_fetch_all($result,MYSQLI_ASSOC);
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
 
    <?php 
    $total=0;
    foreach($locations as $location){
     $location_price=intval($location['price']);
     $total+=$location_price;
    }
     // echo $total;
     $average_price=$total/$location_count;
     // echo $average_price;
    ?>
   

     <form>
      <h1>The average price of properties in <?php echo htmlspecialchars($location_query);?> is <b class="orange"><?php echo htmlspecialchars($average_price)?></b></h1>
     <!-- <input type="text"> -->
     </form>

  <!-- top row  -->

<!-- ionicons script -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="admin.js"></script>
</body>
</html