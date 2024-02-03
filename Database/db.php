<?php
$host = 'localhost';
$db = 'everydaychef';
//$user = 'your_username'; // Replace with your MySQL username
//$pass = 'your_password'; // Replace with your MySQL password

try {
	$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die("Connection failed: " . $e->getMessage());
}
?>