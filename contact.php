<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contacts (nom, email, message) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $email, $message]);

    echo "Merci pour votre message!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contactez-nous</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Contactez-nous</h1>
    <form method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
