<!-- admin page -->
<?php
include 'includes\db_config.php';

//number of agents
// to find all agents
$sql="SELECT * FROM usersagents ORDER BY agentId";
$result=mysqli_query($conn,$sql);

$agentcount= mysqli_num_rows($result);
$totalagents=mysqli_fetch_all($result,MYSQLI_ASSOC);


// Normal users
$sql2="SELECT * FROM users WHERE type='0' ORDER BY usersId";
$result2=mysqli_query($conn,$sql2);

$user_count= mysqli_num_rows($result2);
$users=mysqli_fetch_all($result2,MYSQLI_ASSOC);


// property owners
// properties owners
// to select the properties

$sql4="SELECT * FROM propertyowner";
$result4=mysqli_query($conn,$sql4);

$propertyowners_count= mysqli_num_rows($result4);
$owners=mysqli_fetch_all($result4,MYSQLI_ASSOC);

// all users
$totalusers=$agentcount+$user_count+$propertyowners_count;

mysqli_free_result($result);
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
       <h2>All Users</h2>
       <button type="Submit" class="btn" name="generate_reports">Download as PDF</button>

          </div>

      <table>
       <thead>
        <tr>
        <td>Name</td>
        <td>Email</td>
        <td>UserName</td>
        <td>Type</td>
        </tr>
       </thead>
        <tbody>
          <!-- normaluser -->
           <?php foreach($users as $user):?>
         <tr>
         <td><?php echo $user['userName']?></td>
         <td><?php echo $user['usersEmail']?></td>
         <td><?php echo $user['userUid']?></td>
         <td> <span class="status pending">Normal user</span> </td>
         <?php endforeach;?>
        </tr>
        
        <!-- agents -->
      <?php foreach($totalagents as $totalagent):?>
       <tr>
         <td><?php echo $totalagent['agentName'];?></td>
         <td><?php echo $totalagent['Email'];?></td>
         <td><?php echo $totalagent['username'];?></td>
         <td><span class="status rejected">Agent</span></td>
          <?php endforeach;?>
       </tr>
        
       <!-- property Owner -->
       <?php foreach($owners as $owners):?>
       <tr>
         <td><?php echo $owners['po_name'];?></td>
         <td><?php echo $owners['po_email'];?></td>
         <td><?php echo $owners['po_Uid'];?></td>
         <td><span class="status delivered">Property Owner</span></td>
        <?php endforeach;?>
       </tr>
         </tbody>
       </body>
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
</html>