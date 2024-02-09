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
    if ($conn->connect_error){
        die('Connection Fialed : ' '.$conn->connect_error');
    }
    else{
        $stmt - $conn->prepare("insert into registration(Firstname, Lastname, Middlename, Username, Email, Password, Password2)
        value(?,?,?,?,?,?,?)")
        $stmt->bind_param("sssssss",$Firstname, $Lastname, $Middlename, $Username, $Email, $Password, $Password2);
        $stmt->execute();
        echo "Thank you for registering...";
        $stmt->close();
    }

    
?>