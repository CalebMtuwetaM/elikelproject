<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using $_POST
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    // Database connection parameters
    $servername = "your_mysql_host";
    $db_username = "your_mysql_username";
    $db_password = "your_mysql_password";
    $dbname = "mydatabase";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the "users" table
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
