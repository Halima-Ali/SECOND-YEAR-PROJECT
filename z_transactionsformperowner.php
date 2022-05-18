<?php
include 'includes\db_config.php';



// property owners
// properties owners
// to select the properties
$sql4="SELECT * FROM book_tour";
$result4=mysqli_query($conn,$sql4);

$tour_count= mysqli_num_rows($result4);
$tours=mysqli_fetch_all($result4,MYSQLI_ASSOC);

if(isset($_POST['transaction_report'])){

$owner_query=$_POST['ownername'];
header("Location:z_transactionsperowner.php?id=".$owner_query);
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
 <form action="z_transactionsperowner.php" method="post">
<select name="ownername" id="#"> 
 <?php foreach($tours as $tour):?>
 <option value="<?php echo htmlspecialchars($tour['owner_name']);?>"><?php echo htmlspecialchars($tour['owner_name']);?></option>
 <?php endforeach;?>
</select>
<button type="submit" class="btn" name= "transaction_report">Generate Report</button>
 </form>
</body>
</html>