<!-- admin page -->
<?php
include 'includes\db_config.php';

//number of agents
// to find all agents
$sql="SELECT * FROM agent_profile ORDER BY agentNo ";
$result=mysqli_query($conn,$sql);

$agentcount= mysqli_num_rows($result);
$totalagents=mysqli_fetch_all($result,MYSQLI_ASSOC);

// to find all the properties
$sql1="SELECT * FROM property_table ORDER BY property_id";
$result1=mysqli_query($conn,$sql1);

$property_count= mysqli_num_rows($result1);
$properties=mysqli_fetch_all($result1,MYSQLI_ASSOC);

//to find the number of users
$sql2="SELECT * FROM users ORDER BY usersId";
$result2=mysqli_query($conn,$sql2);

$user_count= mysqli_num_rows($result2);
$users=mysqli_fetch_all($result2,MYSQLI_ASSOC);

// properties owners
// to select the properties

$sql4="SELECT * FROM propertyowner";
$result4=mysqli_query($conn,$sql4);

$propertyowners_count= mysqli_num_rows($result4);
$owners=mysqli_fetch_all($result4,MYSQLI_ASSOC);


mysqli_free_result($result);
mysqli_free_result($result1);
mysqli_free_result($result2);
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
 <title>Report Generation page</title>
</head>
<body>
  <div class="container">
   <div class="navigation">
  <!-- navigation links -->
  <ul>
   <li>
    <a href="#">
     <span class="icon"><ion-icon name="aperture-outline"></ion-icon></span>
     <span class="title">Admin Name</span>
    </a>
   </li>
   <li>
    <a href="admin.php">
     <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
     <span class="title">Dashboard</span>
    </a>
   </li>
   <li>
    <a href="admin_users.php">
     <span class="icon"><ion-icon name="person-outline"></ion-icon></ion-icon></span>
     <span class="title">Users</span>
    </a>
   </li>
   <li>
    <a href="admin_property.php">
     <span class="icon"><ion-icon name="pricetag-outline"></ion-icon></span>
     <span class="title">Properties</span>
    </a>
   </li>
   <li>
    <a href="admin_agents.php">
     <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span>
     <span class="title">Agents</span>
    </a>
   </li>
   <li>
    <a href="admin_reports.php">
     <span class="icon"><ion-icon name="analytics-outline"></span>
     <span class="title">Reports</ion-icon></span>
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
      <input type="text" placeholder="Search here">
      <ion-icon name="search-outline"></ion-icon>
     </label>
    </div>

    <!-- userimg -->
    <div class="user">
     <img src="images\pic-1.png" alt="image1">
    </div>
    </div>

  

    <!-- section content -->
   
     <div class="profile_details">
     <div class="profilediv">
      <div class="cardHeader">
       <h2>Generated reports</h2>
      </div>

      <table>
       <thead>
        <tr>
        <td>Report Name</td>
        <td>Action</td>
        </tr>
       </thead>
        <tbody>
         <tr>
        <td>All Users</td>
        <td><a href="z_all_users.php">View</a></td>
        </tr>
        <tr>
        <td>Properties for each propertyOwner</td>
        <td><a href="z_poform.php">View</a></td>
        </tr>
        <tr>
        <td>Property Tours</td>
        <td><a href="#">View</a></td>
        </tr>
        <tr>
        <td>Property prices per location</td>
        <td><a href="z_locationavform.php">View</a></td>
        </tr>
        <tr>
        <td>Transactions</td>
        <td><a href="#">View</a></td>
        </tr>
        <tr>
        <td>Property Tour vs Property Purchase Statistics</td>
        <td><a href="#">View</a></td>
        </tr>
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