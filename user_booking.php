<?php
include 'includes\db_config.php';

session_start();
$username=$_SESSION['userUid'];
$sql= "SELECT * FROM book_tour WHERE user='$username' AND tour_status= 'pending' ";
$result=mysqli_query($conn,$sql);
$pending_tour_count=mysqli_num_rows($result);
$pending_tours=mysqli_fetch_all($result,MYSQLI_ASSOC);

$sql1= "SELECT * FROM book_tour WHERE user='$username' AND tour_status='rejected'";
$result1=mysqli_query($conn,$sql1);
$rejected_tour_count=mysqli_num_rows($result1);
$rejected_tours=mysqli_fetch_all($result1,MYSQLI_ASSOC);


$sql2= "SELECT * FROM book_tour WHERE user='$username' AND tour_status='accepted'";
$result2=mysqli_query($conn,$sql2);
$accepted_tour_count=mysqli_num_rows($result2);
$accepted_tours=mysqli_fetch_all($result2,MYSQLI_ASSOC);

$total_tours=$pending_tour_count+$accepted_tour_count+$rejected_tour_count;

mysqli_free_result($result);
mysqli_free_result($result1);
mysqli_free_result($result2);

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
 <title>User tour requests page</title>
</head>
<body>
<div class="container">
   <div class="navigation">
  <!-- navigation links -->
  <ul>
   <li>
    <a href="#">
     <span class="icon"><ion-icon name="aperture-outline"></ion-icon></span>
     <span class="title">Hi  <?php echo $_SESSION['userUid']?></span>
    </a>
   </li>
   <li>
    <a href="user_dashboard.php">
     <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
     <span class="title">Dashboard</span>
    </a>
   </li>
   <li>
    <a href="user_booking.php">
     <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></ion-icon></span>
     <span class="title">Bookings</span>
    </a>
   </li>

     <li>
    <a href="user_transaction.php">
     <span class="icon"><ion-icon name="person-outline"></ion-icon></ion-icon></span>
     <span class="title">Transactions</span>
    </a>
   </li>


   <li>
    <a href="includes/logout.inc.php">
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
            <div></div>
     </label>
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
       <div class="numbers"><?php echo $total_tours?></div>
       <div class="cardName">All Bookings</div>
      </div>

      <div class="iconBx">
       <ion-icon name="person-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"><?php echo $pending_tour_count?></div>
       <div class="cardName">Pending Tours</div>
      </div>

      <div class="iconBx">
       <ion-icon name="people-circle-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"><?php echo $accepted_tour_count?></div>
       <div class="cardName">Accepted Tours</div>
      </div>

      <div class="iconBx">
      <ion-icon name="pricetag-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"><?php echo $rejected_tour_count?></div>
       <div class="cardName">Rejected Tours</div>
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
       <h2>All Booked Tours</h2>
      </div>

      <table>
       <thead>
        <tr>
        <td>Tour ID</td>
        <td>Property Id</td>
        <td>Owner_name</td>
        <td>Date</td>
        <td>Request</td>
        <td>Time</td>
        <td>Status</td>
        </tr>
       </thead>
        <tbody>
           <!-- pending tour -->
        <?php foreach($pending_tours as $pending_tour):?>
        <tr>
         <td><?php echo htmlspecialchars($pending_tour['tour_id']);?></td>
         <td><?php echo htmlspecialchars($pending_tour['property_id']);?></td>
         <td><?php echo htmlspecialchars($pending_tour['owner_name']);?></td>
         <td><?php echo htmlspecialchars($pending_tour['date']);?></td>        
         <td><?php echo htmlspecialchars($pending_tour['requests']);?></td>  
         <td><span class="status pending"><?php echo htmlspecialchars($pending_tour['tour_status']);?></span></td>
         </tr>
        <?php endforeach;?>
        
        <!-- accepted tour -->
        <?php foreach($accepted_tours as $accepted_tour):?>
        <tr>
         <td><?php echo htmlspecialchars($accepted_tour['tour_id']);?></td>
         <td><?php echo htmlspecialchars($accepted_tour['property_id']);?></td>
         <td><?php echo htmlspecialchars($accepted_tour['owner_name']);?></td>
         <td><?php echo htmlspecialchars($accepted_tour['date']);?></td>        
         <td><?php echo htmlspecialchars($accepted_tour['requests']);?></td>  
         <td><span class="status delivered"><?php echo htmlspecialchars($accepted_tour['tour_status']);?></span></td>
         </tr>
        <?php endforeach;?>

        <!-- rejected properties -->
        <?php foreach($rejected_tours as $rejected_tour):?>
        <tr>
         <td><?php echo htmlspecialchars($rejected_tour['tour_id']);?></td>
         <td><?php echo htmlspecialchars($rejected_tour['property_id']);?></td>
         <td><?php echo htmlspecialchars($rejected_tour['owner_name']);?></td>
         <td><?php echo htmlspecialchars($rejected_tour['date']);?></td>        
         <td><?php echo htmlspecialchars($rejected_tour['requests']);?></td>  
         <td><span class="status rejected"><?php echo htmlspecialchars($rejected_tour['tour_status']);?></span></td>
         </tr>
        <?php endforeach;?>
       </table>

     </div>
     <div class="recentUsers">
      <div class="cardHeader">
       <h2>Do you Want to Purchase?</h2>
       <!-- <a href="#" class="btn">View All</a> -->
      </div>
      <table>

        <tr>
        <?php foreach($accepted_tours as $accepted_tour):?>
        <tr>
         <td><?php echo htmlspecialchars($accepted_tour['tour_id']);?></td>
         <td><?php echo htmlspecialchars($accepted_tour['property_id']);?></td>
         <?php echo " <td><a href='interested.php?id=".$accepted_tour['tour_id']."' class=\"status delivered\">Yes</a></td>"?>
          <?php echo "<td><a href='notinterested.php?id=".$accepted_tour['tour_id']."' class=\"status rejected\">No</a></td>"?>
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