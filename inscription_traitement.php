<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Vérification si les mots de passe correspondent
    if ($password != $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }

    // Hachage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Vérification si l'email existe déjà
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Cet email est déjà utilisé.";
        $stmt->close();
        exit();
    }

    $stmt->close();

    // Insertion du nouvel utilisateur
    $sql = "INSERT INTO users (email, password, role) VALUES (?, ?, 'user')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $hashed_password);
    
    if ($stmt->execute()) {
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = 'user';
        header("Location: profile.php");
        exit();
    } else {
        echo "Erreur lors de l'inscription.";
    }

    $stmt->close();
}

$conn->close();
?>
