<?php
include 'includes\db_config.php';
$name=$_GET['name'];
// to select pending properties
$sql="SELECT * FROM property_table WHERE owner_name='$name' AND property_status='pending'";
$result=mysqli_query($conn,$sql);

$pending_property_count= mysqli_num_rows($result);
$pending_properties=mysqli_fetch_all($result,MYSQLI_ASSOC);


//to select accepted properties
$sql2="SELECT * FROM property_table WHERE owner_name='$name' AND property_status='accepted'";
$result2=mysqli_query($conn,$sql2);

$accepted_property_count= mysqli_num_rows($result2);
$accepted_properties=mysqli_fetch_all($result2,MYSQLI_ASSOC);

//to select rejected properties
$sql3="SELECT * FROM property_table WHERE owner_name='$name' AND property_status='rejected'";
$result3=mysqli_query($conn,$sql3);

$rejected_property_count= mysqli_num_rows($result3);
$rejected_properties=mysqli_fetch_all($result3,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="admin.css">
 <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="main">
    <div class="topbar">
      <div></div>
    <!-- userimg -->
    <div class="user">
     <img src="images\pic-1.png" alt="image1">
    </div>
    </div>
   <!-- main -->
    <!-- section content -->
   

     <div class="profile_details">
     <div class="profilediv">
      <div class="cardHeader">
       <h2>Properties owned by <?php echo htmlspecialchars($name);?></h2>
       <!-- <button type="Submit" class="btn" name="generate_reports">Download as PDF</button> -->

          </div>
          <table>
         <thead>
        <tr>
        <td>Property Name</td>
        <td>Location</td>
        <td>Price</td>
        <td>Purpose</td>
        <td>Status</td>
        </tr>
       </thead>
        <tbody>
<!-- pending projects -->
        <?php foreach($pending_properties as $pending_property):?>
        <tr>
         <td><?php echo htmlspecialchars($pending_property['property_name']);?></td>
         <td><?php echo htmlspecialchars($pending_property['location']);?></td>
         <td><?php echo htmlspecialchars($pending_property['price']);?></td>
         <td><?php echo htmlspecialchars($pending_property['purpose']);?></td>        
         <td><span class="status pending"><?php echo htmlspecialchars($pending_property['property_status']);?></span></td>
         </tr>
        <?php endforeach;?>
        
        <!-- accepted properties -->
        <?php foreach($accepted_properties as $accepted_property):?>
        <tr>
         <td><?php echo htmlspecialchars($accepted_property['property_name']);?></td>
         <td><?php echo htmlspecialchars($accepted_property['location']);?></td>
         <td><?php echo htmlspecialchars($accepted_property['price']);?></td>
         <td><?php echo htmlspecialchars($accepted_property['purpose']);?></td>
        <td><span class="status delivered"><?php echo htmlspecialchars($accepted_property['property_status']);?></span></td>
         </tr>
        <?php endforeach;?>

        <!-- rejected properties -->
        <?php foreach($rejected_properties as $rejected_property):?>
        <tr>
         <td><?php echo htmlspecialchars($rejected_property['property_name']);?></td>
         <td><?php echo htmlspecialchars($rejected_property['location']);?></td>
         <td><?php echo htmlspecialchars($rejected_property['price']);?></td>
         <td><?php echo htmlspecialchars($rejected_property['purpose']);?></td>
         <td><span class="status rejected"><?php echo htmlspecialchars($rejected_property['property_status']);?></span></td>
         </tr>
        <?php endforeach;?>
       </table>

     </div>
    </div>

   </div>

  <!-- top row  -->

<!-- ionicons script -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="admin.js"></script>
</body>
</html