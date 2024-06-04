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

// Récupérer les informations de l'utilisateur
$user_id = $_SESSION['user_id'];
$sql = "SELECT email, role FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($email, $role);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="shortcut icon" href="ressources/LOGO-site.svg" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>
<body>
    <!-- Navigation -->
    <header class="header">
        <nav class="nav">
            <div class="nav_logo">
                <img src="ressources/GarageVP.svg" alt="Garage VP">
            </div>
            <ul class="nav_items">
                <li class="nav_item">
                    <a href="index.php" class="nav_link">Accueil</a>
                    <a href="logout.php" class="nav_link">Se Déconnecter</a>
                </li>
            </ul>
        </nav>
    </header>
    <img src="ressources/menu.svg" alt="logo menu" class="logo-menu">

    <!-- Profil -->
    <section class="profile-container">
        <div class="profile-content">
            <h2>Mon Profil</h2>
            <p><strong>Email :</strong> <?php echo $email; ?></p>
            <p><strong>Rôle :</strong> <?php echo $role; ?></p>
            <a href="index.php" class="button">Retour à l'accueil</a>
        </div>
    </section>

    <!-- Footer -->
    <div class="footer" id="privacy">
        <div class="footer-container container-foot">
            <div class="footer-box privacy">
                <h3>Juridique</h3>
                <a href="#">Confidentialité</a>
                <a href="#">Polique de remboursement</a>
                <a href="#">Politique relative aux cookies</a>
            </div>
        </div>
        <div class="footer-box">
            <h3>Page</h3>
            <a href="index.php#accueil">Accueil</a>
            <a href="index.php#service">Service</a>
            <a href="index.php#vente">Vente</a>
            <a href="index.php#avis">Avis</a>
            <a href="index.php#contact">Contact</a>
        </div>
        <div class="footer-box">
            <h3>Localisation</h3>
            <p><span>Rue :</span> 89 Rue Saint-Denis</p>
            <p><span>Ville :</span> Paris</p>
            <p><span>Code postal :</span> 75001</p>
            <p><span>Téléphone :</span> 01 40 26 08 64</p>
            <p><span>Pays :</span> France</p>
        </div>
    </div>
    <div class="footer-social">
        <div class="footer-box">
            <a href="#" class="logo">V<span>.</span>PARROT</a>
            <div class="social">
                <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <footer>Tous Droits Réservés &copy;</footer>
</body>
</html>
