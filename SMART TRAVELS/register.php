<?php 

include 'connect.php';

if(isset($_POST['signUp'])){
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=$_POST['password'];
    $hashesPassword=password_hash($password,PASSWORD_DEFAULT);

     $checkEmail="SELECT * From users where email='$email'";
     $result=$conn->query($checkEmail);
     if($result->num_rows>0){
        echo "Email Address Already Exists !";
     }
     else{
        $insertQuery="INSERT INTO users(firstName,lastName,email,password)
                       VALUES ('$firstName','$lastName','$email','$password')";
            if($conn->query($insertQuery)==TRUE){
                header("location: index.php");
            }
            else{
                echo "Error:".$conn->error;
            }
     }
   

}

if(isset($_POST['signIn'])){
   $email=trim($_POST['email']);
   $password=trim($_POST['password']);
    $password=$_POST['password'] ;
   
   $sql="SELECT * FROM users WHERE email='$email'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    $row = $result->fetch_assoc;
    if(password_verify($password,$row['password']))
   

    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    header("Location: slide.html");
    exit();
   }
   else{
    echo "Not Found, Incorrect Email or Password";
   }
}


?>