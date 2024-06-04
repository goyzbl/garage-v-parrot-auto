<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Garage</title>
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
                    <a href="#accueil" class="nav_link">Accueil</a>
                    <a href="#service" class="nav_link">Services</a>
                    <a href="#vente" class="nav_link">Ventes</a>
                    <a href="#contact" class="nav_link">Contact</a>
                    <a href="#privacy" class="nav_link">Confidentialité</a>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="profile.php" class="nav_link">Voir mon profil</a>
                        <a href="logout.php" class="nav_link">Se Déconnecter</a>
                        <?php if ($_SESSION['role'] === 'admin'): ?>
                            <a href="manage_cars.php" class="nav_link">Gérer les voitures</a>
                            <a href="manage_services.php" class="nav_link">Gérer les services</a>
                            <a href="manage_testimonials.php" class="nav_link">Gérer les témoignages</a>
                        <?php endif; ?>
                    <?php else: ?>
                        <button class="button" id="form-open">Se connecter</button>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </header>
    <img src="ressources/menu.svg" alt="logo menu" class="logo-menu">

    <!-- Accueil -->
    <section class="home" id="accueil">
        <video id="videoBG" poster="ressources/Background.png" autoplay muted loop src="ressources/car_-_88481 (Original).mp4"></video>
        <img src="ressources/GarageVP.svg" alt="logo GarageVP" class="LOGOGarageVP">
        <a href="#service" class="btn-accueil">En savoir plus</a>
    </section>

    <!-- Formulaires de Connexion et d'Inscription -->
    <div class="form_container">
        <i class="fa-solid fa-xmark form_close"></i>
        <!-- Formulaire de connexion -->
        <div class="form login_form">
            <form action="login.php" method="POST">
                <h2>Connexion</h2>
                <div class="input_box">
                    <input type="email" name="email" placeholder="Votre e-mail" required>
                    <i class="fa-regular fa-envelope email"></i>
                </div>
                <div class="input_box">
                    <input type="password" name="password" placeholder="Votre mot de passe" required>
                    <i class="fa-solid fa-lock"></i>
                    <i class="uil uil-eye-slash pw_hide"></i>
                </div>
                <div class="option_field">
                    <span class="checkbox">
                        <input type="checkbox" id="check">
                        <label for="check">Se souvenir</label>
                    </span>
                    <a href="#" class="forgot_pw">Mot de passe oublié?</a>
                </div>
                <button class="button" type="submit">Se connecter</button>
                <div class="login_signup">
                    Pas encore inscrit? <a href="#" id="signup">S'inscrire</a>
                </div>
            </form>
        </div>

        <!-- Formulaire d'inscription -->
        <div class="form signup_form">
            <form action="inscription_traitement.php" method="POST">
                <h2>S'inscrire</h2>
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
                <div class="login_signup">
                    Déjà un compte? <a href="#" id="login">Se connecter</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Services -->
    <div class="service-container" id="service">
        <h2>Nos services</h2>
        <div class="text-service">
            <h3 class="h3">L’entretien des systèmes mécaniques</h3>
            <p>
                On note les vidanges, les divers réglages, le remplacement de pièces
                d’usure, très souvent les pièces des freins. Les freins constituent
                des pièces essentielles pour une automobile. Leur rôle est d’arrêter la voiture et de le maintenir immobile.
            </p>
            <p>
                À tout cela s’ajoute, les essais moteurs ; le changement de pièces qui
                ne répondent plus au niveau du moteur. Au niveau du moteur,
                l’inspection du niveau de l’huile doit s’effectuer. Ce niveau ne doit être ni trop élevé, ni trop bas.
            </p>
            <p>
                Nous vérifions le niveau de l’huile de frein ainsi que du liquide de refroidissement
                qui est essentiel pour une voiture. Les autres liquides seront également vérifiés.
            </p>
            <p>
                En plus des contrôles au niveau du moteur, notre garage propose
                aussi l’inspection des pneumatiques. À ce niveau, on contrôle la
                présence d’éventuelles usures, sur les flancs ou les dans les
                rainures, mais aussi la pression dans ces pneus.
            </p>

            <h3 class="h3">L’entretien des systèmes électriques</h3>
            <p>
                Ces travaux de réparations et d’entretien peuvent également
                s’étendre sur d’autres parties de l’automobile. Notre atelier de réparation automobile offre des services de contrôle des
                parties électriques, des fusibles, du système d’alimentation
                électrique, et l’installation ou le remplacement des appareils.
            </p>
            <p>
                Les différents voyants du tableau de bord doivent également être inspectés.
                En général, vous devez être capable de maîtriser la signification de chaque voyant.
                Nous pouvons également faire le check in de votre système électrique.
            </p>

            <h3 class="h3">L’entretien de la carrosserie et la peinture</h3>
            <p>
                Nous faisons aussi des travaux de débosselage suite à des chocs ou
                accidents qui déforment la carrosserie. Le masticage et le ponçage interviennent très souvent après des travaux de soudures
                effectuées sur les parties visibles de la carrosserie. Pour remettre à neuf le véhicule, nous proposons des prestations de
                peinture automobile, afin d’harmoniser le revêtement.
            </p>

            <h3 class="h3">Les prix de nos services :</h3>
            <ul class="service-list">
                <li>Pour l’entretien des systèmes mécaniques (de 10€ à 2000€ selon les pièces).</li>
                <li>Pour l’entretien des systèmes électriques (de 10€ à 350€).</li>
                <li>Pour l’entretien de la carrosserie et la peinture (de 40€ à plus de 2500€).</li>
            </ul>
        </div>
    </div>

    <!-- Voitures d'occasion -->
    <div class="vehicule-title" id="vente">Nos véhicules d'occasions</div>
    <section class="container">
        <?php
        // Connexion à la base de données
        require 'config.php';

        $sql = "SELECT * FROM cars";
        $stmt = $pdo->query($sql);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                echo "<div class='card'>";
                echo "<div class='card-image' style='background-image: url(" . $row['main_image'] . ");'></div>";
                echo "<h3>" . $row['title'] . "</h3>";
                echo "<p>Kilométrage : " . $row['mileage'] . " km</p>";
                echo "<p>Année: " . $row['year'] . "</p>";
                echo "<p>Prix : <span class='span'>" . $row['price'] . " €</span></p>";
                echo "<button class='card-button' onclick='openModal(" . json_encode($row) . ")'>Acheter</button>";
                echo "</div>";
            }
        } else {
            echo "Aucune voiture d'occasion disponible.";
        }
        ?>
    </section>

    <!-- Modal pour afficher les détails de la voiture -->
    <div class="modal-container" id="modal-container">
        <div class="overlay" onclick="closeModal()"></div>
        <div class="modal">
            <button class="close-modal" onclick="closeModal()">X</button>
            <h1 id="modalTitle"></h1>
            <img id="modalImage" src="" width="100%">
            <p id="modalDesc"></p>
            <p id="modalMileage"></p>
            <p id="modalYear"></p>
            <p id="modalPrice"></p>
            <button class="button-modal" onclick="purchaseCar()">Acheter</button>
        </div>
    </div>

    <!-- Avis -->
    <div class="avis-container" id="avis">
        <h2>Avis</h2>
        <div class="container-form">
            <form action="add_testimonial.php" method="post" class="form-bloc">
                <div class="form-groupe">
                    <label for="Pseudo">Pseudo</label>
                    <input type="text" name="pseudo" placeholder="Votre pseudo" required>
                </div>
                <div class="form-groupe">
                    <label for="commentaire">Commentaire</label>
                    <textarea name="comment" id="commentaire" placeholder="Votre message" required></textarea>
                </div>
                <div class="stars">
                    <i class="lar la-star" data-value="1"></i>
                    <i class="lar la-star" data-value="2"></i>
                    <i class="lar la-star" data-value="3"></i>
                    <i class="lar la-star" data-value="4"></i>
                    <i class="lar la-star" data-value="5"></i>
                </div>
                <input type="hidden" name="note" id="note" value="0">
                <div class="form-groupe">
                    <input type="submit" name="envoyer" value="ENVOYER" class="button-sub">
                </div>
            </form>
        </div>
        <div class="avis-liste">
            <!-- Les témoignages approuvés s'affichent ici -->
            <?php
            // Connexion à la base de données
            require 'config.php';

            $sql = "SELECT * FROM testimonials WHERE approved = 1";
            $stmt = $pdo->query($sql);

            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch()) {
                    echo "<div class='avis'>";
                    echo "<h3>" . $row['name'] . "</h3>";
                    echo "<p>" . $row['comment'] . "</p>";
                    echo "<p>Note : " . $row['rating'] . "/5</p>";
                    echo "</div>";
                }
            } else {
                echo "Aucun témoignage disponible pour le moment.";
            }
            ?>
        </div>
    </div>

    <!-- Formulaire de contact -->
    <section class="section-contact" id="contact">
        <h2><strong>Contactez-nous</strong></h2>
        <div class="container-form">
            <form action="contact.php" method="post" class="form-bloc">
                <div class="form-groupe">
                    <label for="nom">Entrez votre nom</label>
                    <input autocomplete="off" type="text" name="nom" placeholder="Nom" required id="nom">
                </div>
                <div class="form-groupe">
                    <label for="email">Votre e-mail</label>
                    <input autocomplete="off" type="email" name="email" id="email" required placeholder="E-mail">
                </div>
                <div class="form-groupe">
                    <textarea name="message" id="txt" placeholder="Votre message" required></textarea>
                </div>
                <div class="form-groupe">
                    <input type="submit" name="envoyer" value="ENVOYER" class="button-sub">
                </div>
            </form>
            <div class="contact-email">
                <p>
                    <i class="fa-regular fa-envelope email"></i>
                    <a href="mailto:liamboyer12@gmail.com">liamboyer12@gmail.com</a>
                </p>
            </div>
            <div class="horaire">
                <h2>Nos horaires :</h2>
                <p><span> Lundi :</span> 8h45 - 12h, 14h - 18h</p>
                <p><span>Mardi :</span> 8h45 - 12h, 14h - 18h</p>
                <p><span>Mercredi :</span> 8h45 - 12h, 14h - 18h</p>
                <p><span>Jeudi :</span> 8h45 - 12h, 14h - 18h</p>
                <p><span>Vendredi :</span> 8h45 - 12h, 14h - 18h</p>
                <p><span>Samedi :</span> 9h30 - 13h, 15h - 19h</p>
                <p><span>Dimanche :</span> Fermé</p>
            </div>
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
            <a href="#accueil">Accueil</a>
            <a href="#service">Service</a>
            <a href="#vente">Vente</a>
            <a href="#avis">Avis</a>
            <a href="#contact">Contact</a>
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
    <script src="main.js"></script>
    <script>
        function openModal(car) {
            document.getElementById('modalTitle').innerText = car.title;
            document.getElementById('modalImage').src = car.main_image;
            document.getElementById('modalDesc').innerText = "Description: " + (car.description || 'Non disponible');
            document.getElementById('modalMileage').innerText = "Kilométrage : " + car.mileage + " km";
            document.getElementById('modalYear').innerText = "Année : " + car.year;
            document.getElementById('modalPrice').innerText = "Prix : " + car.price + " €";
            document.getElementById('modal-container').classList.add('active');
        }

        function closeModal() {
            document.getElementById('modal-container').classList.remove('active');
        }

        function purchaseCar() {
            alert("Fonction d'achat en cours de développement.");
        }
    </script>
</body>
</html>
