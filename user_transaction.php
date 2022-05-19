<?php
include 'includes\db_config.php';

session_start();
$username=$_SESSION['userUid'];
$sql1= "SELECT * FROM book_tour WHERE user='$username' AND tour_status='not approved'";
$result1=mysqli_query($conn,$sql1);
$rejected_tour_count=mysqli_num_rows($result1);
$rejected_tours=mysqli_fetch_all($result1,MYSQLI_ASSOC);


$sql2= "SELECT * FROM book_tour WHERE user='$username' AND tour_status='approved'";
$result2=mysqli_query($conn,$sql2);
$accepted_tour_count=mysqli_num_rows($result2);
$accepted_tours=mysqli_fetch_all($result2,MYSQLI_ASSOC);

// $total_tours=$pending_tour_count+$accepted_tour_count+$rejected_tour_count;

// mysqli_free_result($result);
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
     <span class="icon"><ion-icon name="person-outline"></ion-icon></ion-icon></span>
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
    <a href="#">
     <span class="icon"><ion-icon name="person-outline"></ion-icon></ion-icon></span>
     <span class="title">Payments</span>
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
       <div class="numbers"></div>
       <div class="cardName">All Transactions</div>
      </div>

      <div class="iconBx">
       <ion-icon name="person-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"></div>
       <div class="cardName">pending transactions</div>
      </div>

      <div class="iconBx">
       <ion-icon name="people-circle-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"></div>
       <div class="cardName">accepted transactions</div>
      </div>

      <div class="iconBx">
      <ion-icon name="pricetag-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"></div>
       <div class="cardName">Rejected Transactions</div>
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
       <h2>Ongoing Transactions</h2>
      </div>

      <table>
       <thead>
        <tr>
        <td>Transaction ID</td>
        <td>Property Id</td>
        <td>Owner_name</td>
        <!-- <td>Time</td> -->
        <td>Status</td>
        </tr>
       </thead>
        <tbody>
      
        <!-- accepted tour -->
        <?php foreach($accepted_tours as $accepted_tour):?>
        <tr>
         <td><?php echo htmlspecialchars($accepted_tour['tour_id']);?></td>
         <td><?php echo htmlspecialchars($accepted_tour['property_id']);?></td>
         <td><?php echo htmlspecialchars($accepted_tour['owner_name']);?></td> 
         <td><span class="status delivered"><?php echo htmlspecialchars($accepted_tour['tour_status']);?></span></td>
         </tr>
        <?php endforeach;?>

        <!-- rejected properties -->
        <?php foreach($rejected_tours as $rejected_tour):?>
        <tr>
         <td><?php echo htmlspecialchars($rejected_tour['tour_id']);?></td>
         <td><?php echo htmlspecialchars($rejected_tour['property_id']);?></td>
         <td><?php echo htmlspecialchars($rejected_tour['owner_name']);?></td> 
         <td><span class="status rejected"><?php echo htmlspecialchars($rejected_tour['tour_status']);?></span></td>
         </tr>
        <?php endforeach;?>
       </table>

     </div>
     <div class="recentUsers">
      <div class="cardHeader">
       <h2>Do you wish to pay?</h2>
      </div>
      <table>

        <tr>
        <?php foreach($accepted_tours as $accepted_tour):?>
        <tr>
         <td><?php echo htmlspecialchars($accepted_tour['tour_id']);?></td>
         <td><?php echo htmlspecialchars($accepted_tour['property_id']);?></td>
         <?php echo " <td><a href='payment.php?id=".$accepted_tour['tour_id']."' class=\"status delivered\">Yes</a></td>"?>
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
</html> -->