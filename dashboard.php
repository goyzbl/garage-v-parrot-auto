<?php
require 'config.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM cars";
$stmt = $pdo->query($sql);
$cars = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tableau de bord</h1>
    <a href="add_car.php">Ajouter une nouvelle voiture</a>
    <h2>Liste des voitures</h2>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Kilométrage</th>
                <th>Année</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car): ?>
                <tr>
                    <td><?php echo htmlspecialchars($car['title']); ?></td>
                    <td><?php echo htmlspecialchars($car['mileage']); ?></td>
                    <td><?php echo htmlspecialchars($car['year']); ?></td>
                    <td><?php echo htmlspecialchars($car['price']); ?> €</td>
                    <td>
                        <a href="edit_car.php?id=<?php echo $car['id']; ?>">Modifier</a>
                        <a href="delete_car.php?id=<?php echo $car['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette voiture?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
