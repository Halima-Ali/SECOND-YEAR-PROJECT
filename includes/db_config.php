<?php
// connecting to our database

$serverName= "localhost";
$dBUsername="root";
$dBPassword="";
$dBName="finalproject";

$conn= mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName);

if(!$conn){
 die("connection failed: " . mysqli_connect_error());
}
