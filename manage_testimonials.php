<?php
session_start();

// Vérification que l'utilisateur est connecté et est un administrateur
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];

    // Insertion du nouveau témoignage
    $sql = "INSERT INTO testimonials (name, comment, rating) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $comment, $rating);
    
    if ($stmt->execute()) {
        echo "Témoignage ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du témoignage.";
    }

    $stmt->close();
}

if (isset($_POST['approve'])) {
    $testimonial_id = $_POST['testimonial_id'];
    $sql = "UPDATE testimonials SET approved = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $testimonial_id);
    
    if ($stmt->execute()) {
        echo "Témoignage approuvé avec succès.";
    } else {
        echo "Erreur lors de l'approbation du témoignage.";
    }

    $stmt->close();
}

$result = $conn->query("SELECT * FROM testimonials");

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les témoignages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f4f4f4;
        }
        h1 {
            margin-top: 20px;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        form div {
            margin-bottom: 15px;
        }
        .input_box {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], textarea, input[type="number"] {
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
        }
        button {
            padding: 10px 15px;
            border: none;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
            width: 100%;
            max-width: 600px;
        }
        ul li {
            background: white;
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .approve-form {
            display: inline;
        }
        .approve-button {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .approve-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Gérer les témoignages</h1>
    <form action="manage_testimonials.php" method="POST">
        <div class="input_box">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" placeholder="Nom" required />
        </div>
        <div class="input_box">
            <label for="comment">Commentaire</label>
            <textarea name="comment" id="comment" placeholder="Commentaire" required></textarea>
        </div>
        <div class="input_box">
            <label for="rating">Note (1-5)</label>
            <input type="number" name="rating" id="rating" placeholder="Note (1-5)" required min="1" max="5" />
        </div>
        <button class="button" type="submit">Ajouter le témoignage</button>
    </form>
    <h2>Témoignages existants</h2>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <?php echo $row['name'] . ": " . $row['comment'] . " - " . $row['rating'] . "/5"; ?>
                <?php if (!$row['approved']): ?>
                    <form class="approve-form" action="manage_testimonials.php" method="POST">
                        <input type="hidden" name="testimonial_id" value="<?php echo $row['id']; ?>" />
                        <button type="submit" name="approve" class="approve-button">Approuver</button>
                    </form>
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
