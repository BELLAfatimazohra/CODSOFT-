<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Système de Réservation de Voyages</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: url('shutterstock_270486656\ \(1\).png') ;
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-container {
            display: inline-block;
        }

        .logo {
            width: 200px;
            height: auto;
        }

        nav ul {
            list-style-type: none;
            text-align: right;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
           color:bisque ;
            text-decoration: none;
        }

        main {
            padding: 20px;
        }

        .hero {
            text-align: center;
            margin-top: 50px;
        }

        .hero h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .cta-button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        comments-section {
            margin-top: 50px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .comments-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .comments-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .comment {
            border-bottom: 1px solid #ddd;
            padding: 20px 0;
        }

        .comment:last-child {
            border-bottom: none;
        }

        .comment .author {
            font-weight: bold;
        }

        .comment .date {
            color: #888;
            font-size: 0.9em;
        }

        .comment .text {
            margin-top: 10px;
        }

        /* Styles pour les décorations */
        .divider {
            width: 100%;
            text-align: center;
            margin: 40px 0;
        }

        .divider hr {
            border: none;
            border-top: 2px solid #ccc;
            width: 50%;
        }

        .divider p {
            color: #999;
            margin-top: 10px;
        }

        /* Styles pour le formulaire */
        .comment-form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .comment-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .comment-form input[type="text"],
        .comment-form textarea,
        .comment-form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .comment-form textarea {
            resize: none;
        }

        .comment-form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .comment-form button:hover {
            background-color: #0056b3;
        }

        .thank-you-message {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }

        .thank-you-message p {
            color: #155724;
            font-weight: bold;
        }
        .containner {
    display: flex;
}

.containner > iframe {
    flex: 1;
    margin-right: 20px; /* Ajoute une marge à droite pour l'espace */
}
.affiche {
    text-align: center; /* Pour centrer le contenu horizontalement */
}

.affiche h2 {
    margin-bottom: 10px; /* Espacement sous le titre */
}

.info {
    display: flex;
    align-items: center; /* Alignement vertical du contenu */
    margin-bottom: 10px; /* Espacement entre chaque paire d'image et de paragraphe */
}

.info img {
    width: 30px; /* Taille des images */
    height: auto; /* Hauteur automatique pour préserver les proportions */
    margin-right: 10px; /* Espacement entre l'image et le paragraphe */
}
.infoo img {
    width: 30px; /* Taille des images */
    height: auto; /* Hauteur automatique pour préserver les proportions */
    margin-right: 10px; /* Espacement entre l'image et le paragraphe */
}

.loca{
    border: 1px solid #ccc; /* Ajoute une bordure grise autour de la section */
    padding: 20px; /* Ajoute un espacement à l'intérieur de la section pour séparer le contenu de la bordure */

}
.containner {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Centrer les éléments horizontalement */
}

.info,
.infoo {
    flex: 0 0 100%;
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.info,
.infoo {
    width: fit-content; /* Ajuster la largeur au contenu */
    margin: 0 auto; /* Centrer horizontalement */
    text-align: center; /* Centrer le contenu à l'intérieur */
}



    </style>
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="book.png" alt="Logo de la compagnie" class="logo">
        </div>
        <nav>
            <ul>
                <li><a href="inscription.php" class="cta-button">Inscription</a></li>
                <li><a href="connexion.php" class="cta-button">Connexion</a></li>
                <li><a href="https://www.googleadservices.com/pagead/aclk?sa=L&ai=DChcSEwjViZuU36uEAxWzkIMHHa3dDJcYABADGgJlZg&ase=2&gclid=Cj0KCQiA5rGuBhCnARIsAN11vgTAsF0x91rxUAmdsHN-caCMy1cOrPoicDVo87HIvmCrJ3ROOJtuxyUaAkXcEALw_wcB&ggladgrp=8804933835942717574&gglcreat=14952651943289178881&ohost=www.google.com&cid=CAESVuD2MXwkCGmsce8PYM1l8YAY0mDCUBP-U8sYBmJ1QMi6zNUA-isB13j3jyIlh7GxOAOojemlWDQl0ePoyLefuaVBS79sPgsAywBQtAwW4zaKmhWorYlj&sig=AOD64_3hE_Hq-KCzqH9TLMIjjDJucEJ8sg&q&nis=4&adurl&ved=2ahUKEwj-75KU36uEAxXqg_0HHR7BANkQ0Qx6BAgQEAM" style="box-shadow: 2px 2px 5px #888;">Découvrir</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="hero">
            <h2>Bienvenue sur notre plateforme de réservation de voyages</h2>
            <p>Découvrez nos offres exclusives et réservez votre prochain voyage dès aujourd'hui !</p>
            <a href="connexion.php" class="cta-button">Commencer</a><br><br><br><br><br><br><br><br><br><br>
            <!-- Votre contenu principal -->

        <div class="divider">
            <hr>
            <p>Partagez votre expérience</p>
            <hr>
        </div>
        <section class="comment-form">
            <h2>Ajouter un commentaire</h2>
            <form action="" method="POST">
                <input type="text" name="name" placeholder="Votre nom" required>
                <textarea name="comment" rows="4" placeholder="Votre commentaire" required></textarea>
                <button type="submit">Envoyer</button>
            </form>
        </section>
        <section id="confirmation-message" class="confirmation-message">
            <p>Vos commentaires nous intéressent ! N'hésitez pas à partager votre expérience ou poser des questions en remplissant le formulaire ci-dessous.</p>
        </section>
        <section class="loca">
    <div class="containner">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3397.0398620432534!2d-8.011587826012265!3d31.632758941583653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafee895bb9b39d%3A0xac02bdba6321502c!2sBooking.com%20Marrakech%20Office!5e0!3m2!1sfr!2sma!4v1708251579428!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br>
    </div>
    <div class="info-container">
        <div class="info">
            <img src="locaa.jpg" alt="Adresse" class="adr">
            <p> JXMR+495, Pl. 16 Novembre, Marrakech 40000</p><br>
        </div>
        <div class="infoo">
            <img src="telef.avif" alt="Téléphone" class="tele">
            <p> +55 (11) 3956-4000 ()</p>
        </div>
    </div>
</section>

        </section>
    </main>
    <footer>
        <p>&copy; 2024 Système de Réservation de Voyages. Tous droits réservés.</p>
    </footer>
</body>

</html>
