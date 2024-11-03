<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tiffin Box Service</title>
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
        #subscribe form input[type="text"],
        #subscribe form input[type="tel"],
        #subscribe form select,
        #subscribe form textarea {

            padding: 10px;
            margin-bottom: 10px;
            width: 100%; /* Ensures that fields take the full width within the container */
            box-sizing: border-box; /* Includes padding in the total width */
        }
    </style>
    <script>
        function f1()
        {
            var isValid = true;
            var messages = [];

            // Validating first and last name
            var fname = document.getElementById("fn").value;
            var lname = document.getElementById("ln").value;

            if (fname === "") {
                messages.push("First name cannot be empty");
                isValid = false;
            }
            if (lname === "") {
                messages.push("Last name cannot be empty");
                isValid = false;
            }

            var pn=document.getElementById("pn").value;
            var x=/^[789]{1}[0-9]{9}$/;
            
            if(x.test(pn)==false)
            {
                messages.push("Invalid Phone number");
                isValid = false;
            }

            var mealType=document.getElementById("mealType");
            var y=mealType.options[mealType.selectedIndex].value;
            if(y=="")
            {
                messages.push("Please select your meal type");
                isValid = false;
            }



            var dRestrictions = document.getElementById("dietaryRestrictions").value;
            if (dRestrictions === "") {
                messages.push("Dietary Restrcitions cannot be empty");
                isValid = false;
            }

            var spIns = document.getElementById("specialInstructions").value;
            if (spIns === "") {
                messages.push("Special Instructions cannot be empty");
                isValid = false;
            }
            //show the erros at once all together
            if(!isValid){
                alert(messages.join("\n"));
            }

            return isValid;
        }
            
    </script>
</head>
<body>
    <!-- Header | use IDs to jump in the page -->
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
                <li><a href="sign-in.html">Log-Out</a></li>

            </ul>
        </nav>
    </header>
    
    <!-- Welcome Section -->
    <section id="welcome">
        <h2 style="color: green;">Welcome to Our Tiffin Box Service</h2>    <!--INLINE CSS-->
        <p>We provide delicious and healthy meals delivered to your doorstep.</p>
        <h3>Why Choose Us?</h3>
        <ul>
            <li>Fresh and Healthy Ingredients</li>
            <li>Variety of Meal Plans</li>
            <li>Convenient Delivery</li>
            <li>Affordable Prices</li>
        </ul>
    </section>

    <section id="about">
        <h2>About Our Service</h2>
        <img src="../pics/about us.jpg" alt="Delicious Tiffin Box" style="border: 2px solid #ccc;">
    </section>
    
    <div style="background-color: #f0f0f0; border-radius: 5px;">
        <h3>Special Offer!</h3>
        <p>Subscribe now and get 10% off your first month!</p>
    </div>    
    
    <!-- Plans Section -->
    <section id="plans">
        <h2>Our Plans</h2>
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
                // Close the connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </section>
    
    <!-- Subscription Form -->
    <section id="subscribe">
        <h2>Subscribe Now</h2>
        <form action="insertHome.php" method="post" onsubmit="return f1()">
            <label for="fn">First Name:</label>
            <input type="text" id="fn" name="fn" required>

            <label for="ln">Last Name:</label>
            <input type="text" id="ln" name="ln" required>

            <label for="pn">Contact Number:</label><br>
            <input type="tel" id="pn" name="pn" required><br>

            <!-- Meal Preferences -->
            <label for="mealType">Meal Type:</label>
            <select id="mealType" name="mealType" required>
                <option value="">--</option>
                <option value="veg">Veg</option>
                <option value="nonVeg">Non-Veg</option>
                <option value="vegan">Vegan</option>
            </select>

            <label for="dietaryRestrictions">Dietary Restrictions:</label>
            <input type="text" id="dietaryRestrictions" name="dietaryRestrictions" placeholder="e.g., Gluten-Free, No Sugar" required>

            <!-- Special Instructions -->
            <label for="specialInstructions">Any Notes for the Chef?</label>
            <textarea id="specialInstructions" name="specialInstructions" rows="4" placeholder="Enter any special instructions..." required></textarea>

            <!-- Submit Order Button -->
            <input type="submit" value="Place Order"><br><br>
            <input type="reset" value="Clear Form"><br><br>
        </form>
    </section>
    
    <section id="customer_review">
        <h2>What Our Customers Say</h2>
        <ol>
            <li>"The meals are always fresh and tasty!" - Shubham Patil</li>
            <li>"Great variety and excellent service." - Narayan Sutar</li>
            <li>"I love the convenience of home delivery." - Mokshad Naik</li>
        </ol>
    </section>

    <section id="features">
        <h2>Key Features</h2>
        <dl>
            <dt>Fresh Ingredients</dt>
            <dd>-We use only the freshest ingredients in our meals.</dd>
            <dt>Convenient Delivery</dt>
            <dd>-Meals delivered right to your door.</dd>
            <dt>Affordable Prices</dt>
            <dd>-Enjoy quality meals without breaking the bank.</dd>
        </dl>
    </section>
    
    
    <!-- Footer -->
    <footer id="Contact">
        <p>Contact us: info@tiffinboxservice.com</p>
        <p>Visit our <a href="https://www.google.com">official website</a> for more information.</p>
    </footer>
</body>
</html>