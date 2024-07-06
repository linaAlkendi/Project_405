<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "spacy";

// Process form data  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare a SQL query to fetch user data
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $actualPassword = $row["password"];
        if (hash_equals($actualPassword, $password)) {
            // Password is correct, redirect to the home page
            header("Location: planetPage.html");
            exit();
        } else {
            // Incorrect password
            $errorMessage = "Incorrect password!";
            echo "<script>alert('$errorMessage'); window.location.href='Login.html';</script>";
            exit();
        }
    } else {
        // User doesn't exist
        header("Location: signUp.html");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>