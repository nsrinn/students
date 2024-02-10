<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "progress_report";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Now you can use $conn for database operations
$sql="CREATE TABLE student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    registerno VARCHAR(6) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone VARCHAR(10) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    bloodgrp VARCHAR(5) NOT NULL,
    date_of_birth DATE NOT NULL,
    guardian VARCHAR(255) NOT NULL,
    address TEXT NOT NULL,
    password VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
// if ($conn->query($sql) === TRUE) {
//     echo "Table 'student' created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

$sql="CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL
)";



$sql="CREATE TABLE marks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    registerno VARCHAR(6) NOT NULL,
    english INT NOT NULL,
    hindi INT NOT NULL,
    physics INT NOT NULL,
    chemistry INT NOT NULL,
    biology INT NOT NULL,
    geography INT NOT NULL,
    history INT NOT NULL,
    computer_science INT NOT NULL,
    extra_activities INT NOT NULL,
    total_marks INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (registerno) REFERENCES student(registerno)
)
";


$sql="CREATE TABLE contactus (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(50) NOT NULL,
    message VARCHAR(255) NOT NULL
)";

// if ($conn->query($sql) === TRUE) {
//     echo "Table 'students_mark' created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }
// Close the connection when done
// $conn->close();
?>
