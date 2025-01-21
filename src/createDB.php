<?php
$conn = mysqli_connect("localhost","root","");

if($conn)
{
    echo "connected";
}
else
{
    echo "connection failed";
    exit();
}

$query1 = "CREATE DATABASE WTproject";
$checkQuery = mysqli_query($conn,$query1);

if($checkQuery)
{
    echo "<br>WTproject Database have been created successfully";
}
else
{
    echo "<br>WTproject creation FAILED!";
}
mysqli_close($conn);
?>