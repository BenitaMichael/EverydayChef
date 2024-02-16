<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Middlename = $_POST['Middlename'];
    $Email = $_POST['Email'];
    $Password = $_['Password'];
    $Password2 = $_['Password2'];

    // Validation
    // Initialize an array to store validation errors
    $errors = [];

    // Validate Firstname
    if (empty($Firstname)) {
        $errors[] = "Firstname is required";
    }

    // Validate Lastname
    if (empty($Lastname)) {
        $errors[] = "Lastname is required";
    }

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

    // Validate Password2 (Password confirmation)
    if ($Password !== $Password2) {
        $errors[] = "Passwords do not match";
    }

    // If there are validation errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "password";
        $dbname = "everydaychef";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO registration (Firstname, Lastname, Middlename, Email, Password) VALUES ('$Firstname', '$Lastname', '$Middlename', '$Email', '$Password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        header("Location: dashboard.html");
        exit;
    }
}
?>