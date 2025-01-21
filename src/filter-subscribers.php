<?php
$conn = mysqli_connect("localhost", "root", "", "WTproject");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mealType = $_POST['mealType'];

    // Direct query without prepared statement
    $sql = "SELECT id, firstName, lastName, contactNumber, mealType, dietaryRestrictions, specialInstructions 
            FROM subscriptions 
            WHERE mealType = '$mealType'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        $error = "No subscribers found with the given meal type.";
    }

    // Close the connection
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
    <script>
        function f1() {
            var isValid = true;
            var messages = [];
            var mealType = document.getElementById("mealType");
            var y = mealType.options[mealType.selectedIndex].value;
            if (y == "") {
                messages.push("Please select your meal type");
                isValid = false;
            }

            if (!isValid) {
                alert(messages.join("\n"));
            }

            return isValid;
        }
    </script>
</head>
<body>
<header>
    <h1>Admin Dashboard - Tiffin Box Service</h1>
    <nav>
        <ul>
            <li><a href="admin_homepage.php">Home</a></li>
            <li><a href="sign-in.html">Log-Out</a></li>
        </ul>
    </nav>
</header>

<div id="add">
    <h2>Subscribers</h2><br>

    <form method="POST" onsubmit="return f1()">
        <label for="mealType">Meal Type:</label>
        <select id="mealType" name="mealType" required>
            <option value="">Select the type of meal--</option>
            <option value="veg">Veg</option>
            <option value="nonVeg">Non-Veg</option>
            <option value="vegan">Vegan</option>
        </select>
        <input type="submit" value="Submit" id="btn">
    </form>

    <?php if (isset($row)): ?>
        <p class="dis">First Name: <?= $row["firstName"]; ?></p>
        <p class="dis">Last Name: <?= $row["lastName"]; ?></p>
        <p class="dis">Contact Number: <?= $row["contactNumber"]; ?></p>
        <p class="dis">Meal Type: <?= $row["mealType"]; ?></p>
        <p class="dis">Dietary Restrictions: <?= $row["dietaryRestrictions"]; ?></p>
        <p class="dis">Special Instructions: <?= $row["specialInstructions"]; ?></p>
    <?php elseif (isset($error)): ?>
        <p><?= $error; ?></p>
    <?php endif; ?>
</div>

<footer>
    <p>Admin Contact: admin@tiffinboxservice.com</p>
</footer>
</body>
</html>
