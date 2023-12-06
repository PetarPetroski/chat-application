<?php
session_start();
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $message = $_POST['message'];

    // Assuming you have a table named 'ChatMessages' with columns 'name' and 'message'
    // Assuming you have a unique identifier (e.g., user ID) for each record in the 'Chat' table
    $query = "UPDATE Chat SET message = '$message' WHERE name = '$name'";
    mysqli_query($con, $query);

    // You can add additional error handling if needed
}
?>