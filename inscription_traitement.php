<?php
session_start();

// Récupérer les informations de connexion de la base de données à partir des variables d'environnement
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $cleardb_url["host"];
$username = $cleardb_url["user"];
$password = $cleardb_url["pass"];
$db = substr($cleardb_url["path"], 1);

// Connexion à la base de données
$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

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
