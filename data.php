<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "stray_rescue";

// Connect to database
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $animal = mysqli_real_escape_string($conn, $_POST['animal_type'] ?? '');
    $condition = mysqli_real_escape_string($conn, $_POST['condition_type'] ?? '');
    $location = mysqli_real_escape_string($conn, $_POST['location'] ?? '');
    $description = mysqli_real_escape_string($conn, $_POST['description'] ?? '');
    $phone = mysqli_real_escape_string($conn, $_POST['phone'] ?? '');

    $sql = "INSERT INTO reports (animal_type, condition_type, location, description, phone)
            VALUES ('$animal', '$condition', '$location', '$description', '$phone')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Report submitted successfully!');
                window.location.href='index.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>