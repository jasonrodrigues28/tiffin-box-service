<?php

    $role = $_POST['role'];
    $username = $_POST['un'];
    $password = $_POST['pw'];

    $conn = mysqli_connect("localhost", "root", "", "WTproject");
   
    if ($role == "Customer")
    {
        
        $table = "c_account";
    } 
    else
    {
        $table = "a_account";
    }

    // Searching
    $q1 = "SELECT * FROM $table WHERE userName='$username' AND userPassword='$password'";
    $r1 = mysqli_query($conn, $q1);

   
    if ($r1) {
        // Fetch user data
        if ($info = mysqli_fetch_array($r1)) 
        {
            if ($info['userPassword'] === $password) 
            { 
                if ($role === "Customer") 
                {
                    header("Location: homepage.php");
                    exit();
                } 
                elseif ($role === "Admin") 
                {
                    header("Location: admin_homepage.php");
                    exit();
                }
            } 
            else 
            {
                echo "<script>alert('Incorrect password. Please try again.');</script>";
            }
        
        }
        else 
        {
            echo "<script>alert('No user found with that username.');</script>";
        }
    } 
   
    else 
    {
        echo "<script>alert('Query failed: " . mysqli_error($conn) . "');</script>";
    }

    // Close the connection
    mysqli_close($conn);

?>
