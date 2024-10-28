<?php
//here the $conn will also have the DATABASE name in it
$conn = mysqli_connect("localhost","root","","WTproject");

if($conn)
{
    echo "connected";
}
else
{
    echo "connection failed";
    exit(); //exiit so no need of running the code below if conn failed
}

$query1 = "CREATE TABLE register (
    U_id INTEGER NOT NULL AUTO_INCREMENT,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    U_address VARCHAR(50) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    dob DATE NOT NULL,
    mealType VARCHAR(50),
    email VARCHAR(30) NOT NULL,
    userName VARCHAR(30) NOT NULL,
    userPassword varchar(30) NOT NULL,
    U_role varchar(10) NOT NULL,
    PRIMARY KEY(U_id)
    )";

$checktable = mysqli_query($conn,$query1);

if($checktable)
{
    echo "<br>register TABLE created successfully";
}
else
{
    echo "<br>register TABLE creation FAILED!";
}
mysqli_close($conn);
?>
