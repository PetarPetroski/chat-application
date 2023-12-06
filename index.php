<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <?php
        session_start();
        require 'connect.php';

        $query = "SELECT name FROM Chat"; // Assuming your table has a 'name' column
        $result = mysqli_query($con, $query);

        // Check if there are any rows
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='data-table'><tr>";
            echo "<td>" . 'Names:' . "</td>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<td>" . $row['name'] . "</td>";
            }

            echo "</tr></table>";
        } else {
            echo "No names found.";
        }
        ?>
    </div>
    <div class="container">
        <form id="sendingChat">
            <div class="topgrid">
                <p>Enter Name and Password</p>
                <div>
                    <!-- Add "keyup" event listeners for real-time updates -->
                    <input type="text" id="name" onkeyup="updateChat()">
                    <input type="password" id="password" onkeyup="updateChat()">
                </div>
            </div>
            <p>CONTENT TRANSMITTED AS TYPED</p>
            <textarea id="message" name="message" onkeyup="updateChat()"></textarea>
        </form>
    </div>
    <div class="container">
        <form id="recievingChat">
            <div class="bottomgrid">
                <p>Enter Valid Name and Receive Chat on Listen Click</p>
                <input type="text" id="listenName">
            </div>
            <textarea id="listenMessage" name="message" readonly></textarea>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>