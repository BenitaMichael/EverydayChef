<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	try {
		$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
		$stmt->execute([$username]);
		$user = $stmt->fetch();

		if ($user && password_verify($password, $user['password'])) {
			echo "Login successful!";
			// You can set session variables or redirect to a dashboard page here
		} else {
			echo "Invalid username or password.";
		}
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
}
?>
