<?php
$conn = mysqli_connect("localhost", "root", "", "WTproject");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['userName'];
    $email = $_POST['email'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT role, firstName, lastName, userName, email, userPassword, gender, U_address 
                            FROM c_account 
                            WHERE userName = ? AND email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        $error = "No account found with the given username and email.";
    }

    // Close the statement and connection
    $stmt->close();
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
        h1 { color: darkblue; font-size: 36px; }
        h2 { color: #2F4F4F; font-size: 28px; }
        h3 { color: #8B0000; font-size: 24px; }
        caption { font-size: 14px; color: grey; }
        footer { background-color: #4CAF50; color: white; padding: 15px; text-align: center; }
    </style>
</head>
<body>
<header>
    <a href="homepage.php"><img src="../pics/logo.png" alt="Tiffin Box Service Logo" style="width: 50px;"></a>        
    <h1>Tiffin Box Service</h1>
    <nav>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#plans">Plans</a></li>
            <li><a href="#Contact">Contact</a></li>
            <li><a href="my_account.php">My Account</a></li>
            <li><a href="sign-in.html">Sign In</a></li>
            <li><a href="sign-in.html">Log-Out</a></li>
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
        <p class="dis">Role: <?= htmlspecialchars($row["role"]); ?></p>
        <p class="dis">First Name: <?= htmlspecialchars($row["firstName"]); ?></p>
        <p class="dis">Last Name: <?= htmlspecialchars($row["lastName"]); ?></p>
        <p class="dis">Username: <?= htmlspecialchars($row["userName"]); ?></p>
        <p class="dis">Email: <?= htmlspecialchars($row["email"]); ?></p>
        <!-- Password is omitted for security reasons -->
        <p class="dis">Gender: <?= htmlspecialchars($row["gender"]); ?></p>
        <p class="dis">Address: <?= htmlspecialchars($row["U_address"]); ?></p>
    <?php elseif (isset($error)): ?>
        <p><?= htmlspecialchars($error); ?></p>
    <?php endif; ?>
</div>

<footer id="Contact">
    <p>Contact us: info@tiffinboxservice.com</p>
    <p>Visit our <a href="https://www.google.com">official website</a> for more information.</p>
</footer>
</body>
</html>
