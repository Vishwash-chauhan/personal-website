<?php
// Establish a connection to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new database";

// Create a new connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if ($conn) {
    echo "Connected";
}
else
{
	echo "Connection Failed".mysqli_connect_error(); 
}


// Retrieve the form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Prepare and execute an SQL statement to insert the data into the table
$sql = "INSERT INTO contacts (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
    header("Location: index.html");
    exit; // Terminate the current script to ensure the redirection happens
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
