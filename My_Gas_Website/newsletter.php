<?php
    // Assuming you have already established a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gasdb";

    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the values from the form
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];

        // Prepare the SQL statement
        $sql = "INSERT INTO `subscribers` (username, name, email) VALUES (?, ?, ?)";

        // Prepare and bind the parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $name, $email);

        // Execute the statement
        if ($stmt->execute()) {
            echo '<script type="text/javascript">; location="interface1.html"; </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
?>