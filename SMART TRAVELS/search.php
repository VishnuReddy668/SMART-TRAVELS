<?php
// Database connection details
$host = 'localhost';
$username = 'root'; // Replace with your DB username
$password = ''; // Replace with your DB password
$dbname = 'destination'; // Replace with your DB name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the input data
    $from = htmlspecialchars($_POST['from']);
    $to = htmlspecialchars($_POST['to']);

    // Insert data into the database
    $sql = "INSERT INTO journeys (from_location, to_location) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $from, $to);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "<p>Route from '$from' to '$to' has been stored successfully.</p>";
    } else {
        echo "<p>Error storing route: " . $stmt->error . "</p>";
    }

    // Close the statement
    $stmt->close();
}

// Fetch all stored routes and display them
$sql = "SELECT * FROM routes ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5'>
            <tr>
                // <th>ID</th>
                <th>From</th>
                <th>To</th>
            </tr>";
    // Output the stored routes
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                // <td>" . $row['id'] . "</td>
                <td>" . $row['from_location'] . "</td>
                <td>" . $row['to_location'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No routes found.</p>";
}

// Close the database connection
$conn->close();
?>
