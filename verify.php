<?php
require 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Query to fetch the user from the database
    $sql = "SELECT * FROM login WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, check the password
        $row = $result->fetch_assoc();
        $passwordFromDB = $row['password'];

        // Compare the entered password with the password from the database
        if ($password === $passwordFromDB) {
            // Login successful, redirect to welcome page
            header("Location: register-student.html");
            exit();  // Make sure to call exit after header to stop further code execution
        } else {
            // Invalid password
            echo "Invalid email or password.";
        }
    } else {
        // No user found with that email
        echo "No user found with that email.";
    }
}
?>
