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

$query1 = "CREATE TABLE MealPlan (
    MP_id INTEGER NOT NULL AUTO_INCREMENT,
    PlanName VARCHAR(30) NOT NULL,
    PlanDescription VARCHAR(30) NOT NULL,
    PlanPrice VARCHAR(50) NOT NULL,
    PRIMARY KEY(MP_id)
    )";

$checktable = mysqli_query($conn,$query1);

if($checktable)
{
    echo "<br>MealPlan TABLE created successfully";
}
else
{
    echo "<br>MealPlan TABLE creation FAILED!";
}
mysqli_close($conn);
?>