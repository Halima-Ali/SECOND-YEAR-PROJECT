<!-- user dashboard -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
 <title>Responsive User Dashboard</title>
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
     <img src="images\pic-1.png" alt="image1">
    </div>
    </div>

    <!-- top bar -->
    <div class="cardBox">
     <div class="card">
      <div>
       <div class="numbers"></div>
       <div class="cardName">Transactions</div>
      </div>

      <div class="iconBx">
       <ion-icon name="person-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"></div>
       <div class="cardName">All Bookings</div>
      </div>

      <div class="iconBx">
      <ion-icon name="pricetag-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"></div>
       <div class="cardName">Accepted Bookings</div>
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
       <h2>Admin Dashboard</h2>
      </div>
      <ul>
        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, ipsa at! Vel, culpa. Molestias, vel?</li>
        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, ipsa at! Vel, culpa. Molestias, vel?</li>
        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, ipsa at! Vel, culpa. Molestias, vel?</li>
      </ul>
 
     </div>   
     
     <!-- New Customers -->
     <div class="recentUsers">
      <div class="cardHeader">
       <h2>Recent Customers</h2>
       <a href="#" class="btn">View All</a>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo, beatae adipisci? Repellendus consequatur illum, pariatur distinctio accusantium autem ab eius!</p>
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