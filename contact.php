<?php
session_start();

// Récupérer les informations de connexion de la base de données à partir des variables d'environnement
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername = $cleardb_url["host"];
$username = $cleardb_url["user"];
$password = $cleardb_url["pass"];
$dbname = substr($cleardb_url["path"], 1);

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insertion du message de contact
    $sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);
    
    if ($stmt->execute()) {
        echo "Message envoyé avec succès.";
    } else {
        echo "Erreur lors de l'envoi du message : " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
