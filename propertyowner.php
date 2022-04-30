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

//to select accepted properties
$sql2="SELECT * FROM property_table WHERE owner_name='$username' AND property_status='accepted'";
$result2=mysqli_query($conn,$sql2);

$accepted_property_count= mysqli_num_rows($result2);
$accepted_properties=mysqli_fetch_all($result2,MYSQLI_ASSOC);

mysqli_free_result($result1);
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

    <!-- section content -->
    <div class="details">
     <div class="usersStats">
      <div class="cardHeader">
       <h2>All Properties</h2>
       <a href="#" class="btn">See All</a>
      </div>

      <table>
       <thead>
        <tr>
        <td>Name</td>
        <td>Price</td>
        <td>Payment</td>
        <td>Status</td>
        </tr>
       </thead>
        <tbody>
        <?php foreach($properties as $property):?>
         <td><?php echo htmlspecialchars($property['property_id']);?></td>
         <td><?php echo htmlspecialchars($property['location']);?></td>
         <td><?php echo htmlspecialchars($property['price']);?></td>
         <td><?php echo htmlspecialchars($property['purpose']);?></td>
         <?php echo "<td><a href='property_delete.php?id=".$property['property_id']."'><ion-icon name=\"trash-outline\"></ion-icon></a><a href='edit_property.php?id=".$property['property_id']."''><ion-icon name=\"create-outline\"></ion-icon></a></td>";?> 
         <td><span class="status delivered"><?php echo htmlspecialchars($property['property_status']);?></span></td>
        </tr>
        <?php endforeach;?>
         </tbody>
       </body>
      </table>
     </div>   
     
     <!-- New Customers -->
     <!-- <div class="recentUsers">
      <div class="cardHeader">
       <h2></h2>
       <a href="#" class="btn"></a>
      </div>
      <table>
        <!-- <tr>
         <td width="60px"><div class="imgBx"><img src="images\pic-1.png" alt="profile pic 1"></div></td>
         <td><h4>David <br> <span>Italy</span></h4></td>
        </tr>
        <tr>
         <td width="60px"><div class="imgBx"><img src="images\pic-1.png" alt="profile pic 1"></div></td>
         <td><h4>David <br> <span>Italy</span></h4></td>
        </tr>
        <tr>
         <td width="60px"><div class="imgBx"><img src="images\pic-1.png" alt="profile pic 1"></div></td>
         <td><h4>David <br> <span>Italy</span></h4></td>
        </tr>
        <tr>
         <td width="60px"><div class="imgBx"><img src="images\pic-1.png" alt="profile pic 1"></div></td>
         <td><h4>David <br> <span>Italy</span></h4></td>
        </tr>
        <tr>
         <td width="60px"><div class="imgBx"><img src="images\pic-1.png" alt="profile pic 1"></div></td>
         <td><h4>David <br> <span>Italy</span></h4></td>
        </tr>
        </tr> -->
       </table>

     </div>
    </div> -->

   </div>
  </div>

  <!-- top row  -->

<!-- ionicons script -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="admin.js"></script>
</body>
</html>