<?php
    // Establish the Connection
    include '../config/database_config.php';

    error_reporting(0);

    $id = $_GET['rn'];


    $query = "DELETE FROM employee_details WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        echo '<script type="text/javascript"> alert("Employee deleted from database!") </script>';
        echo '<script type="text/javascript"> location.href = "../../employee.php" </script>';
    } else {
        echo '<script type="text/javascript"> alert("Failed to delete employee from database") </script>';
        echo '<script type="text/javascript"> location.href = "../../employee.php" </script>';
    }
?>