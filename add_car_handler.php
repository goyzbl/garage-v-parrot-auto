<?php
session_start();

// Vérifier si l'utilisateur est connecté et est un employé ou un administrateur
if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin', 'employee'])) {
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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $kilometrage = $_POST['kilometrage'];
    $prix = $_POST['prix'];
    
    // Gérer le téléchargement de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Vérifier si le fichier est une image
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check !== false) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                // Insérer les données de la voiture dans la base de données
                $sql = "INSERT INTO cars (marque, modele, annee, kilometrage, prix, image) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssiiis", $marque, $modele, $annee, $kilometrage, $prix, $target_file);
                
                if ($stmt->execute()) {
                    echo "Voiture ajoutée avec succès.";
                    header("Location: index.php");
                } else {
                    echo "Erreur lors de l'ajout de la voiture : " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Erreur lors du téléchargement de l'image.";
            }
        } else {
            echo "Le fichier n'est pas une image.";
        }
    } else {
        echo "Aucune image téléchargée.";
    }
}

$conn->close();
?>
