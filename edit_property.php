<?php

session_start();

include 'includes\db_config.php';
 $propertyName=$description=$location=$price=$area=$bed=$bath=$purpose=$propertyType="";

 //create the errors array
 $errors= array('propertyName'=>'', 'description'=>'','location'=>'','price'=>'','area'=>'','bed'=>'','bath'=>'');

// validating the form
if (isset($_POST['property_submit'])){

 if(empty($_POST['propertyName'])){
  $errors['propertyName']='an property name is required'.'<br/>';
 }else{
  $propertyName=$_POST['propertyName'];
  if(!preg_match('/^[a-zA-Z\s]+$/',$propertyName)){
    $errors['propertyName']='Property Name must be letters and spaces only' .'<br/>';
  }else{
  $propertyName=$_POST['propertyName'];
  $sql1="SELECT * FROM property_table WHERE property_name='$propertyName'";
  $result=mysqli_query($conn,$sql1);
  $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
      $errors['propertyName']='property already exists' .'<br/>';
    }
  }
 
}

 if(empty($_POST['price'])){
   $errors['price']='a price is required';
  }
  else{
   $price=$_POST['price'];
   if(!preg_match('/^[0-9]+$/',$price)){
    $errors['price']='Enter more than one digit';
   }
  }


 if(empty($_POST['location'])){
   $errors['location']='a location is required';
  }
  else{
   $location=$_POST['location'];
   if(!preg_match('/[^A-Za-z0-9]+/',$location)){
    $errors['location']='accepts numbers letters numbers and special characters only';
   }
  } 

  if(empty($_POST['description'])){
    $errors['description']='please enter a description'.'</br>';
  } else{
   $about=$_POST['description'];

    $errors['description']='';
  }

 if(empty($_POST['area'])){
   $errors['area']='an area value is required';
  }
  else{
   $price=$_POST['area'];
   if(!preg_match('/^[0-9]*$/',$area)){
    $errors['area']='Enter more than one digit';
   }
  }

   if(empty($_POST['bed'])){
   $errors['bed']='an bed value is required';
  }
  else{
   $price=$_POST['bed'];
   if(!preg_match('/^[0-9]*$/',$bed)){
    $errors['bed']='Enter more than one digit';
   }
  }

    if(empty($_POST['bath'])){
   $errors['bath']='an bath value is required';
  }
  else{
   $price=$_POST['bath'];
   if(!preg_match('/^[0-9]*$/',$bath)){
    $errors['bath']='Enter more than one digit';
   }
  }

 $purpose=$_POST['purpose'];
 $propertyType=$_POST['propertyType'];


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

 //override the variables from before
 $propertyName= mysqli_real_escape_string($conn,$_POST['propertyName']);
 $description= mysqli_real_escape_string($conn,$_POST['description']);
 $location= mysqli_real_escape_string($conn,$_POST['location']);
 $price= mysqli_real_escape_string($conn,$_POST['price']);
 $area= mysqli_real_escape_string($conn,$_POST['area']);
 $bed= mysqli_real_escape_string($conn,$_POST['bed']);
 $bath= mysqli_real_escape_string($conn,$_POST['bath']);
 $purpose= mysqli_real_escape_string($conn,$_POST['purpose']);
 $propertyType= mysqli_real_escape_string($conn,$_POST['propertyType']);

 $sql="INSERT INTO property_table(property_name,	description,purpose,	location,property_Type,price,	area,bedrooms,bathrooms,	owner_name,property_status) VALUES ('$propertyName','$description','$purpose','$location','$propertyType','$price','$area','$bed','$bath','$propertyOwner','pending');";

 if(mysqli_query($conn,$sql)){
  header("Location:image_property.php");
 } else{

  echo 'query error'. mysqli_error($conn);
 }
}
mysqli_free_result($result);
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
 <title>Add property Form</title>
</head>
<body>

<h1 class="formtitle">Add <span class="orange">Property</span></h1>
 
 <form action="add_property.php" method="POST">

 <label for="propertyname">PropertyName</label>
 <input type="text" name="propertyName" placeholder="Property Name...">
  <div class="errors"><?php echo $errors['propertyName']?></div>

 <label for="description">Description</label>
 <textarea name="description" id="about" cols="30" rows="10" placeholder="Description...." value="<?php echo htmlspecialchars($description)?>"></textarea>
<div class="errors"><?php echo $errors['description']?></div>

 <label for="purpose">Purpose</label>
 <select name="purpose" id="purpose">
  <option value="for-sale">for-sale</option>
  <option value="for-rent">for-rent</option>
 </select>

<label for="propertyType">Property Type</label>
<select name="propertyType" id="propertyType">
  <option value="Apartment">Apartment</option>
  <option value="House">House</option>
  <option value="Bungalow">Bungalow</option>
  <option value="Condo">Condo</option>
 </select>

 <br>
 <label for="Location">Location</label>
 <input type="text" name="location" placeholder="location">
 <div class="errors"><?php echo $errors['location']?></div>

 <label for="price">Price</label>
 <input type="text" name="price" placeholder="Property Price">
  <div class="errors"><?php echo $errors['price']?></div>

 <label for="Area">Area</label>
 <input type="text" name="area" placeholder="Area in sqrft">
  <div class="errors"><?php echo $errors['area']?></div>

 <label for="Beds">Bedrooms</label>
 <input type="text" name="bed" placeholder="Number of bedrooms...">
  <div class="errors"><?php echo $errors['bed']?></div>

 <label for="Bath">Bathrooms</label>
 <input type="text" name="bath" placeholder="Number of bathrooms...">
  <div class="errors"><?php echo $errors['bath']?></div>

 <button type="submit" name="property_submit">Submit</button>
 </form>


</body>
</html>