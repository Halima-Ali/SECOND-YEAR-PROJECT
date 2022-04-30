<!-- where the agents will be displayed -->
<?php
include 'includes\db_config.php';

$sql= "SELECT * FROM agent_profile WHERE status=\"pending\" ORDER BY agentId";

$result=mysqli_query($conn,$sql);

$rowcount= mysqli_num_rows($result);

$agents=mysqli_fetch_all($result,MYSQLI_ASSOC);


// to find all agents
$sql1="SELECT * FROM agent_profile ORDER BY agentId";
$result1=mysqli_query($conn,$sql1);

$agentcount= mysqli_num_rows($result1);
$totalagents=mysqli_fetch_all($result1,MYSQLI_ASSOC);

//accepted agents
$sql2="SELECT * FROM agent_profile WHERE status=\"accepted\" ORDER BY agentId";
$result2=mysqli_query($conn,$sql2);

$accepted_count= mysqli_num_rows($result2);
$accepted_agents=mysqli_fetch_all($result2,MYSQLI_ASSOC);

// rejected agents
$sql3="SELECT * FROM agent_profile WHERE status=\"rejected\" ORDER BY agentId";
$result3=mysqli_query($conn,$sql3);

$rejected_count= mysqli_num_rows($result3);
$rejected_agents=mysqli_fetch_all($result3,MYSQLI_ASSOC);


mysqli_free_result($result);
mysqli_free_result($result1);
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
 <title>Agents info</title>
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
    <a href="#">
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

    <!-- top bar -->
    <div class="cardBox">
     <div class="card">
      <div>
       <div class="numbers"><?php echo $agentcount?> </div>
       <div class="cardName">All Agents</div>
      </div>

      <div class="iconBx">
       <ion-icon name="people-circle-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
        <!-- <div class="numbers">1504</div> -->
       <div class="numbers"><?php echo $rowcount?> </div>
       <div class="cardName">Pending Agents</div>
      </div>

      <div class="iconBx">
       <ion-icon name="hourglass-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"><?php echo $accepted_count?></div>
       <div class="cardName">Accepted Agents</div>
      </div>

      <div class="iconBx">
     <ion-icon name="checkmark-circle-outline"></ion-icon>
      </div>
     </div>

         <div class="card">
      <div>
       <div class="numbers"><?php echo $rejected_count?></div>
       <div class="cardName">Rejected</div>
      </div>

      <div class="iconBx">
      <ion-icon name="close-circle-outline"></ion-icon>
      </div>
     </div>
    </div>

    <!-- section content -->
    <div class="details">
     <div class="usersStats">
      <div class="cardHeader">
       <h2>Pending Agents</h2>
       <a href="#" class="btn">View All</a>
      </div>

      <table>
       <thead>
        <tr>
        <td>AgentId</td>
        <td>Agent Name</td>
        <td>Company</td>
        <td>Action1</td>
        <td>Action2</td>
        <td>Status</td>
        </tr>
       </thead>
        <tbody>
          <?php foreach($agents as $agent):?>
         <tr>
         <td><?php echo htmlspecialchars($agent['agentId']);?></td>
         <td><?php echo htmlspecialchars($agent['agent_name']);?></td>
         <td><?php echo htmlspecialchars($agent['company']);?></td>
         <td><a href="propertyValidate.php"><span class="status delivered">Accepted</span></a></td>
        <td><a href="propertyValidate.php"><span class="status rejected">Rejected</span></a></td> 
         <td><span class="#"><?php echo htmlspecialchars($agent['status']);?></span></td>
        </tr>
        <?php endforeach; ?>
         </tbody>
       </body>
      </table>
     </div>   
     
     <!-- New Customers -->
     <div class="recentUsers">
      <div class="cardHeader">
       <h2>All Agents</h2>
       <a href="#" class="btn">View All</a>
      </div>
      <table>
        <?php foreach($totalagents as $totalagent):?>
        <tr>
         <td width="60px"><div class="imgBx"><img src="images\pic-1.png" alt="profile pic 1"></div></td>
         <td><h4><?php echo htmlspecialchars($totalagent['agent_name']);?><br> <span><?php echo htmlspecialchars($totalagent['company']);?></span></h4></td>
        </tr>
         <?php endforeach; ?>
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