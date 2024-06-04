<?php
session_start();

// Vérification que l'utilisateur est un administrateur
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    echo "Accès refusé.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h2>Créer un nouveau compte employé</h2>
    <div class="form signup_form">
        <form action="inscription_traitement.php" method="POST">
            <div class="input_box">
                <input type="email" name="email" placeholder="Votre e-mail" required>
                <i class="fa-regular fa-envelope email"></i>
            </div>
            <div class="input_box">
                <input type="password" name="password" placeholder="Créer un mot de passe" required>
                <i class="fa-solid fa-lock"></i>
                <i class="uil uil-eye-slash pw_hide"></i>
            </div>
            <div class="input_box">
                <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
                <i class="fa-solid fa-lock"></i>
                <i class="uil uil-eye-slash pw_hide"></i>
            </div>
            <button class="button" type="submit">S'inscrire</button>
        </form>
    </div>
</body>
</html>
