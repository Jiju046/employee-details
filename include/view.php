<?php
include "./db.php";



if(isset($_GET["id"])){
    $id=$_GET["id"];

$query="SELECT * FROM employee WHERE id=$id" ;
$result=mysqli_query($connection,$query);

if ($result -> num_rows==1){
    $row=$result -> fetch_assoc();
    $name=$row["name"];
    $address=$row["address"];
    $city=$row["city"];
    $gender=$row["gender"];
    $salary=$row["salary"];
    $skills=$row["skills"];

}
else{
    echo "Employee not found";
}

}
else{
    echo "invalid query";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h3>Employee Details</h3>
    <ul class="list-group">
    <li class='list-group-item'>ID: <?php echo $id ?></li>
    <li class='list-group-item'>Name: <?php echo $name ?></li>
    <li class='list-group-item'>Address: <?php echo $address ?></li>
    <li class='list-group-item'>City: <?php echo $city ?></li>
    <li class='list-group-item'>Gender: <?php echo $gender ?></li>
    <li class='list-group-item'>Salary: <?php echo $salary ?></li>
    <li class='list-group-item'>Skills: <?php echo $skills ?></li>
    
</ul>
<a href="../index.php">Back to Employee List</a>
    </div>

</body>
</html>