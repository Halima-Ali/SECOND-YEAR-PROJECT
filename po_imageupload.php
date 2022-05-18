<?php
session_start();
include 'includes\db_config.php';
$po_id=$_SESSION['po_id'];
    $id=$_SESSION['po_id'];
    $sql="SELECT * FROM po_profile WHERE propertyOwnerId='$id'";
    $result1=mysqli_query($conn,$sql);
    $profileimg_count= mysqli_num_rows($result1);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="agents.css">
 <title>Document</title>
</head>
<body>
 <h1 class="formtitle">Profile<span class="orange">image Upload</span></h1>
 <form action="po_imageupload.php" method="POST" enctype="multipart/form-data">
  <h6>Please upload a profile pic</h6>
 <input type="file" name="userfile[]" value="">
 <button type="submit" name="submit" value="Upload">Upload</button>
</form> 
<?php


$mysqli= new mysqli('localhost', 'root', '', 'finalproject') or die($mysqli->connect.error);
$table='po_images';
$phpFileUploadErrors= array(
 0 =>'There is no error, the file uploaded with success' ,
 1 =>'the uploaded file exceed the upload_max_filesize directive n php.ini',
 2 =>'The uploadded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
 3 =>'The uploaded file was only partially uploaded',
 4 =>'No file was uploaded',
 6 =>'Missing a temporary folder',
 7 =>'Failed to write file to disk.',
 8 =>'A PHP extension stopped the file upload.',
);

if(isset($_FILES['userfile'])){
 $file_array=reArrayFiles($_FILES['userfile']);
 // pre_r($file_array);

 // we want to look throught the array
 for($i=0;$i<count($file_array);$i++){
  // check for errors
  if($file_array[$i]['error']){
   echo $file_array[$i]['name']. $phpFileUploadErrors[$file_array[$i]['error']];
  }
  else{
   $extensions= array('jpg','jpeg','gif','png');
   $file_ext= explode('.',$file_array[$i]['name']);
   // get the name
   $name=$file_ext[0];
   $name= preg_replace("!-!","",$name);
   $name=ucwords($name);
   
   $file_ext=end($file_ext);

   if(!in_array($file_ext,$extensions)){
    echo " $file_array[$i]['name'].'Invalid file extension'";
   }
   else{
    $img_dir= 'images/'.$file_array[$i]['name'];    
    move_uploaded_file($file_array[$i]['tmp_name'],$img_dir);

    if(!file_exists($img_dir)){
    $sql="INSERT INTO $table (propertyOwnerId,img_name,img_dir) VALUES ('$po_id','$name','$img_dir');";
    $mysqli->query($sql) or die($mysqli->error);
    echo $file_array[$i]['name']. 'Success! image has been uploaded';
    } else{
     $sql="UPDATE $table SET propertyOwnerId='$po_id',img_name='$name',img_dir='$img_dir' WHERE propertyOwnerId='$po_id';";
     $mysqli->query($sql) or die($mysqli->error);
     echo $file_array[$i]['name']. 'Success! image has been uploaded';
    }
    

    $sql="INSERT INTO $table (propertyOwnerId,img_name,img_dir) VALUES ('$po_id','$name','$img_dir');";
       $mysqli->query($sql) or die($mysqli->error);
       echo $file_array[$i]['name']. 'Success! image has been uploaded';
    
    header("Location:po_profile.php");
   }

   }
  } 

}


function reArrayFiles($file_post){
 $file_ary=array();
 $file_count=count($file_post['name']);
 $file_keys=array_keys($file_post);

 for($i=0;$i<$file_count;$i++){
  foreach ($file_keys as $key){
   $file_ary[$i][$key]= $file_post[$key][$i];
  }
 }
 return $file_ary;
}

function pre_r($array){
 echo '<pre>';
 print_r($array);
 echo '</pre>';
}
?>

</body>
</html>