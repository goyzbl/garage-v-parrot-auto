<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Vérification du rôle de l'utilisateur
$is_admin = $_SESSION['role'] == 'admin';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
</head>
<body>
    <h1>Bienvenue au tableau de bord</h1>
    <?php if ($is_admin): ?>
        <a href="manage_services.php">Gérer les services</a><br>
        <a href="manage_hours.php">Gérer les horaires</a><br>
        <a href="inscription.php">Ajouter un employé</a><br>
    <?php endif; ?>
    <a href="manage_cars.php">Gérer les voitures d'occasion</a><br>
    <a href="manage_testimonials.php">Gérer les témoignages</a><br>
    <a href="logout.php">Se déconnecter</a>
</body>
</html>
