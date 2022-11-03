<?php


$id = $_GET['id'];

$servername = 'localhost';
$username='root';
$password='';
$dbname='prasanthdb';
echo $id;
$con = new mysqli($servername,$username,$password,$dbname);


if($con->connect_error){
	die( 'failed connection'.$con->connect_error);}


$downloadsql ="SELECT * FROM formdata WHERE emp_id=$id"; 
$result = $con->query($downloadsql);

if($result->num_rows==0){
	echo 'no image to download';}
	
$image = mysqli_fetch_object($result);
header("content-type: " .$image->type);
header('Content-Disposition: attachment; filename="'.$image->name.'"');
header("Content-Transfer-Encoding: binary"); 
header('Expires: 0');
header('Pragma: no-cache');
header("Content-Length: ".$image->size);


echo $image->image;


exit();



?>