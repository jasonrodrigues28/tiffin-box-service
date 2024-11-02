<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "WTproject");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['update'])) {
    $p_no = $_POST['MP_id'];
    $change = $_POST['change']; 
    $new_value = $_POST['new_value']; 

    switch ($change) {
        case 1:
            $q = "UPDATE MealPlan SET PlanName = '$new_value' WHERE MP_id = '$p_no'";
            break;
        case 2:
            $q = "UPDATE MealPlan SET PlanDescription = '$new_value' WHERE MP_id = '$p_no'";
            break;
        case 3:
            $q = "UPDATE MealPlan SET PlanPrice = '$new_value' WHERE MP_id = '$p_no'";
            break;
        default:
            echo "<script>alert('Invalid option selected.');</script>";
            break;
    }

    if (isset($q)) {
        $r = mysqli_query($conn, $q);
        if ($r) {

            echo "<script>alert('Plan updated successfully.');</script>";
            header("Location: admin_homepage.php");
        } else {
            echo "<script>alert('Error updating Plan.');</script>";
        }
    }
}

// Fetch meal plans
$q1 = "SELECT  * FROM MealPlan";
$r1 = mysqli_query($conn, $q1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meal Plan - Tiffin Box Service</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function f1() {
            var isValid = true;
            var messages = [];
            
            var change = document.getElementById("change");
            var choice = change.value;
            if (choice === "") {
                messages.push("Please select the field to update");
                isValid = false;
            } else if (choice === "3") {
                var val = document.getElementById("new_value").value;
                var pricePattern = /^Rs\.[0-9]+\/month$/;
                if (!pricePattern.test(val)) {
                    messages.push("Invalid price format. Example: Rs.500/month");
                    isValid = false;
                }
            }

            if (!isValid) {
                alert(messages.join("\n"));
            }
            return isValid;
        }
    </script>
</head>
<body>
    <h1>Edit Meal Plan</h1>
    <div id="edit">
        <form method="POST" action="" onsubmit="return f1()">
            <label>Select Plan to Update:</label>
            <select id="MP_id" name="MP_id" required>
                <option value="">Select a plan</option>
                <?php
                    while ($row = mysqli_fetch_assoc($r1)) {
                        echo "<option value='" . $row['MP_id'] . "'>" . $row['PlanName']  . "</option>";
                    }
                ?>
            </select><br>

            <label>What do you want to update?</label>
            <select id="change" name="change" required>
                <option value="">Select an option</option>
                <option value="1">Plan Name</option>
                <option value="2">Plan Description</option>
                <option value="3">Price</option>
            </select><br>

            <label>New Value:</label><br>
            <input type="text" id="new_value" name="new_value" placeholder="Enter new value" required><br>

            <button type="submit" name="update" class="submit-button">Submit</button>
        </form>
    </div>
</body>
</html>
<?php
// Close the connection
mysqli_close($conn);
?>
