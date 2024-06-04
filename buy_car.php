<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Configuration de la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "garage_db";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['car_id'])) {
    $car_id = $_POST['car_id'];
    $user_id = $_SESSION['user_id'];

    // Ajouter l'achat dans la base de données
    $sql = "INSERT INTO purchases (user_id, car_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $car_id);

    if ($stmt->execute()) {
        echo "Achat effectué avec succès.";
    } else {
        echo "Erreur lors de l'achat : " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Achat de Voiture</title>
</head>
<body>
    <h2>Achat de Voiture</h2>
    <p>Merci pour votre achat. Nous vous contacterons bientôt pour finaliser les détails.</p>
    <a href="index.php">Retour à l'accueil</a>
</body>
</html>
