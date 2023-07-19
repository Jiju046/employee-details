<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>add</title>
</head>
<body>

 <!-- validation -->
    <!-- variables -->
    <?php
    include "./db.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // db
    
    $nameDB=$_REQUEST["name"];
    $addressDB=$_REQUEST["address"];
    $cityDB=$_REQUEST["city"];
    $genderDB=$_REQUEST["gender"];
    $salaryDB = $_REQUEST["salary"];
    $skillDB=implode(", ",$_REQUEST["skill"]);

    $sql="INSERT INTO employee (name,address,city,gender,salary,skills)
    VALUES('$nameDB','$addressDB','$cityDB','$genderDB','$salaryDB','$skillDB') ";

//removed if
        if($connection -> query($sql)== true){
            echo "<br>New Record added successfully" ; 
            header("Location: ../index.php");

        }
        else{
            echo "Error: " .$sql. "<br>" . $connection -> error;
        }
    }


    ?>



<!-- html form -->
    <div class="container my-5">

    <h1 class="mb-3">Add Records</h1>
    <div>
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <!-- name -->
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" >
                
            </div>
            <div class="mb-3">
                <!-- ADDRESS -->
                <label class="form-label" for="address">Address</label>
                <textarea class="form-control" type="text" id="address" name="address" ></textarea>
                
            </div>
            <!-- city select -->

            <div class="mb-3">
                <label class="form-label" for="city">City</label>
                <select class="form-select" id="city" aria-label="city" name="city" >
                    <option value="">Choose</option>
                    <option value="Coimbatore">Coimbatore</option>
                    <option value="Madurai">Madurai</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Bangalore">Bangalore</option>
                </select>

            </div>


            <!-- gender radio -->
            <div class="mb-3">
                <label class="form-label" for="gender">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="others" value="Others">
                    <label class="form-check-label" for="others">Others</label>
                </div>
            </div>

            <div class="mb-3">
                <!-- SALARY -->
                <label class="form-label" for="salary">salary</label>
                <input class="form-control" type="text" name="salary" >
                
                </div>
                <div class="mb-3">
                    <span>Skills</span>
                    <!-- skill -->
                <!-- name skill[] is treated as array -->
                    <div>
                        <input class="form-check-input" name="skill[]" type="checkbox" value="C" id="c">
                        <label class="form-check-label" for="c">C</label>
                        <input class="form-check-input" name="skill[]" type="checkbox" value="C++" id="c++">
                        <label class="form-check-label" for="c++">C++</label>
                        <input class="form-check-input" name="skill[]" type="checkbox" value="Java" id="java">
                        <label class="form-check-label" for="java">Java</label>
                    </div>
                </div> 
                
               
            
    <!-- submit -->
    <button class="btn btn-success">Submit</button>




    </form>
    <a href="../index.php">Back to Employee List</a>
    
    </div>
    </div>
    
</body>
</html>