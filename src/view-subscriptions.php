<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribers List - Tiffin Box Service</title>
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
    </style>
</head>
<body>
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
</body>
</html>
