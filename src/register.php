<?php
$conn = mysqli_connect("localhost", "root", "", "WTproject");

if ($conn) {
    echo "connected";
} else {
    echo "connection failed";
    exit();
}

$firstName = mysqli_real_escape_string($conn, $_POST['fname']);
$lastName = mysqli_real_escape_string($conn, $_POST['lname']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$mealType = isset($_POST['mealType']) ? implode(", ", $_POST['mealType']) : '';
$email = mysqli_real_escape_string($conn, $_POST['email']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$role = mysqli_real_escape_string($conn, $_POST['role']);


// Directly prepare the SQL statement
$q1 = "INSERT INTO register (firstName, lastName, U_address, gender, dob, mealType, profilePhoto, email, username, role) 
           VALUES ('$firstName', '$lastName', '$address', '$gender', '$dob', '$mealType', '$profilePhoto', '$email', '$username', '$role')";

// Execute the query
if (mysqli_query($conn, $q1)) {
    echo "<br>Data insertion successful";
} else {
    echo "<br>Data insertion failed: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
