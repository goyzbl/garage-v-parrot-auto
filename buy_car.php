<?php
require 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$car_id = $_GET['id'];
$sql = "SELECT * FROM cars WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$car_id]);
$car = $stmt->fetch();

if (!$car) {
    echo "Voiture non trouvée.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the purchase (e.g., update the database, send a confirmation email, etc.)
    echo "Achat confirmé!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Acheter une voiture</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Acheter la voiture: <?php echo htmlspecialchars($car['title']); ?></h1>
    <form method="post">
        <p>Kilométrage: <?php echo htmlspecialchars($car['mileage']); ?> km</p>
        <p>Année: <?php echo htmlspecialchars($car['year']); ?></p>
        <p>Prix: <?php echo htmlspecialchars($car['price']); ?> €</p>
        <button type="submit">Confirmer l'achat</button>
    </form>
</body>
</html>
