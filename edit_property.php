<?php

session_start();


  // echo $id;
  // echo $name;
include 'includes\db_config.php';

  $id=$_GET['id'];
  // $name=$_GET['name'];
 $propertyName=$description=$location=$price=$area=$bed=$bath=$purpose=$propertyType=$amenities=$cyclists=$commute_time=$nearby_facilities='';

 //create the errors array
 $errors= array('propertyName'=>'', 'description'=>'','location'=>'','price'=>'','area'=>'','bed'=>'','bath'=>'','amenities'=>'','cyclists'=>'','commute_time'=>'','nearby_facilities'=>'');

// validating the form
if (isset($_POST['editproperty_submit'])){

 if(empty($_POST['propertyName'])){
  $errors['propertyName']='an property name is required'.'<br/>';
 }else{
  $propertyName=$_POST['propertyName'];
  if(!preg_match('/^[a-zA-Z\s]+$/',$propertyName)){
    $errors['propertyName']='Property Name must be letters and spaces only' .'<br/>';
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

  // commute time
     if(empty($_POST['commute_time'])){
   $errors['commute_time']='an commute_time value is required';
  }
  else{
   $commute_time=$_POST['commute_time'];
   if(!preg_match('/^[0-9]*$/',$commute_time)){
    $errors['commute_time']='Enter more than one digit';
   }
  }

  // nearby facilities
    if(empty($_POST['nearby_facilities'])){
    $errors['nearby_facilities']='please enter a nearby_facilities description'.'</br>';
  } else{
   $nearby_facilities=$_POST['nearby_facilities'];

    $errors['nearby_facilities']='';
  }

  //Joggers safety
  if(empty($_POST['cyclists'])){
    $errors['cyclists']='please enter a  description'.'</br>';
  } else{
   $cyclists=$_POST['cyclists'];

    $errors['cyclists']='';
  }

 if(empty($_POST['area'])){
   $errors['area']='an area value is required';
  }
  else{
   $area=$_POST['area'];
   if(!preg_match('/^[0-9]*$/',$area)){
    $errors['area']='Enter more than one digit';
   }
  }

   if(empty($_POST['bed'])){
   $errors['bed']='an bed value is required';
  }
  else{
   $bed=$_POST['bed'];
   if(!preg_match('/^[0-9]*$/',$bed)){
    $errors['bed']='Enter more than one digit';
   }
  }

    if(empty($_POST['bath'])){
   $errors['bath']='an bath value is required';
  }
  else{
   $bath=$_POST['bath'];
   if(!preg_match('/^[0-9]*$/',$bath)){
    $errors['bath']='Enter more than one digit';
   }
  }

 $purpose=$_POST['purpose'];
 $propertyType=$_POST['propertyType'];

//  amenities
if(empty($_POST['amenities']))
  {
   $errors['amenities']= 'at least one amenity is required'.'<br/>';
  }
  else{
    $amenities=$_POST['amenities'];
   if(!preg_match('/(^[a-zA-Z\s]+)(,s*[a-zA-Z\s]*)+$/',$amenities)){
     $errors['amenities']='amenities must be a comma separated list';
    //preg_match takes 2 arguments , the regex and the variable
    // echo htmlspecialchars($_POST['title']);
   }      
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
 $commute_time=mysqli_real_escape_string($conn,$_POST['commute_time']);
 $nearby_facilities=mysqli_real_escape_string($conn,$_POST['nearby_facilities']);
 $cyclists=mysqli_real_escape_string($conn,$_POST['cyclists']);
 $amenities=mysqli_real_escape_string($conn,$_POST['amenities']);

$sql2="SELECT * FROM property_table WHERE property_id='$id'";
$result1=mysqli_query($conn,$sql2);
$property_count= mysqli_num_rows($result1);
$property=mysqli_fetch_assoc($result1);

$name=$property['propertyname'];
if($property_count>0){
 $sql1= "DELETE FROM property_images WHERE propertyName='$name'";
 $sql="UPDATE property_table SET property_name='$propertyName',	description='$description',purpose='$purpose',location='$location',property_Type='$propertyType',price='$price',	area='$area',bedrooms='$bed',bathrooms='$bath',	owner_name='$propertyOwner',property_status='pending',commute_time='$commute_time',nearby_facilities='$nearby_facilities',cyclists='$cyclists',amenities='$amenities',propertyOwnerId='$propertyOwnerId' WHERE property_id='$id'";
if(mysqli_query($conn,$sql1)){
 } else{

  echo 'query error'. mysqli_error($conn);
 }

 if(mysqli_query($conn,$sql)){
  header("Location:image_property.php");
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
 <title>Edit property Form</title>
</head>
<body>

<h1 class="formtitle">Edit <span class="orange">Property</span></h1>

 <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">

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

 <label for="commute_time">Commute Time in mins</label>
 <input type="text" name="commute_time" placeholder="Commute time in minutes to CBD area">
 <div class="errors"><?php echo $errors['commute_time']?></div>

 <label for="nearby_facilities">Nearby Facilities</label>
 <textarea name="nearby_facilities" id="about" cols="30" rows="10" placeholder="What facilities are close by?" value="<?php echo htmlspecialchars($nearby_facilities)?>"></textarea>
 <div class="errors"><?php echo $errors['nearby_facilities']?></div>

 <label for="cyclist">Joggers and cylists Safety</label>
 <textarea name="cyclists" id="about" cols="30" rows="10" placeholder="How Safe is the environment?" value="<?php echo htmlspecialchars($cyclists)?>"></textarea>
 <div class="errors" ><?php echo $errors['cyclists'];?></div>

 <label for="text">Amenities(comma separated):</label>
  <input type="text" name="amenities" placeholder="Amenities(comma separated)..." value=<?php echo htmlspecialchars($amenities);?>>
  <div class="errors" ><?php echo $errors['amenities'];?></div>

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

 <button type="submit" name="editproperty_submit">Submit</button>
 </form>


</body>
</html>