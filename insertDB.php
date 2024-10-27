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
                                st_id INTEGER NOT NULL,
                                st_name VARCHAR(10) NOT NULL,
                                st_branch VARCHAR(5) NOT NULL,
                                PRIMARY KEY(st_id)
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