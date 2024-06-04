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

    $sql = "SELECT id, password, role FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id, $hashed_password, $role);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;
        header("Location: profile.php");
        exit();
    } else {
        echo "Identifiants invalides.";
    }

    $stmt->close();
}

$conn->close();
?>
