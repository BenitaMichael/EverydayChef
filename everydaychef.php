<?php
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Middlename = $_POST['Middlename'];
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = $_['Password'];
    $Password2 = $_['Password2'];


    //CONNECT DATABASE
	$conn = new mysqli('localhost','root','','everydaychef');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(Firstname, Lastname, Middlename, Email, Password, Password2) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $Firstname, $Lastname, $Middlenmae, $Email, $Password, $Password2);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully";
		$stmt->close();
		$conn->close();
	}
?>