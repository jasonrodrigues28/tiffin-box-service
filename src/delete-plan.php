<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "WTproject");

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    // Delete the product with the given id
    $q2 = "DELETE FROM MealPlan WHERE MP_id = '$id'";
    $r2 = mysqli_query($conn, $q2);

    if ($r2) {
        echo "<script>alert('Plan deleted successfully');</script>";
        header("Location: admin_homepage.php");
    } else {
        echo "<script>alert('Error deleting Plan');</script>";
    }
}

// Fetch products
$q1 = "SELECT * from MealPlan";
$r1 = mysqli_query($conn, $q1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Plan</title>
    <link src="styles.css">
    <style>
        h1 {
            color: darkblue;
            font-size: 36px;
        }

        h2 {
            color: #2F4F4F;
            font-size: 28px;
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
    <div >
        <h2>Remove Plan</h2><br>
        
        <table border="1">
            <thead>
                <tr>
                    <th>Plan id</th>
                    <th>Plan Name</th>
                    <th>Plan Description</th>
                    <th>Price</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (mysqli_num_rows($r1) > 0) {
                    while ($row = mysqli_fetch_assoc($r1)) {
                        echo "<tr>
                            <td>" . $row['MP_id'] . "</td>
                            <td>" . $row['PlanName'] . "</td>
                            <td>" . $row['PlanDescription'] . "</td>
                            <td>" . $row['PlanPrice'] . "</td>
                            <td><a href='?delete_id=" . $row['MP_id'] . "' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</a></td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No products found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Close the connection
mysqli_close($conn);
?>
