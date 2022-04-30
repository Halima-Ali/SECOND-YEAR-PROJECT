<!-- agents page -->
<?php
session_start();

include 'includes\db_config.php';
 $agentname=$agentemail= $about= $company=$phone=$ig=$ln='';

 //create the errors array
 $errors= array('name'=>'', 'email'=>'','about'=>'','company'=>'','phone'=>'','ig'=>'','ln'=>'');

// validating the form
if (isset($_POST['profile_submit'])){

 if(empty($_POST['name'])){
  $errors['name']='an name is required'.'<br/>';
 }else{
  $agentname=$_POST['name'];
  if(!preg_match('/^[a-zA-Z\s]+$/',$agentname)){
    $errors['name']='Title must be letters and spaces only' .'<br/>';
   }
 }

 if(empty($_POST['email']))
  {
   $errors['email']='an email is required'.'<br/>';
  }
  else{
   $agentemail=$_POST['email'];
   //echo htmlspecialchars($_POST['email']);
   //we want to check if its actually an email
   if(!filter_var($agentemail, FILTER_VALIDATE_EMAIL))//takes to argumet, the filter 
   //and the type of filter we want to apply in this case FILTER_VALIDATE_EMAIL is abuilt in filter in php
   { 
     $errors['email']='email must be a valid email address'.'</br>';
   }
  }

  if(empty($_POST['about'])){
    $errors['about']='please enter a description'.'</br>';
  } else{
   $about=$_POST['about'];

    $errors['about']='';
  }

  if(empty($_POST['company'])){
   $errors['company']='a Company name required';
  }
  else{
   $company=$_POST['company'];

    $errors['company']='';
  }

  if(empty($_POST['phone'])){
   $errors['phone']='a phone number is required';
  }
  else{
   $phone=$_POST['phone'];
   if(!preg_match('/^([0]{1}[0-9]{9})?$/',$phone)){
    $errors['phone']='start with a zero and enter just 10 numbers';
   }
  }

  if(empty($_POST['instagram']) || empty($_POST['linkedin'])){
   $errors['ig']=$errors['ln']='field required';
  }
  else{
   $ig=$_POST['instagram'];
   $ln=$_POST['linkedin'];
  }

  //filters an array with a callback function
//we can define the call back function in here
//if no error it will return to false
//if there is an erro returns  true
if(array_filter($errors)){
// echo 'there are errors here'; we want to do nothing here
}
else{
 //echo 'form is valid';
//we want to save the data to the database
 //overriding email variable from brfore

 $agentId=$_SESSION['agentId'];

 //override the variables from before
 $agentname= mysqli_real_escape_string($conn, $_POST['name']);
 $agentemail= mysqli_real_escape_string($conn, $_POST['email']);
 $about= mysqli_real_escape_string($conn, $_POST['about']);
 $company= mysqli_real_escape_string($conn, $_POST['company']);
 $phone= mysqli_real_escape_string($conn, $_POST['phone']);
 $ig= mysqli_real_escape_string($conn, $_POST['instagram']);
 $ln= mysqli_real_escape_string($conn, $_POST['linkedin']);

 $sql= "INSERT INTO agent_profile(agent_name,agent_email,company,phone,instagram,linkedin,agentId,status,description) VALUES('$agentname','$agentemail','$company','$phone','$ig','$ln','$agentId','pending','$about');";

 if(mysqli_query($conn,$sql)){
  header("Location:agents_profile.php");
 } else{

  echo 'query error'. mysqli_error($conn);
 }
}
//end of validation  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="agents.css">
 <title>Agents Register</title>
</head>
<body>

<h1 class="formtitle">Personal <span class="orange">details</span></h1>
 
 <form action="agents_profileform.php" method="POST">
 <label for="Profile">Profile Image</label>
 <input type="file" name="profile_img">

 <label for="name">Full Name</label>
 <input type="text" name="name" placeholder="Your Name" value="<?php echo htmlspecialchars($agentname)?>">
 <div class="errors"><?php echo $errors['name']?></div>

 <label for="email">Email Address</label>
 <input type="email" name="email" placeholder="Email address" value="<?php echo htmlspecialchars($agentemail)?>">
 <div class="errors"><?php echo $errors['email']?></div>

 <label for="description">About Me</label>
 <textarea name="about" id="about" cols="30" rows="10" placeholder="Description...." value="<?php echo htmlspecialchars($about)?>"></textarea>
 <div class="errors"><?php echo $errors['about']?></div>

 <label for="company">Company Name</label>
 <input type="text" name="company" placeholder="Company Name...." value="<?php echo htmlspecialchars($company)?>">
 <div class="errors"><?php echo $errors['company']?></div>

 <label for="contact">Contact information</label>
 <input type="text" name="phone" placeholder="Phone Number" value="<?php echo htmlspecialchars($phone)?>">
 <div class="errors"><?php echo $errors['phone']?></div>
 <input type="text" name="instagram" placeholder="Instagram username" value="<?php echo htmlspecialchars($ig)?>">
 <div class="errors"><?php echo $errors['ig']?></div>
 <input type="text" name="linkedin" placeholder="Linked in userName" value="<?php echo htmlspecialchars($ln)?>">
 <div class="errors"><?php echo $errors['ln']?></div>

 <button type="submit" name="profile_submit">Submit</button>
 </form>


</body>
</html>
