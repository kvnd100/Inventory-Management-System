<?php 

    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "online_mobile";


    // Establish the Connection
    $conn = mysqli_connect($server, $user, $password, $database);

    // Check the Connection
    if (!$conn) {
        die("<script>alert('Database Connection Failed!')</script>");
    }

?>