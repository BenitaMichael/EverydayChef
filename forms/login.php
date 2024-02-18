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

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM registration WHERE Email = '$Email' AND Password = '$Password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = nysqli_num_rows($result)

        // if ($conn->query($sql) === TRUE) {
        //     echo "$sql";
        // } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        // }

        $conn->close();
        // header("Location: ../index.html");
        exit;
    }
}
?>