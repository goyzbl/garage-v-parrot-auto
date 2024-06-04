<?php
session_start();

// Vérifier si l'utilisateur est connecté et est un employé ou un administrateur
if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin', 'employee'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une voiture d'occasion</title>
</head>
<body>
    <h2>Ajouter une voiture d'occasion</h2>
    <form action="add_car_handler.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="marque">Marque:</label>
            <input type="text" name="marque" id="marque" required>
        </div>
        <div>
            <label for="modele">Modèle:</label>
            <input type="text" name="modele" id="modele" required>
        </div>
        <div>
            <label for="annee">Année:</label>
            <input type="number" name="annee" id="annee" required>
        </div>
        <div>
            <label for="kilometrage">Kilométrage:</label>
            <input type="number" name="kilometrage" id="kilometrage" required>
        </div>
        <div>
            <label for="prix">Prix:</label>
            <input type="number" name="prix" id="prix" required>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" accept="image/*" required>
        </div>
        <button type="submit">Ajouter la voiture</button>
    </form>
</body>
</html>
