<?php
require 'config.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$title = $_POST['title'];
$mileage = $_POST['mileage'];
$year = $_POST['year'];
$price = $_POST['price'];
$main_image = 'uploads/' . basename($_FILES['main_image']['name']);

if (move_uploaded_file($_FILES['main_image']['tmp_name'], $main_image)) {
    $sql = "INSERT INTO cars (title, mileage, year, price, main_image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $mileage, $year, $price, $main_image]);
    header("Location: dashboard.php");
} else {
    echo "Erreur lors du téléchargement de l'image.";
}
?>
