<?php
include "db.php";
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = $conn->prepare("INSERT INTO users (username, password) VALUES (?,?)");
    $sql->bind_param("ss", $username, $password);
    $sql->execute();
}
header('location:login.php');
?>