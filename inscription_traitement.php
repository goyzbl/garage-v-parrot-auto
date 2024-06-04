<?php
require 'config.php';

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (email, password) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email, $password]);

header("Location: login.php");
?>
