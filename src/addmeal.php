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
$pname = $_POST['planName'];
$description = $_POST['planDescription'];
$price = $_POST['price'];


// Prepare the SQL query to insert data into the subscriptions table
$query = "INSERT INTO MealPlan (PlanName, PlanDescription, PlanPrice) 
        VALUES ('$pname', '$description', '$price')";

// Execute the query
if (mysqli_query($conn, $query)) {
    header("Location: admin_homepage.php");
    exit();
} else {
    echo "<br>Data insertion failed: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
