<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medical_reports";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the medical_reports table
$sql = "SELECT * FROM medical_reports";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Close the database connection
$conn->close();

// Output data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>