<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>



<!-- employee table -->

<div class="container">
    <?php include "./include/db.php"; ?>

    <h3 class="my-5">Employees Details<a href="./include/create.php" class="btn btn-success fw-bold float-end" >+ Add New Employee</a></h3>
<table class="table table-striped my-4 border">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Gender</th>
      <th scope="col">Salary</th>
      <th scope="col" >Skills</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <!-- to insert row dynamically -->
    <?php 
        if ($result== true && mysqli_num_rows($result) > 0) {
          $count=1;
          while($row = mysqli_fetch_assoc($result)) { //insert data as an array into $row
            ?>
            
            <tr>
            <td><?php echo $count++; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["address"]; ?></td>
            <td><?php echo $row["city"]; ?></td>
            <td><?php echo $row["gender"]; ?></td>
            <td><?php echo $row["salary"]; ?></td>
            <td><?php echo $row["skills"]; ?></td>
            
            
            
            <!-- action links -->
            <td>
            <a class="text-success" href='./include/view.php?id=<?php echo $row["id"]; ?>'><i class='bi bi-eye-fill'></i></a>  
            <a class="text-success" href='./include/update.php?id=<?php echo $row["id"]; ?>'><i class='bi bi-pencil-fill'></i></a>  
            <a class="text-danger" href="#" onclick="handleClick('<?php echo $row['id']; ?>')"><i class='bi bi-trash-fill'></i></a>
            </td>
            </tr>
            <?php 
              }
            } else {
              echo "<tr><td>No Employees Found!</td></tr>";
            }
          
            ?>
  </tbody>
</table>

<?php

// script to view confirm before deleting
echo "<script>
function handleClick(id){
  if (confirm('Proceed to delete?')) {
    window.location = './include/delete.php?id='+ id;
  }
}
</script>"
?>

</div>
   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>