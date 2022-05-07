<!-- where the reviews will be posted -->
<?php
include 'includes\db_config.php';

$sql="SELECT * FROM neighborhood  ORDER BY review_id";
$result=mysqli_query($conn,$sql);

$reviews=mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="individualproperty.css?v=<?php echo time(); ?>">
 <title>Neighbourhood</title>
</head>
<body>
 
 <div class="info">
  <div class="top">
   <h3 class="logo">Real <span class="orange">Estate</span></h3>
   <h2>Neighbourhood Reviews</h2>
  </div>
  
  <hr class="line1">

  <?php foreach($reviews as $review):?>
  <div class="info-content">  
   <div class="owner">
   <img src="images\pic-2.png" alt="">
   </div>
   
   <div>
   <h2><?php echo htmlspecialchars($review['name']);?></h2>
   <h4><?php echo htmlspecialchars($review['date']);?></h4>
   <p><?php echo htmlspecialchars($review['review']);?></p>
   </div>
  </div>
  <?php endforeach;?>
  <hr class="line1">

 </div>

 

<div class="formcontainer">
 <form action="neighbourhoodformreview.php" method="POST" class="form1">
 <div class="review"> <label for="Review">Review</label>
 <input type="text" name="review" placeholder="Post a neighbourhood review"></div>
 <div>
  <label for="Location">Location</label>
  <input type="text" name="location" placeholder="Location">
 </div>
 <div>
 <label for="Date">Date</label>
 <input type="text" name="date" placeholder="date posted">
 </div>
 <div>
  <button type="submit" name="n-submit" class="button">POST</button>
 </div>
 
</form>
</div>

<!-- script for ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>