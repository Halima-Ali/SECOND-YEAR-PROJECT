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
 <h1 class="formtitle">Property <span class="orange">image Upload</span></h1>
 <form action="image_property.php" method="POST" enctype="multipart/form-data">
 <input type="text" name="propertyName" placeholder="Property Name...">
 <input type="file" name="userfile[]" value=""  multiple="">
 <button type="submit" name="submit" value="Upload">Upload</button>
</form> 
<?php

$mysqli= new mysqli('localhost', 'root', '', 'finalproject') or die($mysqli->connect.error);
$table='property_images';
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
 
 $propertyName=$_POST['propertyName'];

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
    $sql= "INSERT INTO $table (propertyName,img_name,img_dir) VALUES('$propertyName','$name','$img_dir');";
    $mysqli->query($sql) or die($mysqli->error);
    echo $file_array[$i]['name']. 'Success! image has been uploaded';
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

