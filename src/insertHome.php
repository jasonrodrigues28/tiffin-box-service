<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "WTproject");

// Check connection
if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
    exit();
}

// Check if form is submitted
// Collect and sanitize form data
$firstName = $_POST['fn'];
$lastName = $_POST['ln'];
$contactNumber = $_POST['pn'];
$mealType = $_POST['mealType'];
$dietaryRestrictions = $_POST['dietaryRestrictions'];
$deliveryTime = $_POST['deliveryTime'];
$specialInstructions = $_POST['specialInstructions'];

// Prepare the SQL query to insert data into the subscriptions table
$query = "INSERT INTO subscriptions (firstName, lastName, contactNumber, mealType, dietaryRestrictions, deliveryTime, specialInstructions) 
        VALUES ('$firstName', '$lastName', '$contactNumber', '$mealType', '$dietaryRestrictions', '$deliveryTime', '$specialInstructions')";

// Execute the query
if (mysqli_query($conn, $query)) {
    header("Location: homepage.html");
    exit();
} else {
    echo "<br>Data insertion failed: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
