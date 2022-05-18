<?php
include 'includes\db_config.php';
session_start();
// properties
// to select the properties
$username=$_SESSION['po_Uid'];
$id=$_SESSION['po_id'];
$sql1="SELECT * FROM property_table WHERE owner_name='$username'";
$result1=mysqli_query($conn,$sql1);

$property_count= mysqli_num_rows($result1);
$properties=mysqli_fetch_all($result1,MYSQLI_ASSOC);

// to select pending properties
$sql="SELECT * FROM property_table WHERE owner_name='$username' AND property_status='pending'";
$result=mysqli_query($conn,$sql);

$pending_property_count= mysqli_num_rows($result);
$pending_properties=mysqli_fetch_all($result,MYSQLI_ASSOC);


$property_count= mysqli_num_rows($result1);
$properties=mysqli_fetch_all($result1,MYSQLI_ASSOC);

// to select sold properties
$sql="SELECT * FROM property_table WHERE owner_name='$username' AND property_status='sold'";
$result=mysqli_query($conn,$sql);

$sold_property_count= mysqli_num_rows($result);
$sold_properties=mysqli_fetch_all($result,MYSQLI_ASSOC);


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


$sql4="SELECT * FROM po_images WHERE propertyOwnerId='$id' LIMIT 1";
$result4=mysqli_query($conn,$sql4);
$images_count=mysqli_num_rows($result4);
$images=mysqli_fetch_assoc($result4);



//IMAGES

  $sql5="SELECT * FROM po_images WHERE propertyOwnerId='$id' LIMIT 1";
  $result5=mysqli_query($conn,$sql5);

  $images_count=mysqli_num_rows($result5);
  $images=mysqli_fetch_assoc($result5);


mysqli_free_result($result1);
mysqli_free_result($result);
mysqli_free_result($result2);
mysqli_free_result($result3);
mysqli_free_result($result4);
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
    <a href="po_profile.php">
    <span class="icon"><ion-icon name="person-outline"></ion-icon></ion-icon></span>
    <span class="title">Profile</span>   
    </a>
   </li>
   <li>
    <a href="po_transactions.php">
    <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
     <span class="title">Transactions</span>
    </a>
   </li>
   <li>
    <a href="po_booking.php">

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
  <div></div>
    </div>

    <!-- userimg -->
    <div class="user">
      <?php
      if($images_count>0){
       echo "<img src=\"{$images['img_dir']}\" class=\"img1\"alt=\"\">";
      } else{
        echo "<img src=\"images/default_profilepic.jpg\" class=\"img1\"alt=\"\">";
      }
      
      ?>
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
       <div class="numbers"><?php echo $accepted_property_count?></div>
       <div class="cardName">Accepted Properties</div>
      </div>

      <div class="iconBx">
       <ion-icon name="people-circle-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers">1504</div>
       <div class="cardName">Applications</div>
      </div>

      <div class="iconBx">
      <ion-icon name="pricetag-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers">1504</div>
       <div class="cardName">Bookings</div>
      </div>

      <div class="iconBx">
       <ion-icon name="people-outline"></ion-icon>
      </div>
     </div>
    </div>

    <div class="details">
     <div class="usersStats">
      <div class="cardHeader">
       <h2>All Properties</h2>
       <!-- <a href="add_property.php" class="btn">Add Property</a> -->
      </div>

    <!-- section content -->
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
           <!-- SOLD projects -->
        <?php foreach($sold_properties as $sold_property):?>
        <tr>
         <td><?php echo htmlspecialchars($sold_property['property_name']);?></td>
         <td><?php echo htmlspecialchars($sold_property['location']);?></td>
         <td><?php echo htmlspecialchars($sold_property['price']);?></td>
         <td><?php echo htmlspecialchars($sold_property['purpose']);?></td>          
         <td><span class="status sold"><?php echo htmlspecialchars($sold_property['property_status']);?></span></td>
         </tr>
        <?php endforeach;?>
        </tbody>
        </table>

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