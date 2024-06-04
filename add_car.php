<?php
require 'config.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une voiture</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ajouter une nouvelle voiture</h1>
    <form action="add_car_handler.php" method="post" enctype="multipart/form-data">
        <label for="title">Titre:</label>
        <input type="text" id="title" name="title" required>
        <label for="mileage">Kilométrage:</label>
        <input type="number" id="mileage" name="mileage" required>
        <label for="year">Année:</label>
        <input type="number" id="year" name="year" required>
        <label for="price">Prix:</label>
        <input type="number" id="price" name="price" required>
        <label for="main_image">Image principale:</label>
        <input type="file" id="main_image" name="main_image" accept="image/*" required>
        <button type="submit">Ajouter la voiture</button>
    </form>
</body>
</html>
