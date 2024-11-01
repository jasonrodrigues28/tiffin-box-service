<?php
$conn = mysqli_connect("localhost", "root", "", "WTproject");

if ($conn) {
    echo "connected";
} else {
    echo "connection failed";
    exit();
}

$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$mealType = $_POST['mealType'];
$email = $_POST['email'];
$username = $_POST['username'];
$U_role = $_POST['role'];
$userPassword = $_POST['password'];

$i=0;
$meal="";
foreach($mealType as $i)
{
    $meal=$meal ." $i";
}

// Define the target directory and file path
$targetDir = "uploads/";
$fileName = basename($_FILES["photo"]["name"]);
$targetFilePath = $targetDir . $fileName;

// Move the uploaded file to the server directory
move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath);

// Directly prepare the SQL statement
$q1 = "INSERT INTO register (firstName, lastName, U_address, gender, dob, mealType, email, username, userPassword, U_role, profilePhoto) 
        VALUES ('$firstName', '$lastName', '$address', '$gender', '$dob', '$meal', '$email', '$username', '$userPassword', '$U_role', '$targetFilePath')";

// Execute the query
if (mysqli_query($conn, $q1)) {
    header("Location: homepage.html");
    exit();
} else {
    echo "<br>Data insertion failed: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
