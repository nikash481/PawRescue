<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "animal_rescue");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$animal = $_POST['animal_type'];
$location = $_POST['location'];
$description = $_POST['description'];

// Insert into database
$sql = "INSERT INTO reports (name, phone, animal_type, location, description)
        VALUES ('$name', '$phone', '$animal', '$location', '$description')";

if (mysqli_query($conn, $sql)) {
    echo "Report submitted successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
