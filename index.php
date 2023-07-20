<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Garage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link
      rel="shortcut icon"
      href="ressources/LOGO-site.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
  </head>
  <body>
    <!-- Navigation -->
    <header class="header">
      <nav class="nav">
        <div class="nav_logo">
          <img src="ressources/GarageVP.svg" />
        </div>
        <ul class="nav_items">
          <li class="nav_item">
            <a href="#accueil" class="nav_link">Accueil</a>
            <a href="#service" class="nav_link">Services</a>
            <a href="#vente" class="nav_link">Ventes</a>
            <a href="#contact" class="nav_link">Contact</a>
            <a href="#privacy" class="nav_link">Confidentialité</a>
          </li>
        </ul>
        <button class="button" id="form-open">Se connecter</button>
      </nav>
    </header>
    <img src="ressources/menu.svg" alt="logo menu" class="logo-menu" />

    <!-- Accueil -->
    <section class="home">
      <div class="accueil" id="accueil">
        <video
          id="videoBG"
          poster="ressources/Background.png"
          autoplay="autoplay"
          muted=""
          loop="infinite"
          src="ressources/car_-_88481 (Original).mp4"
        ></video>
        <img
          src="ressources/GarageVP.svg"
          alt="logo GarageVP"
          class="LOGOGarageVP"
        />
        <a href="#service" class="btn-accueil">En savoir plus</a>
      </div>
      <div class="form_container">
        <i class="fa-solid fa-xmark form_close"></i>
        <!-- Formulaire de connexion -->
        <div class="form login_form">
          <form action="#">
            <h2>Connexion</h2>

            <div class="input_box">
              <input type="email" placeholder="Votre e-mail" required />
              <i class="fa-regular fa-envelope email"></i>
            </div>
            <div class="input_box">
              <input
                type="password"
                placeholder="Votre mot de passe"
                required
              />
              <i class="fa-solid fa-lock"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>

            <div class="option_field">
              <span class="checkbox">
                <input type="checkbox" id="check" />
                <label for="check">Se souvenir</label>
              </span>
              <a href="#" class="forgot_pw">Mot de passe oublié?</a>
            </div>

            <button class="button">Se connecter</button>

            <div class="login_signup">
              Pas encore inscrit? <a href="#" id="signup">S'inscrire</a>
            </div>
          </form>
        </div>

        <!-- Formulaire d'inscription -->
        <div class="form signup_form">
          <form action="login.php">
            <h2>S'inscrire</h2>

            <div class="input_box">
              <input type="email" placeholder="Votre e-mail" required />
              <i class="fa-regular fa-envelope email"></i>
            </div>
            <div class="input_box">
              <input
                type="password"
                placeholder="Créer un mot de passe"
                required
              />
              <i class="fa-solid fa-lock"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>
            <div class="input_box">
              <input
                type="password"
                placeholder="Confirmer le mot de passe"
                required
              />
              <i class="fa-solid fa-lock"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>

            <button class="button">S'inscrire</button>

            <div class="login_signup">
              Déjà un compte? <a href="#" id="login">Se connecter</a>
            </div>
          </form>
        </div>
      </div>
    </section>

    <main>
      <div class="service-container" id="service">
        <h2>Nos services</h2>

        <div class="text-service">
          <h3 class="h3">L’entretien des systèmes mécaniques</h3>

          <p>
            On note les vidanges, les divers réglages, le remplacement de pièces
            d’usure, très souvent les pièces des freins. Les freins constituent
            des pièces essentielles pour une automobile.
          </p>
          <p>
            Leur rôle est d’arrêter la voiture et de le maintenir immobile. À
            tout cela s’ajoute, les essais moteurs ; le changement de pièces qui
            ne répondent plus au niveau du moteur. Au niveau du moteur,
            l’inspection du niveau de l’huile doit s’effectuer.
          </p>
          <p>
            Ce niveau ne doit être ni trop élevé, ni trop bas. Nous vérifions le
            niveau de l’huile de frein ainsi que du liquide de refroidissement
            qui est essentiel pour une voiture.
          </p>
          <p>Les autres liquides seront également vérifiés.</p>
          <p>
            En plus des contrôles au niveau du moteur, notre garage propose
            aussi l’inspection des pneumatiques. À ce niveau, on contrôle la
            présence d’éventuelles usures, sur les flancs ou les dans les
            rainures, mais aussi la pression dans ces pneus.
          </p>

          <h3 class="h3">L’entretien des systèmes électriques</h3>

          <p>
            Ces travaux de réparations et d’entretien peuvent également
            s’étendre sur d’autres parties de l’automobile. <br /><br />Notre
            atelier de réparation automobile offre des services de contrôle des
            parties électriques, des fusibles, du système d’alimentation
            électrique, et l’installation ou le remplacement des appareils. Les
            différents voyants du tableau de bord doivent également être
            inspectés. En général, vous devez être capable de maîtriser la
            signification de chaque voyant. <br /><br />Nous pouvons également
            faire le check in de votre système électrique.
          </p>

          <h3 class="h3">L’entretien de la carrosserie et la peinture</h3>

          <p>
            Nous faisont aussi des travaux de débosselage suite à des chocs ou
            accidents qui déforment la carrosserie. <br />Le masticage et le
            ponçage interviennent très souvent après des travaux de soudures
            effectuées sur les parties visibles de la carrosserie. <br />
            Pour remettre à neuf le véhicule, nous proposont des prestations de
            peinture automobile, afin d’harmoniser le revêtement.
          </p>

          <h3 class="h3">Les prix de nos services :</h3>
          <ul class="service-list">
            <li>
              Pour l’entretien des systèmes mécaniques ( de
              <span class="span">10€</span> à
              <span class="span">2000€</span> selon les pièces ),
            </li>
            <li>
              Pour l’entretien des systèmes électriques ( de
              <span class="span">10€</span> à <span class="span">350€</span> ),
            </li>
            <li>
              Pour l’entretien de la carroserie et la peinture ( de
              <span class="span">40€</span> à <span class="span">+2500€</span>
              ).
            </li>
          </ul>
        </div>
      </div>
      <!-- Voiture modal -->
      <div class="modal-container">
        <div class="overlay modal-trigger"></div>
        <div
          class="modal"
          role="dialog"
          aria-labelledby="modalTitle"
          aria-describedby="dialogDesc"
        >
          <button class="close-modal modal-trigger" aria-label="close">
            X
          </button>

          <img src="ressources/Bmw_Serie_1_001.jpg" width="100%" />
          <h1 id="modalTitle">BMW SERIE 1 116D</h1>
          <p id="dialogDesc">
            Vitesse max: 200 km/h Consommation (urbaine / extra urbaine /
            moyenne): 5.40 / 3.90 / 4.50L/100 km Autonomie optimale: 1333 Km
            Autonomie moyenne: 1156 Km Prix du plein : 98.8 €
          </p>
          <button class="button-modal">Acheter</button>
        </div>
      </div>

      <!-- Voiture -->
      <div class="vehicule-title" id="vente">Nos véhicules d'occasions</div>
      <section class="container">
        <div class="card">
          <div class="card-image car-1"></div>
          <button class="card-button modal-trigger" href="#">
            En savoir plus
          </button>
          <h3>BMW SERIE 1 116D</h3>
          <p>Kilométrage : 73000km</p>
          <p>Modèle: Serie 1</p>
          <p>Année: 2013</p>
          <p>Prix : <span class="span">8350 €</span></p>
        </div>
        <div class="card">
          <div class="card-image car-2"></div>
          <button class="card-button modal-trigger" href="#">
            En savoir plus
          </button>
          <h3>Citroën C3</h3>
          <p>Kilométrage : 51000km</p>
          <p>Modèle: C3</p>
          <p>Année: 2020</p>
          <p>Prix : <span class="span">13550 €</span></p>
        </div>
        <div class="card">
          <div class="card-image car-3"></div>
          <button class="card-button modal-trigger" href="#">
            En savoir plus
          </button>
          <h3>Ford PUMA 2021</h3>
          <p>Kilométrage : 36000km</p>
          <p>Modèle: PUMA 2021</p>
          <p>Année: 2021</p>
          <p>Prix : <span class="span">16400 €</span></p>
        </div>
        <div class="card">
          <div class="card-image car-4"></div>
          <button class="card-button modal-trigger" href="#">
            En savoir plus
          </button>
          <h3>Renault TALISMAN 2020</h3>
          <p>Kilométrage : 37000km</p>
          <p>Modèle: TALISMAN 2020</p>
          <p>Année: 2020</p>
          <p>Prix : <span class="span">14250 €</span></p>
        </div>
        <div class="card">
          <div class="card-image car-5"></div>
          <button class="card-button modal-trigger" href="#">
            En savoir plus
          </button>
          <h3>MERCEDES CLASSE A IV</h3>
          <p>Kilométrage : 96000km</p>
          <p>Modèle: CLASSE A IV</p>
          <p>Année: 2020</p>
          <p>Prix : <span class="span">13550 €</span></p>
        </div>
      </section>
      <!-- Avis -->
      <div class="avis-container" id="avis">
        <h2>Avis</h2>
        <div class="container-form">
          <form action="" method="post" class="form-bloc">
            <div class="form-groupe">
              <label for="Pseudo">Pseudo</label>
              <input
                type="text"
                name="Pseudo"
                placeholder="Votre pseudo"
                required
              />
            </div>
            <div class="form-groupe">
              <label for="commentaire">Commentaire</label>
              <textarea
                name="comment"
                id="commentaire"
                placeholder="Votre message"
                required
              ></textarea>
            </div>
            <div class="stars">
              <i class="lar la-star" data-value="1"></i
              ><i class="lar la-star" data-value="2"></i
              ><i class="lar la-star" data-value="3"></i
              ><i class="lar la-star" data-value="4"></i
              ><i class="lar la-star" data-value="5"></i>
            </div>
            <input type="hidden" name="note" id="note" value="0" />
            <div class="form-groupe">
              <input
                type="submit"
                name="envoyer"
                value="ENVOYER"
                class="button-sub"
              />
            </div>
          </form>
        </div>
      </div>
    </main>

    <!-- Formulaire de contact -->
    <section class="section-contact" id="contact">
      <h2><strong>Contactez-nous</strong></h2>

      <div class="container-form">
        <form action="contact.php" method="post" class="form-bloc">
          <div class="form-groupe">
            <label for="nom">Entrez votre nom</label>
            <input
              autocomplete="off"
              type="text"
              placeholder="Nom"
              required
              id="nom"
            />
          </div>

          <div class="form-groupe">
            <label for="email">Votre e-mail</label>
            <input
              autocomplete="off"
              type="email"
              id="email"
              required
              placeholder="E-mail"
            />
          </div>

          <div class="form-groupe">
            <textarea id="txt" placeholder="Votre message" required></textarea>
          </div>

          <div class="form-groupe">
            <input
              type="submit"
              name="envoyer"
              value="ENVOYER"
              class="button-sub"
            />
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
          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#"><i class="fa-brands fa-twitter"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <footer>Tous Droits Réservés &copy;</footer>
  </body>
  <script src="main.js"></script>
</html>
