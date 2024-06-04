<?php
require 'config.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM testimonials";
$stmt = $pdo->query($sql);
$testimonials = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les témoignages</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gérer les témoignages</h1>
    <a href="add_testimonial.php">Ajouter un nouveau témoignage</a>
    <h2>Liste des témoignages</h2>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Commentaire</th>
                <th>Note</th>
                <th>Approuvé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($testimonials as $testimonial): ?>
                <tr>
                    <td><?php echo htmlspecialchars($testimonial['name']); ?></td>
                    <td><?php echo htmlspecialchars($testimonial['comment']); ?></td>
                    <td><?php echo htmlspecialchars($testimonial['rating']); ?>/5</td>
                    <td><?php echo $testimonial['approved'] ? 'Oui' : 'Non'; ?></td>
                    <td>
                        <a href="approve_testimonial.php?id=<?php echo $testimonial['id']; ?>"><?php echo $testimonial['approved'] ? 'Désapprouver' : 'Approuver'; ?></a>
                        <a href="delete_testimonial.php?id=<?php echo $testimonial['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce témoignage?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
