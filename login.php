<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Database Connection
    $db_user = "marinos";
    $db_password = "password";
    $db_server = "localhost";
    $db_name = "contactsdb";

    $con = mysqli_connect($db_server, $db_user, $db_password, $db_name);
    
    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Validate login Authentication
    $query = "SELECT * FROM login WHERE username=? AND password=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $input_username, $input_password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        // Set session variables
        $_SESSION['username'] = $input_username;
        // Redirect to DisplayInfo.php
        header("Location: DisplayInfo.php");
        exit();
    } else {
        // Login Failed
        header("Location: error.html");
        exit();
    }

    $con->close();
} else if (isset($_SESSION['username'])) {
    // User is already logged in
    header("Location: DisplayInfo.php");
    exit();
} else {
    // Redirect to login page if accessed directly
    header("Location: login.html");
    exit();
}
?>

