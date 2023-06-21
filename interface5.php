<!DOCTYPE html>
<html>
<head>
    <title>Συνδεση Διαχιριστης</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!-- <script src="script.js"></script> -->
</head>
    <header>
        <!-- Κοινό Navigation bar Menu -->
        <nav>
            <ul>
            <li><a href="interface1.html">Αρχική</a></li>
                <li><a href="interface2.html">Προφίλ Εταιρίας</a></li>
                <li><a href="interface3.html">Υπολογισμός Φυσικού Αερίου</a></li>
                <li><a href="interface4.html">Επικοινωνία</a></li>
                <li><a href="interface5.php">Συνδεση Διαχιριστη</a></li>
            </ul>
        </nav>
    </header>
    <body>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <h2>Σύνδεση Διαχειριστή</h2>
        <section class="admin-login">
            <form id="login-form" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button class="cta-button" type="submit">Σύνδεση Διαχειριστή</button>
            </form>
        </section>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];

                // Check if the username and password match
                if ($username === "admin" && $password === "Root123") {
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
                        echo "<table class='table_view'>
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
                        echo '<script type="text/javascript">; alert("Δεν υπάρχουν δεδομένα."); </script>';
                    }

                    // Close the connection
                    $conn->close();
                } else {
                    echo '<script type="text/javascript">; alert("Λυπούμαστε δεν είστε διαχειριστής της διαδικτυακής εφαρμογής"); </script>';
                }
            }
        ?>
    </body>
    
    <footer class = "footerClass">
        <div class = "collums">
            <div>
            <!-- Κοινό Footer -->
                <h4>Στοιχεία Επικοινωνίας</h4>
                <p><strong>Διεύθυνση: </strong>Δεληγιώργη 114, Πειραιάς 185 34</p>
                <p><strong>Τηλέφωνο:</strong> <a href="tel:ΤΗΛΕΦΩΝΟ">2107818987</a></p>
                <p><strong>Email:</strong> <a href="mailto:EMAIL">gas@email.com</a></p>
            </div>

            <div>
                <h4>Χάρτης</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15855.040011309693!2dLONGITUDE!3dLATITUDE!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzDCsDM1JzUwLjUiTiAzMcKwNTEnMzcuNiJF!5e0!3m2!1sen!2sus!4v1621336520785!5m2!1sen!2sus" style="border:0;" allowfullscreen loading="lazy" ></iframe>
            </div>
        </div>
        <p>&copy; 2023 Όνομα Εταιρίας. Όλα τα δικαιώματα κατοχυρωμένα.</p>
    </footer>
</hrtml>

<style>
    .label {
            margin-top: 10px;
            margin-bottom: 10px;
            font-weight: 600;
        }
        table {
        border-collapse: collapse;
        width: 100%;
            }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* White background */
        }

        tr:nth-child(odd) {
            background-color: #D3D3D3; /* Black background */
        }
        /* 
        tr:hover {
            background-color: #f5f5f5;
        } */
    </style>