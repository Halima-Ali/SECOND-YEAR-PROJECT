<?php
include 'includes\db_config.php';



// property owners
// properties owners
// to select the properties
$sql4="SELECT * FROM propertyowner";
$result4=mysqli_query($conn,$sql4);

$propertyowners_count= mysqli_num_rows($result4);
$owners=mysqli_fetch_all($result4,MYSQLI_ASSOC);

if(isset($_POST['po_report'])){

$owner_query=$_POST['owner'];
header("Location:z_propertyperowner.php?name=".$owner_query);
$sql1="SELECT * FROM property_table WHERE owner_name='$owner_query'" ;
$result1=mysqli_query($conn,$sql1);

$property_count= mysqli_num_rows($result1);
$properties=mysqli_fetch_all($result1,MYSQLI_ASSOC);
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
 <h1 class="formtitle">Choose a <span class="orange">Property Owner</span></h1>
 <form action="z_poform.php" method="post">
<select name="owner" id="#"> 
 <?php foreach($owners as $owner):?>
 <option value="<?php echo htmlspecialchars($owner['po_name']);?>"><?php echo htmlspecialchars($owner['po_name']);?></option>
 <?php endforeach;?>
</select>
<button type="submit" class="btn" name= "po_report">Generate Report</button>
 </form>
</body>
</html>