<?php
include 'includes\db_config.php';
session_start();
$username=$_SESSION['po_Uid'];
$id=$_SESSION['po_id'];

$sql="SELECT * FROM book_tour WHERE owner_name='$username' AND tour_status='yes'";
$result=mysqli_query($conn,$sql);

$pending_booking_count= mysqli_num_rows($result);
$pending_bookings=mysqli_fetch_all($result,MYSQLI_ASSOC);

//to select accepted bookings
$sql2="SELECT * FROM book_tour WHERE owner_name='$username' AND tour_status='approved'";
$result2=mysqli_query($conn,$sql2);

$accepted_booking_count= mysqli_num_rows($result2);
$accepted_bookings=mysqli_fetch_all($result2,MYSQLI_ASSOC);

//to select rejected properties
$sql3="SELECT * FROM book_tour WHERE owner_name='$username' AND tour_status='not approved'";
$result3=mysqli_query($conn,$sql3);

$rejected_booking_count= mysqli_num_rows($result3);
$rejected_bookings=mysqli_fetch_all($result3,MYSQLI_ASSOC);

$bookings_count=$accepted_booking_count+$rejected_booking_count+$pending_booking_count;

//images
$sql4="SELECT * FROM po_images WHERE propertyOwnerId='$id' LIMIT 1";
$result4=mysqli_query($conn,$sql4);
$images_count=mysqli_num_rows($result4);
$images=mysqli_fetch_assoc($result4);




// mysqli_free_result($result1);
// mysqli_free_result($result);
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
       <div class="numbers"><?php echo htmlspecialchars($bookings_count);?></div>
       <div class="cardName">All Transactions</div>
      </div>

      <div class="iconBx">
       <ion-icon name="person-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"><?php echo htmlspecialchars($accepted_booking_count);?></div>
       <div class="cardName">Approved transactions</div>
      </div>

      <div class="iconBx">
       <ion-icon name="people-circle-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"><?php echo htmlspecialchars($rejected_booking_count);?></div>
       <div class="cardName">Rejected transactions</div>
      </div>

      <div class="iconBx">
      <ion-icon name="pricetag-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"><?php echo htmlspecialchars($pending_booking_count);?></div>
       <div class="cardName">Pending Transactions</div>
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
       <h2>All Transactions</h2>
      </div>

      <table>
       <thead>
        <tr>
        <td>Booking Id</td>
        <td>Property Id</td>
        <td>UserName</td>
        <td>Request</td>
        <td>Status</td>
        </tr>
       </thead>
        <tbody>
         <tr>
           <!-- pending transactions-->
        <?php foreach($pending_bookings as $pending_booking):?>
        <tr>
         <td><?php echo htmlspecialchars($pending_booking['tour_id'])?></td>
         <td><?php echo htmlspecialchars($pending_booking['property_id']);?></td>
         <td><?php echo htmlspecialchars($pending_booking['user']);?></td>
         <td><?php echo htmlspecialchars($pending_booking['requests']);?></td>
        
         <td><span class="status pending"><?php echo htmlspecialchars($pending_booking['tour_status']);?></span></td>
         </tr>
        <?php endforeach;?>
        
        <!-- approved Transactions -->
        <?php foreach($accepted_bookings as $accepted_booking):?>
        <tr>
         <td><?php echo htmlspecialchars($accepted_booking['tour_id']);?></td>
         <td><?php echo htmlspecialchars($accepted_booking['property_id']);?></td>
         <td><?php echo htmlspecialchars($accepted_booking['user']);?></td>
         <td><?php echo htmlspecialchars($accepted_booking['requests']);?></td> 
        <td><span class="status delivered"><?php echo htmlspecialchars(($accepted_booking['tour_status']));?></span></td>
         </tr>
        <?php endforeach;?>

        <!-- disapproved transactions -->
        <?php foreach($rejected_bookings as $rejected_booking):?>
        <tr>
         <td><?php echo htmlspecialchars($rejected_booking['tour_id']);?></td>
         <td><?php echo htmlspecialchars($rejected_booking['property_id']);?></td>
         <td><?php echo htmlspecialchars($rejected_booking['user']);?></td>
         <td><?php echo htmlspecialchars($rejected_booking['requests']);?></td>
         <td><span class="status rejected"><?php echo htmlspecialchars($rejected_booking['tour_status']);?></span></td>
         </tr>
        <?php endforeach;?>
       </table>

     </div>
     <div class="recentUsers">
      <div class="cardHeader">
       <h2>Ongoing transactions</h2>
       <!-- <a href="#" class="btn">View All</a> -->
      </div>
      <table>
        <tr>
         <?php foreach($pending_bookings as $pending_booking):?>
        <tr>
         <td><?php echo htmlspecialchars($pending_booking['tour_id']);?></td>
         <br>
         <td><?php echo htmlspecialchars($pending_booking['user']);?></td>
        </td>
         <?php echo "<td><a href='approved.php?id=".$pending_booking['tour_id']."&po_id=".$pending_booking['property_id']."'><span class=\"status delivered\">Approve</span></a></td>"?>
         <?php echo "<td><a href='notapproved.php?id=".$pending_booking['tour_id']."'><span class=\"status rejected\">Reject</span></a></td>"?>
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