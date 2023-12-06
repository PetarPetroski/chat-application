<?php
session_start();
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $name = $_GET['name'];

    $query = "SELECT message FROM Chat WHERE name = '$name'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $messages = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $messages[] = $row['message'];
        }
        echo implode("\n", $messages);
    } else {
        echo "No messages found.";
    }
}
?>