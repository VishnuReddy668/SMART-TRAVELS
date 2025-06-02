<?php

 require_once('db.php');
 if (isset($_GET['number'])) {
    // Sanitize and get the phone number from the URL
    $number = mysqli_real_escape_string($con, $_GET['number']); 
    echo "Sanitized phone number: " . $number . "<br>";
    // var_dump($number);

    // Query to fetch user details based on the phone number
    $query = "SELECT * FROM users WHERE number = ?";
//  $query = "select * from users";
//  $result = mysqli_query($con,$query);
// $query = "SELECT * FROM users WHERE number = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 's', $number); // 's' for string
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
 if (mysqli_num_rows($result) > 0) {
    // Fetch the user data
    $user = mysqli_fetch_assoc($result);
    $firstName = $user['firstName'];
    $lastName = $user['lastName'];
    $gender = $user['gender'];
    $email = $user['email'];
    $journeyDetails = $user['journeyDetails']; // Assuming the column exists

 }
 else{
    $error_message="No details found for the phone number provided";
 }
}
 else{
    $error_message="No phone number provided.";
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Fetching Data From PHP</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1000px;
            margin-top: 50px;
        }
        .card-header {
            background-color: #343a40;
            color: #ffffff;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">View Journey Details
                            <!-- <?php echo $firstName . " " . $lastName; ?> -->
                        </h>
                    </div>
                    <div class="card-body">
                    <?php if (isset($error_message)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } else { ?>

                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <!-- <td>firstName</td>
                                <td>lastName</td>
                                <td>gender</td>
                                <td>email</td>
                                <td>password</td>
                                <td>number</td>
                                <td>Edit</td>
                                <td>Update</td>
                                <td>Delete</td> -->
                                <td><strong>First Name</strong></td>
                                    <td><strong>Last Name</strong></td>
                                    <td><strong>Gender</strong></td>
                                    <td><strong>Email</strong></td>
                                    <td><strong>Phone Number</strong></td>
                                    <td><strong>Journey Details</strong></td>
                            </tr>
                            <tr>
                            <td><?php echo isset($firstName) ? $firstName : ''; ?></td>
                                    <td><?php echo isset($lastName) ? $lastName : ''; ?></td>
                                    <td><?php echo isset($gender) ? $gender : ''; ?></td>
                                    <td><?php echo isset($email) ? $email : ''; ?></td>
                                    <td><?php echo isset($number) ? $number : ''; ?></td>
                                    <td><?php echo isset($journeyDetails) ? $journeyDetails : ''; ?></td>
                                </tr>

                            
                            
                        </table>
                        <?php }?>
                        </di>

                    </div>
                </div>
            </div>
        </div>

    </div>
    
</body>
</html>