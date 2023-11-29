<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$db_host = "localhost";     // Replace with your database host
    $db_user = "root";     // Replace with your database username
    $db_password = ""; // Replace with your database password
    $db_name = "railway";     // Replace with your database name

  $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $complaint_description = $conn->real_escape_string($_POST["complaint_description"]);

    // Insert the complaint into the database
    $sql = "INSERT INTO complaint(complaint_description) VALUES ('$complaint_description')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Complaint submitted successfully.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error."</p>";
    }

    // Close the database connection
    $conn->close();
}
else {
    // If the request method is not POST, do nothing
    echo "<p>Invalid request.</p>";
}
?>