<?php
//connecting to wtproject
$connn = mysqli_connect("localhost","root","","WTproject");

if($connn)
{
    echo "connected";
}
else
{
    echo "connection failed";
    exit(); //exiit so no need of running the code below if conn failed
}

$query2 = "CREATE TABLE subscriptions (
            id INT NOT NULL AUTO_INCREMENT,
            firstName VARCHAR(30) NOT NULL,
            lastName VARCHAR(30) NOT NULL,
            contactNumber VARCHAR(15) NOT NULL,
            mealType VARCHAR(50),
            dietaryRestrictions VARCHAR(100),
            deliveryTime VARCHAR(10) NOT NULL,
            specialInstructions TEXT,
            PRIMARY KEY(id)
        )";


$checktable = mysqli_query($connn,$query2);

if($checktable)
{
    echo "<br>subscriptions TABLE created successfully";
}
else
{
    echo "<br>TABLE creation FAILED!";
}
mysqli_close($connn);
?>