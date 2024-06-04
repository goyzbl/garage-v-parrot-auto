<?php
require 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if (!$user) {
    echo "Utilisateur non trouvé.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Profil de <?php echo htmlspecialchars($user['username']); ?></h1>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    <p>Date de création: <?php echo htmlspecialchars($user['created_at']); ?></p>
    <a href="edit_profile.php">Modifier le profil</a>
    <a href="logout.php">Se déconnecter</a>
</body>
</html>
