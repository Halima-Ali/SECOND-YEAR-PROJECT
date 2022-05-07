<?php
session_start();
include 'includes\db_config.php';

if(isset($_POST['n-submit'])){

 $review=$date=$location="";
 $errors=array('review'=>'','date'=>'','location'=>'');

 if(empty($_POST['review'])){
  $errors['review']='please enter a value';
 }
 else{
  $review= $_POST['review'];

  if(!preg_match('/^.{5,500}$/',$review)){
   $errors['review']='enter btwn 5 and 255 characters';
  }
 }

 if(empty($_POST['date'])){
  $errors['date']='please enter a value';
 }
 else{
  $date= $_POST['date'];
 }

 if(empty($_POST['location'])){
  $errors['location']='please enter a value';
 }
 else{
  $location= $_POST['location'];
 }

 $r_name=$_SESSION['userUid'];

 $review=mysqli_real_escape_string($conn,$_POST['review']);
 $date=mysqli_real_escape_string($conn,$_POST['date']);

 $sql= "INSERT INTO neighborhood (name,review,date,Location) VALUES ('$r_name','$review','$date','$location')";

 if(mysqli_query($conn,$sql)){
  header("Location:index.php");
 } else{
  echo 'query error'. mysqli_error($conn);
 }

}