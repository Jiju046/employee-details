<?php
include "./db.php";




if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // to show details based on clicked id
    $query = "SELECT * FROM employee WHERE id = $id";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); //result stored as an array in $row
        $name = $row["name"];
        $address = $row["address"];
        $city = $row["city"];
        $gender = $row["gender"];
        $salary = $row["salary"];
        $skills= explode(", ",$row["skills"]);
    } 
    
    
    else {
      
        header("Location: ../index.php");
        exit(); //show output and terminate script
    }
    }
    
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Update the employee 
        $nameDB = $_POST['name'];
        $addressDB = $_POST['address'];
        $cityDB = $_POST["city"];
        $genderDB = $_POST["gender"];
        $salaryDB = $_POST['salary'];
        $skillsDB= implode(", ",$_POST['skill']);
    
    
        $query = "UPDATE employee SET name = '$nameDB', address = '$addressDB',
                  city='$cityDB',gender='$genderDB', salary = '$salaryDB',skills='$skillsDB' WHERE id = '$id'";
    
    
        if ($connection->query($query) === TRUE) {
            // after update will take to home
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error updating record: " . $connection->error;
        }
        }
    

    



$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <title>Update</title>
</head>
<body>
<div class="container">
  <h1 class="my-5">Update Records</h1>
  <form method="POST" action="">


<!-- name -->
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" >
    </div>


<!-- Address -->
    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <textarea type="text" class="form-control" id="address" name="address"><?php echo $address; ?></textarea>
    </div>

    <!-- city select -->

    <div class="mb-3">
      <label class="form-label" for="city">City</label>
          <select class="form-select" id="city" aria-label="city" name="city" >
            <option value="">Choose</option>
            <option  value="Coimbatore" <?php if($city== "Coimbatore") echo "selected"; ?>>Coimbatore</option>
            <option value="Madurai" <?php if($city== "Madurai") echo "selected"; ?>>Madurai</option>
            <option value="Chennai" <?php if($city== "Chennai") echo "selected"; ?>>Chennai</option>
            <option value="Bangalore" <?php if($city== "Bangalore") echo "selected"; ?>>Bangalore</option>
          </select>

    </div>


  <!-- gender radio -->
    <div class="mb-3">
      <label class="form-label" for="gender">Gender</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php if($gender== "Male") echo "checked"; ?>>
          <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?php if($gender== "Female") echo "checked"; ?>>
          <label class="form-check-label" for="female">Female</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="others" value="Others" <?php if($gender== "Others") echo "checked"; ?>>
          <label class="form-check-label" for="others">Others</label>
        </div>
    </div>


<!-- salary -->
    <div class="mb-3">
      <label for="salary" class="form-label">Salary</label>
      <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $salary; ?>" >
    </div>

    <!-- skills -->
    <div class="mb-3">
      <p>Skills</p>
        <input class="form-check-input" name="skill[]" type="checkbox" value="C" id="c" <?php if(in_array('C',$skills)) echo 'checked'; ?>>
        <label class="form-check-label" for="c">C</label>
        <input class="form-check-input" name="skill[]" type="checkbox" value="C++" id="c++" <?php if(in_array('C++',$skills)) echo 'checked'; ?>>
        <label class="form-check-label" for="c++">C++</label>
        <input class="form-check-input" name="skill[]" type="checkbox" value="Java" id="java" <?php if(in_array('Java',$skills)) echo 'checked'; ?>>
        <label class="form-check-label" for="java">Java</label>
    </div>
                


    
    <button class="btn btn-success">Update</button>
  </form>
  <a href="../index.php">Back to Employee List</a>
  </div>
</div>
</body>
</html>