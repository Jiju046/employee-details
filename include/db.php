<?php


$serverName="localhost";
$userName="root";
$password="root";
$dbName="employee_details";

$connection = new mysqli($serverName,$userName,$password,$dbName);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }


  //query
  $query="SELECT * FROM employee";
  $result=mysqli_query($connection,$query);

  