<?php
include "db.php";

if (isset($_GET["id"])) {
    // Delete employee
    $id = $_GET["id"];
    $sql = "DELETE FROM employee WHERE id='$id'";
    $connection->query($sql);
    header("Location: ../index.php");
} else {
    echo "Invalid request";
}
?>
