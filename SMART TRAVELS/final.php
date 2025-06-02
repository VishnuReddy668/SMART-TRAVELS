<?php

require_once('index.html');
$query = "select * from priya";
$result = mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket and User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            display: flex;
            justify-content: space-between;
            width: 800px;
            padding: 20px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .section {
            width: 48%;
            padding: 10px;
        }
        h2 {
            color: #004d40;
            text-align: center;
        }
        .info {
            margin: 15px 0;
            text-align: left;
            line-height: 1.8;
        }
        .info p {
            margin: 0;
            color: #333;
        }
        .info p span {
            font-weight: bold;
            color: #00796b;
        }
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #00796b;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-align: center;
            width: 100%;
        }
        .back-btn:hover {
            background-color: #004d40;
        }
        .button-container{
            text-align:center;
            margin-top: 30px;
        }
        
    </style>
</head>
<body>
  

<div class="container">
    <!-- Ticket Details Section -->

  
    <div class="section">
        <h2>Ticket Details</h2>
        <div class="info">
            <p><span>From:</span> </p>
            <p><span>To:</span> </p>
            <p><span>Departure Time:</span></p>
            <p><span>Arrival Time:</span></p>
            <p><span>Price:</span> </p>
            <p><span>Seat Number:</span></p>
            <!-- <p><span>Booking Date:</span></p> -->
        </div>
    </div>

    <!-- User Details Section -->
    <div class="section">
        <h2>User Details</h2>
        <div class="info">
            <p><span>First Name:</span> </p>
            <p><span>Last Name:</span></p>
            <p><span>Email:</span> </p>
            <p><span>Gender:</span> </p>
            <p><span>Phone Number:</span></p>
            <!-- <p><span>Booking ID:</span> </p> -->
        </div>
    </div>
</div>
                            <?php
                                while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <td><?php echo $row['firstname'];?></td>
                                    <td><?php echo $row['lastname'];?></td>
                                    <td><?php echo $row['gender'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    
                                    <!-- <td><a href="#" class="btn btn-light-green">Present</td> -->
                                    <!-- <td><a href="#" class="btn btn-orange">Absent</td> -->
                            </tr>   
                                    <?php
                                }
                                ?>

<div style="text-align: center; margin-top: 20px;">
    <a href="yoshiindex.html" class="back-btn">Back to Home</a>
</div>

</body>
</html>
