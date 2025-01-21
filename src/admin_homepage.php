<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Home - Tiffin Box Service</title>
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

        .admin-section {
            margin: 20px 0;
        }

        .admin-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 10px 0;
            border: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
        }

        .admin-button:hover {
            background-color: #45a049;
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
    <!-- Header -->
    <header>
        <h1>Admin Dashboard - Tiffin Box Service</h1>
        <nav>
            <ul>
                <li><a href="admin_homepage.php">Home</a></li>
                <li><a href="sign-in.html">Log-Out</a></li>
            </ul>
        </nav>
    </header>
    
    <!-- Admin Home Content -->
    <section class="admin-section">
        <h2>Welcome, Admin!</h2>
        <p>Select an option to manage the Tiffin Box Service.</p>
        
        <div>
            <button class="admin-button" onclick="location.href='view-subscriptions.php'">View Subscriptions</button><br>
        </div>
    </section>
    
    <!-- Plans Table for Editing -->
    <section class="admin-section" id="edit-plans">
        <h2>Meal Plans</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Plan Id</th>
                    <th>Plan Name</th>
                    <th>Description</th>
                    <th>Price</th>
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
                $sql = "SELECT MP_id,PlanName,PlanDescription,PlanPrice FROM MealPlan";
                $result = mysqli_query($conn,$sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["MP_id"] . "</td>";
                        echo "<td>" . $row["PlanName"] . "</td>";
                        echo "<td>" . $row["PlanDescription"] . "</td>";
                        echo "<td>" . $row["PlanPrice"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No Plans found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
        <button class="admin-button" onclick="location.href='add-plan.html'">Add New Meal Plan</button><br>
        <button class="admin-button" onclick="location.href='update-plan.php'">Edit Meal Plans</button><br>
        <button class="admin-button" onclick="location.href='delete-plan.php'">Delete Meal Plan</button><br>
    </section>

    <!-- Footer -->
    <footer>
        <p>Admin Contact: admin@tiffinboxservice.com</p>
    </footer>
</body>
</html>
