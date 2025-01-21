<?php
$conn = mysqli_connect("localhost", "root", "", "WTproject");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['userName'];
    $email = $_POST['email'];

    $q1 = "SELECT role, firstName, lastName,userName, email, userPassword, gender, U_address 
           FROM c_account 
           WHERE userName = '$username' AND email = '$email'";
    $r1 = mysqli_query($conn, $q1);

    if (mysqli_num_rows($r1) > 0) {
        $row = mysqli_fetch_assoc($r1);
    } else {
        $error = "No account found with the given username and email.";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        h1 {
            color: darkblue;
            font-size: 36px;
        }

        h2 {
            color: #2F4F4F;
            font-size: 28px;
        }

        h3 {
            color: #8B0000;
            font-size: 24px;
        }

        caption {
            font-size: 14px;
            color: grey;
        }

        footer {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<header>
        <a href="homepage.php">
            <img src="../pics/logo.png" alt="Tiffin Box Service Logo" style="width: 50px;">
        </a>        
        <h1>Tiffin Box Service</h1>
        <nav>
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#plans">Plans</a></li>
                <li><a href="#Contact">Contact</a></li>
                <li><a href="my_account.php">My Account</a></li>
                <li><a href="sign-in.html">Sign In</a></li>
            </ul>
        </nav>
    </header>

    <div id="add">
        <h2>Account Details</h2><br>

       
        <form method="POST">
            <label>Enter Your Username</label>
            <input type="text" name="userName" required><br>
            <label>Enter Your Email Id</label>
            <input type="email" name="email" required><br>
            <input type="submit" value="Submit" id="btn">
        </form>

        
        <?php if (isset($row)): ?>
            <p class="dis">Role: <?= $row["role"]; ?></p>
            <p class="dis">First Name: <?= $row["firstName"]; ?></p>
            <p class="dis">Last Name: <?= $row["lastName"]; ?></p>
            <p class="dis">Username: <?= $row["userName"]; ?></p>
            <p class="dis">Email: <?= $row["email"]; ?></p>
            <p class="dis">Password: <?= $row["userPassword"]; ?></p>
            <p class="dis">Gender: <?= $row["gender"]; ?></p>
            <p class="dis">Address: <?= $row["U_address"]; ?></p>
        <?php elseif (isset($error)): ?>
            <p><?= $error; ?></p>
        <?php endif; ?>
    </div>

    <footer id="Contact">
        <p>Contact us: info@tiffinboxservice.com</p>
        <p>Visit our <a href="https://www.google.com">official website</a> for more information.</p>
    </footer>
</body>
</html>