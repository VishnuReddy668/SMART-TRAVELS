<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','priya');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into users(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
		if ($stmt->execute()) {
			echo "Booked Successfully.Redirecting  to payment....";
			// Close statement and connection before redirecting
			$stmt->close();
			$conn->close();
			
			// Redirect to payment.html
			header("refresh:3;url=payment.html");
			exit(); // Ensure the script stops after redirection
		} else {
			echo "Registration failed: " . $stmt->error;
		}

		// $execval = $stmt->execute();
		// echo $execval;
		// echo "Registration successfully...";
		// $stmt->close();
		// $conn->close();
	}
?>