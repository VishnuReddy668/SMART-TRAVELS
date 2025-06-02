<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in (i.e., the email is stored in the session)
if (!isset($_SESSION['email'])) {
    // If not logged in, redirect to the login page (index.php or login.php)
    header("Location: index.php");
    exit();  // Ensure no further code runs after the redirect
}

// You can access user details like this (optional)
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select State</title>
    <style>
        /* Add your existing CSS here */
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        img {
            max-width: 100%; /* Responsive design */
            height: auto; /* Maintain aspect ratio */
        }

        /* Body styling */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Label styling */
        label {
            font-size: 24px; /* Increased font size */
            font-weight: bold;
            margin-right: 15px;
            color: #007BFF; /* Changed font color */
        }

        /* Dropdown styling */
        select {
            padding: 10px 20px;
            font-size: 20px; /* Increased font size */
            font-weight: bold;
            border-radius: 5px;
            border: 2px solid #ccc;
            background-color: #fff;
            color: #333; /* Text color for dropdown */
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        /* Hover effect for dropdown */
        select:hover {
            border-color: red;
        }

        /* Focus effect for dropdown */
        select:focus {
            outline: none;
            border-color: red;
        }

        .andhra-font {
            font-family: 'Lato', sans-serif;
        }
    </style>
</head>
<body>
    <div>
        <h2>Welcome, <?php echo $email; ?>! Please select your state.</h2>
        <label for="dropdown">Select The State :</label>
        <select id="dropdown" name="dropdown" onchange="checkState()">
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Odisha">Odisha</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="West Bengal">West Bengal</option>
        </select>
        <br>
    </div>

    <script>
        function checkState() {
            const dropdown = document.getElementById('dropdown');
            const selectedValue = dropdown.value;

            if (selectedValue === "Andhra Pradesh") {
                window.location.href = "grid.html"; // Update this to whatever action should happen for this state
            } else {
                alert("We are working on it.");
            }
        }
    </script>
</body>
</html>
