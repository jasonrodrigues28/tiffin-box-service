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

$query1 = "CREATE TABLE c_account (
    U_id INTEGER NOT NULL AUTO_INCREMENT,
    role VARCHAR(10) NOT NULL,
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
    profilePhoto VARCHAR(255) NOT NULL,
    PRIMARY KEY(U_id)
    )";

$checktable = mysqli_query($conn,$query1);

if($checktable)
{
    echo "<br>Customer TABLE created successfully";
}
else
{
    echo "<br>Customer TABLE creation FAILED!";
}

$query2 = "CREATE TABLE a_account (
    U_id INTEGER NOT NULL AUTO_INCREMENT,
    role VARCHAR(10) NOT NULL,
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
    profilePhoto VARCHAR(255) NOT NULL,
    PRIMARY KEY(U_id)
    )";

$checktable1 = mysqli_query($conn,$query2);

if($checktable1)
{
    echo "<br>Admin TABLE created successfully";
}
else
{
    echo "<br>Admin TABLE creation FAILED!";
}
mysqli_close($conn);
?>
