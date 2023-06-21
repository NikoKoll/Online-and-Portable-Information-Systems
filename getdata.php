<?php
    // Assuming you have already established a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "final2023";

    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Fetch data from the table
    $fetchSql = "SELECT * FROM `requests`";
    $result = $conn->query($fetchSql);

    // Display the data in a table form
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["phone_number"] . "</td>
                    <td>" . $row["department"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["subject"] . "</td>
                    <td>" . $row["message"] . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No data available.";
    }

    // Close the connection
    $conn->close();
?>