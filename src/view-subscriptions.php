<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribers List - Tiffin Box Service</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        h1 {
            color: darkblue;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        footer {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }
        /* Set html and body to 100% height */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        /* Flex container for the entire page */
        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Main content flex */
        .content {
            flex: 1;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard - Tiffin Box Service</h1>
        <nav>
            <ul>
                <li><a href="admin_homepage.php">Home</a></li>
            </ul>
        </nav>
    </header>
    <div class="content">
    <h1>Subscribers List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact Number</th>
                <th>Meal Type</th>
                <th>Dietary Restrictions</th>
                <th>Special Instructions</th>
            </tr>
        </thead>
        <tbody>
            <?php
           $conn = mysqli_connect("localhost", "root", "", "WTproject");
            // Check connection
            if (!$conn) {
                die("Connection failed: ");
            }

            // Fetching subscriber data
            $sql = "SELECT id,firstName,lastName,contactNumber,mealType,dietaryRestrictions,specialInstructions FROM subscriptions";
            $result = mysqli_query($conn,$sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["firstName"] . "</td>";
                    echo "<td>" . $row["lastName"] . "</td>";
                    echo "<td>" . $row["contactNumber"] . "</td>";
                    echo "<td>" . $row["mealType"] . "</td>";
                    echo "<td>" . $row["dietaryRestrictions"] . "</td>";
                    echo "<td>" . $row["specialInstructions"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No subscribers found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    </div>
    <footer>
        <p>Admin Contact: admin@tiffinboxservice.com</p>
    </footer>
</body>
</html>
