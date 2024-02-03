<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$middlename = $_POST['middlename'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

	try {
		$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, middlename, username, email, password) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->execute([$firstname, $lastname, $middlename, $username, $email, $password]);

		echo "Registration successful!";
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
}
?>