<?php
include 'includes\db_config.php';
session_start();
// properties
// to select the properties
$username=$_SESSION['po_Uid'];
$sql1="SELECT * FROM property_table WHERE owner_name='$username'";
$result1=mysqli_query($conn,$sql1);

$property_count= mysqli_num_rows($result1);
$properties=mysqli_fetch_all($result1,MYSQLI_ASSOC);

// to select pending properties
$sql="SELECT * FROM property_table WHERE owner_name='$username' AND property_status='pending'";
$result=mysqli_query($conn,$sql);

$pending_property_count= mysqli_num_rows($result);
$pending_properties=mysqli_fetch_all($result,MYSQLI_ASSOC);


//to select accepted properties
$sql2="SELECT * FROM property_table WHERE owner_name='$username' AND property_status='accepted'";
$result2=mysqli_query($conn,$sql2);

$accepted_property_count= mysqli_num_rows($result2);
$accepted_properties=mysqli_fetch_all($result2,MYSQLI_ASSOC);

//to select rejected properties
$sql3="SELECT * FROM property_table WHERE owner_name='$username' AND property_status='rejected'";
$result3=mysqli_query($conn,$sql3);

$rejected_property_count= mysqli_num_rows($result3);
$rejected_properties=mysqli_fetch_all($result3,MYSQLI_ASSOC);



mysqli_free_result($result1);
mysqli_free_result($result);
mysqli_free_result($result2);
mysqli_free_result($result3);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
 <title>Responsive Property Owner Dashboard</title>
</head>
<body>
<div class="container">
   <div class="navigation">
  <!-- navigation links -->
  <ul>
   <li>
    <a href="#">
     <span class="icon"><ion-icon name="aperture-outline"></ion-icon></span>
     <span class="title">Hi <?php echo $_SESSION['po_Uid']?></span>
    </a>
   </li>
   <li>
    <a href="propertyowner.php">
     <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
     <span class="title">Dashboard</span>
    </a>
   </li>
   <li>
    <a href="po_properties.php">
      <span class="icon"><ion-icon name="pricetag-outline"></ion-icon></span>
      <span class="title">Properties</span>
    </a>
   </li>
   <li>
    <a href="#">
    <span class="icon"><ion-icon name="person-outline"></ion-icon></ion-icon></span>
    <span class="title">Profile</span>   
    </a>
   </li>
   <li>
    <a href="#">
    <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
     <span class="title">Applications</span>
    </a>
   </li>
   <li>
    <a href="#">

     <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span>
      <span class="title">Bookings</span>
     
    </a>
   </li>
   <li>
    <a href="includes\po_logout.inc.php">
     <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
     <span class="title">Sign Out</span>
    </a>
   </li>
  </ul>
   </div>

   <!-- main -->
   <div class="main">
    <div class="topbar">
     <div class="toggle"><ion-icon name="menu-outline"></ion-icon>
    </div>
    <!-- search bar -->
    <div class="search">
     <label>
      <input type="text" placeholder="Search here">
      <ion-icon name="search-outline"></ion-icon>
     </label>
    </div>

    <!-- userimg -->
    <div class="user">
     <img src="images\pic-1.png" alt="image1">
    </div>
    </div>

    <!-- top bar -->
    <div class="cardBox">
     <div class="card">
      <div>
       <div class="numbers"><?php echo $property_count?></div>
       <div class="cardName">All Properties</div>
      </div>

      <div class="iconBx">
       <ion-icon name="person-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"><?php echo $pending_property_count?></div>
       <div class="cardName">Pending Properties</div>
      </div>

      <div class="iconBx">
       <ion-icon name="people-circle-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"><?php echo $accepted_property_count?></div>
       <div class="cardName">Accepted Properties</div>
      </div>

      <div class="iconBx">
      <ion-icon name="pricetag-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"><?php echo $rejected_property_count?></div>
       <div class="cardName">Rejected</div>
      </div>

      <div class="iconBx">
       <ion-icon name="people-outline"></ion-icon>
      </div>
     </div>
    </div>

    <!-- section content -->
    <div class="details">
     <div class="usersStats">
      <div class="cardHeader">
       <h2>All Properties</h2>
       <a href="add_property.php" class="btn">Add Property</a>
      </div>

      <table>
       <thead>
        <tr>
        <td>Property Name</td>
        <td>Location</td>
        <td>Price</td>
        <td>Purpose</td>
        <td>Action</td>
        <td>Status</td>
        </tr>
       </thead>
        <tbody>
         <tr>
           <!-- pending projects -->
        <?php foreach($pending_properties as $pending_property):?>
        <tr>
         <td><?php echo htmlspecialchars($pending_property['property_name']);?></td>
         <td><?php echo htmlspecialchars($pending_property['location']);?></td>
         <td><?php echo htmlspecialchars($pending_property['price']);?></td>
         <td><?php echo htmlspecialchars($pending_property['purpose']);?></td>        
        <?php echo "<td><a href='property_delete.php?id=".$pending_property['property_id']."&name=".$pending_property['property_name']."'><ion-icon name=\"trash-outline\"></ion-icon></a><a href=\"edit_property.php?id=\"".$pending_property['property_id']."><ion-icon name=\"create-outline\"></ion-icon></a></td>";?>    
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
        <?php echo "<td><a href='property_delete.php?id=".$accepted_property['property_id']."&name=".$accepted_property['property_name']."'><ion-icon name=\"trash-outline\"></ion-icon></a><a href='edit_property.php?id=".$accepted_property['property_id']."''><ion-icon name=\"create-outline\"></ion-icon></a></td>";?>  
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
         <?php echo "<td><a href='property_delete.php?id=".$rejected_property['property_id']."&name=".$rejected_property['property_name']."'><ion-icon name=\"trash-outline\"></ion-icon></a><a href='edit_property.php?id=".$rejected_property['property_id']."'><ion-icon name=\"create-outline\"></ion-icon></a></td>";?>  
         <td><span class="status rejected"><?php echo htmlspecialchars($rejected_property['property_status']);?></span></td>
         </tr>
        <?php endforeach;?>
       </table>

     </div>
     <div class="recentUsers">
      <div class="cardHeader">
       <h2>Pending Properties</h2>
       <!-- <a href="#" class="btn">View All</a> -->
      </div>
      <table>
        <tr>
         <?php foreach($pending_properties as $pending_property):?>
        <tr>
         <td><?php echo htmlspecialchars($pending_property['property_name']);?></td>
         <br>
         <td><?php echo htmlspecialchars($pending_property['location']);?></td>
        </td>
         <td><span class="status pending"><?php echo htmlspecialchars($pending_property['property_status']);?></span></td>
         </tr>
        <?php endforeach;?>
        </tr>
       </table>

     </div>
    </div>

   </div>
  </div>

    </div>

   </div>
  </div>
  <!-- top row  -->

<!-- ionicons script -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="admin.js"></script>
</body>
</html>