<?php
// Database connection settings
$servername = "your_db_servername";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "your_db_name";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data and insert into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Prepare the SQL query to insert data into the database table
    $sql = "INSERT INTO contact_form_data (full_name, email, message) VALUES ('$full_name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Form data submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
