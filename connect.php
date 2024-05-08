<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$dob = $_POST['dob'];

echo "fname = $fname <br><br>";
echo "lname = $lname <br><br>";
echo "email = $email <br><br>";
echo "dob = $dob <br>";

// Database connection
$conn = new mysqli('localhost', 'root', '', 'login',3307);
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO student (fname, lname, email, dob) VALUES (?, ?, ?, ?)"); // Corrected SQL query
    $stmt->bind_param("sssi",$fname, $lname, $email, $dob); // Corrected binding parameters
    $stmt->execute();
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>
