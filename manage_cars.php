<?php
session_start();

// Vérifier si l'utilisateur est un administrateur
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
    $title = $_POST['title'];
    $price = $_POST['price'];
    $year = $_POST['year'];
    $mileage = $_POST['mileage'];
    $description = $_POST['description'];
    $features = $_POST['features'];
    
    // Gestion de l'upload de l'image principale
    $main_image = '';
    if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] == 0) {
        $main_image = 'uploads/' . basename($_FILES['main_image']['name']);
        move_uploaded_file($_FILES['main_image']['tmp_name'], $main_image);
    }

    // Gestion des images supplémentaires
    $images = [];
    if (isset($_FILES['images']) && count($_FILES['images']['name']) > 0) {
        foreach ($_FILES['images']['name'] as $key => $name) {
            if ($_FILES['images']['error'][$key] == 0) {
                $image_path = 'uploads/' . basename($name);
                move_uploaded_file($_FILES['images']['tmp_name'][$key], $image_path);
                $images[] = $image_path;
            }
        }
    }
    $images_json = json_encode($images);

    // Insertion de la nouvelle voiture
    $sql = "INSERT INTO cars (title, price, year, mileage, main_image, description, images, features) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdisssss", $title, $price, $year, $mileage, $main_image, $description, $images_json, $features);
    
    if ($stmt->execute()) {
        echo "Voiture ajoutée avec succès.";
    } else {
        echo "Erreur lors de l'ajout de la voiture.";
    }

    $stmt->close();
}

$result = $conn->query("SELECT * FROM cars");

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les voitures d'occasion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #1e1c1a;
        }
        h1 {
            margin-top: 20px;
            color: #ff9900;
        }
        form {
            background: rgba(51, 47, 47, 0.08);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 20px;
            color: #ff9900;
        }
        form div {
            margin-bottom: 15px;
        }
        .input_box {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], input[type="number"], input[type="file"], textarea {
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
            background-color: #ff9900;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .container {
            display: flex;
            justify-content: center;
            background-color: #1e1c1a;
            flex-wrap: wrap;
            border-bottom: 1px solid #ff9900;
            margin-top: 20px;
            padding: 20px;
        }
        .card {
            background: rgba(217, 217, 217, 0.08);
            width: 370px;
            margin: 10px;
            border-radius: 15px;
            border: 2px solid #1e1c1a;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
        .card-image {
            background-size: cover;
            background-position: center;
            height: 250px;
            margin-bottom: 15px;
            border-radius: 15px 15px 0 0;
        }
        h2{
            color: #ff9900;
        }
    </style>
</head>
<body>
    <h1>Gérer les voitures d'occasion</h1>
    <form action="manage_cars.php" method="POST" enctype="multipart/form-data">
        <div class="input_box">
            <label for="title">Titre de la voiture</label>
            <input type="text" name="title" id="title" placeholder="Titre de la voiture" required />
        </div>
        <div class="input_box">
            <label for="price">Prix</label>
            <input type="number" name="price" id="price" placeholder="Prix" required />
        </div>
        <div class="input_box">
            <label for="year">Année</label>
            <input type="number" name="year" id="year" placeholder="Année" required />
        </div>
        <div class="input_box">
            <label for="mileage">Kilométrage</label>
            <input type="number" name="mileage" id="mileage" placeholder="Kilométrage" required />
        </div>
        <div class="input_box">
            <label for="main_image">Image principale</label>
            <input type="file" name="main_image" id="main_image" required />
        </div>
        <div class="input_box">
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Description"></textarea>
        </div>
        <div class="input_box">
            <label for="images">Galerie d'images (séparées par des virgules)</label>
            <input type="file" name="images[]" id="images" multiple />
        </div>
        <div class="input_box">
            <label for="features">Caractéristiques</label>
            <textarea name="features" id="features" placeholder="Caractéristiques"></textarea>
        </div>
        <button class="button" type="submit">Ajouter la voiture</button>
    </form>
    <h2>Voitures existantes</h2>
    <div class="container">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="card">
                <div class="card-image" style="background-image: url('<?php echo $row['main_image']; ?>');"></div>
                <h3><?php echo $row['title']; ?></h3>
                <p>Prix : <?php echo $row['price']; ?> €</p>
                <p>Année : <?php echo $row['year']; ?></p>
                <p>Kilométrage : <?php echo $row['mileage']; ?> km</p>
                <p><?php echo $row['description']; ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
