<?php
$conn = mysqli_connect('localhost','root', '' ,'practicedb');

if(!$conn){
  echo 'Connection error: '. mysqli_connect_error();
} 
?>