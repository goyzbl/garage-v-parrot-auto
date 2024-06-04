<?php
require 'config.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM services";
$stmt = $pdo->query($sql);
$services = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les services</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gérer les services</h1>
    <a href="add_service.php">Ajouter un nouveau service</a>
    <h2>Liste des services</h2>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service): ?>
                <tr>
                    <td><?php echo htmlspecialchars($service['name']); ?></td>
                    <td><?php echo htmlspecialchars($service['description']); ?></td>
                    <td><?php echo htmlspecialchars($service['price']); ?> €</td>
                    <td>
                        <a href="edit_service.php?id=<?php echo $service['id']; ?>">Modifier</a>
                        <a href="delete_service.php?id=<?php echo $service['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
