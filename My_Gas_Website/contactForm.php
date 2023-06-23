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
        $phone_number = $_POST["phone_number"];
        $department = $_POST["department"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        // Prepare the SQL statement
        $sql = "INSERT INTO `requests` (name, phone_number, department, email, subject, message) VALUES (?, ?, ?, ?, ?, ?)";

        // Prepare and bind the parameters
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Error during statement preparation: " . $conn->error);
        }
        $bind_result = $stmt->bind_param("ssssss", $name, $phone_number, $department ,$email, $subject, $message);
        if (!$bind_result) {
            die("Error during parameter binding: " . $stmt->error);
        }

        // Execute the statement
        if ($stmt->execute()) {
            echo '<script type="text/javascript">; location="interface4.html"; </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
?>