<?php
$conn = mysqli_connect("localhost","root","");

if($conn)
{
    echo "connected";
}
else
{
    echo "connection failed";
    mysqli_close($conn);
}
?>