<?php

session_start();

include 'includes\db_config.php';
 $propertyName=$description=$location=$price=$area=$bed=$bath=$purpose=$propertyType="";

 //create the errors array
 $errors= array('fullName'=>'', 'description'=>'','phone'=>'','email'=>'','ln'=>'');

// validating the form
if (isset($_POST['po_profile_submit'])){

 if(empty($_POST['fullName'])){
  $errors['fullName']='an full Name is required'.'<br/>';
 }else{
  $fullName=$_POST['fullName'];
  if(!preg_match('/^[a-zA-Z\s]+$/',$fullName)){
    $errors['fullName']='Full Name must be letters and spaces only' .'<br/>';
  }
}

  if(empty($_POST['description'])){
    $errors['description']='please enter a description'.'</br>';
  } else{
   $about=$_POST['description'];

    $errors['description']='';
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

  if(empty($_POST['phone'])){
   $errors['phone']='a phone number is required';
  }
  else{
   $phone=$_POST['phone'];
   if(!preg_match('/^([0]{1}[0-9]{9})?$/',$phone)){
    $errors['phone']='start with a zero and enter just 10 numbers';
   }
  }

  if(empty($_POST['linkedIn'])){
  $errors['ln']='field required';
  }
  else{
   $ln=$_POST['linkedIn'];
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

 $propertyOwner=$_SESSION['po_Uid'];
 $propertyOwnerId=$_SESSION['po_id'];

 // //override the variables from before
 $fullName=mysqli_real_escape_string($conn,$_POST['fullName']);
 $description=mysqli_real_escape_string($conn,$_POST['description']);
 $phone=mysqli_real_escape_string($conn,$_POST['phone']);
 $email=mysqli_real_escape_string($conn,$_POST['email']);
 $ln=mysqli_real_escape_string($conn,$_POST['linkedIn']);


$id=$_SESSION['po_id'];
$sql="SELECT * FROM po_profile WHERE propertyOwnerId='$id'";
$result1=mysqli_query($conn,$sql);
$profile_count= mysqli_num_rows($result1);
 
if($profile_count>0){
  $sql1="DELETE FROM po_images WHERE propertyOwnerId='$propertyOwnerId'";
  $sql="UPDATE po_profile SET propertyOwnerId='$propertyOwnerId',po_name='$propertyOwner',fullName='$fullName',description='$description',phone='$phone',email='$email',ln='$ln' WHERE propertyOwnerId='$propertyOwnerId' ";
  if(mysqli_query($conn,$sql1)){
 } else{
  echo 'query error'. mysqli_error($conn);
 }
  
 if(mysqli_query($conn,$sql)){
  header("Location:po_imageupload.php");
 } else{

  echo 'query error'. mysqli_error($conn);
 }
} else{ 
 $sql="INSERT INTO po_profile(propertyOwnerId, po_name,fullName,	description,phone ,email, ln) VALUES ('$propertyOwnerId','$propertyOwner','$fullName','$description','$phone','$email','$ln');";
  if(mysqli_query($conn,$sql)){
  header("Location:po_imageupload.php");
 } else{

  echo 'query error'. mysqli_error($conn);
 }
}



}
// mysqli_free_result($result);
mysqli_close($conn);
}


?>






<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="agents.css">
 <title>Edit Profile Page</title>
</head>
<body>

<h1 class="formtitle">Edit <span class="orange">Profile</span></h1>
 
 <form action="po_editprofileform.php" method="POST">

 <label for="fullname">Full Name</label>
 <input type="text" name="fullName" placeholder="Full Name...">
  <div class="errors"><?php echo $errors['fullName']?></div>

 <label for="description">About You</label>
 <textarea name="description" id="about" cols="30" rows="10" placeholder="Tell me about yourself...." value="<?php echo htmlspecialchars($description)?>"></textarea>
<div class="errors"><?php echo $errors['description']?></div>

 <label for="purpose">Contact Information</label>
 <input type="text" name="phone" placeholder="Phone Number" >
 <div class="errors"><?php echo $errors['phone']?></div>
 <input type="text" name="email" placeholder="Email">
 <div class="errors"><?php echo $errors['email']?></div>
 <input type="text" name="linkedIn" placeholder="LinkedIn">
 <div class="errors"><?php echo $errors['ln']?></div>

 <button type="submit" name="po_profile_submit">Submit</button>
 </form>


</body>
</html>