<?php
$firstname =$_POST['firstname'];
$lastname = $_POST['lastname'];
$number = $_POST['number'];
$email = $_POST['email'];
$password = $_POST['password'];

//Database connection
$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('Connection Failed  : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration(firstname, lastname, number, email, password)
    values(?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss",$firstname, $lastname, $number, $email, $password);
    $stmt->execute();
    echo "Registration Successfully...";
    $stmt->close();
    $conn->close();
}
