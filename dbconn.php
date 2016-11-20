<?php
$conn=mysqli_connect("localhost","kozle1_bebio","bebio123","kozle1_mesten");

if (mysqli_connect_errno())

  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
mysqli_set_charset($conn,"utf8");
?>