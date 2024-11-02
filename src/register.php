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

//
if ($U_role == "Customer") {
    $table = "c_account";
} else {
    $table = "a_account";
}


//Insertion
$q3 = "INSERT INTO $table (role,firstName, lastName, U_address, gender, dob, mealType, email, username, userPassword, U_role, profilePhoto) 
        VALUES ('$U_role','$firstName', '$lastName', '$address', '$gender', '$dob', '$meal', '$email', '$username', '$userPassword', '$U_role', '$targetFilePath')";
$r3 = mysqli_query($conn,$q3);


if ($U_role === "Customer") {
    header("Location: homepage.php");
    exit();
} elseif ($U_role === "Admin") {
    header("Location: admin_homepage.php");
    exit();
}

mysqli_close($conn);
?>
