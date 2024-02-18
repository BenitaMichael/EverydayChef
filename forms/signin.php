<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    // Validation
    // Initialize an array to store validation errors
    $errors = [];

    // Validate Email
    if (empty($Email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate Password
    if (empty($Password)) {
        $errors[] = "Password is required";
    } elseif (strlen($Password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }

    // If there are validation errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "everydaychef";

        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute SQL statement
        $sql = "SELECT * FROM registration WHERE Email = ? AND Password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $Email, $Password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Authentication successful
            echo "Authentication successful";
            // Redirect the user to a different page
            header("Location: ../index.html");
        } else {
            // Authentication failed
            echo "Authentication failed";
        }

        // Close connections
        $stmt->close();
        $conn->close();
    }
}
?>
