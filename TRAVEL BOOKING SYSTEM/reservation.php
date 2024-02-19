<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation - Système de Réservation de Voyages</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('reser.jpeg');
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }

        .logo-container img {
            max-height: 50px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: bisque;
            box-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
        }

        main {
            padding: 20px;
        }

        .reservation-section {
            max-width: 500px;
            margin: 0 auto;
            background-color: beige;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .reservation-section h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .reservation-section input[type="text"],
        .reservation-section input[type="date"],
        .reservation-section button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .reservation-section button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .reservation-section button:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .confirmation-message {
            display: none;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
<?php
session_start();
include_once 'db_connection.php';

// Vérifie si l'utilisateur est connecté
if(isset($_SESSION['user_id'])) {
    // Récupère l'ID de l'utilisateur connecté depuis la session
    $user_id = $_SESSION['user_id'];

    // Vérifie si le formulaire de réservation a été soumis
    if (isset($_POST['submit_reservation'])) {
        // Récupère les données du formulaire
        $date_reservation = $_POST['date_reservation'];
        $date_debut_voyage = $_POST['date_debut_voyage'];
        $date_fin_voyage = $_POST['date_fin_voyage'];
        $lieu_depart = $_POST['lieu_depart'];
        $lieu_arrive = $_POST['lieu_arrive'];
        $type_hebergement = $_POST['type_hebergement'];
        $nombre_adults= $_POST['nombre_adults'];
        $nombre_enfants= $_POST['nombre_enfants'];
        // Requête pour insérer la réservation dans la base de données avec l'ID de l'utilisateur connecté
        $insert_reservation_query = "INSERT INTO reservation (id_utilisateur, date_reservation, date_debut_voyage, date_fin_voyage, lieu_depart, lieu_arrive ,type_hebergement ,nb_adults,nb_enfants) VALUES ('$user_id', '$date_reservation', '$date_debut_voyage', '$date_fin_voyage', '$lieu_depart', '$lieu_arrive', '$type_hebergement','$nombre_adults','$nombre_enfants')";

        // Exécute la requête
        if(mysqli_query($conn, $insert_reservation_query)) {
            // Affiche un message de confirmation si l'insertion a réussi
            echo "<script>alert('Votre réservation a été enregistrée avec succès. Veuillez passer au paiement pour obtenir votre ticket.');</script>";
        } else {
            // Affiche un message d'erreur si l'insertion a échoué
            echo "Erreur: " . $insert_reservation_query . "<br>" . mysqli_error($conn);
        }
    }
} else {
    // Redirige l'utilisateur vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: connexion.php");
    exit();
}
?>
    <header>
        <div class="logo-container">
            <img src="book.png" alt="Logo de la compagnie" class="logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="connexion.php">Connexion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="reservation-section">
            <h2>Réservation</h2>
            <form action="reservation.php" method="POST">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" placeholder="Votre nom" required>

                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>

                <label for="date_reservation">Date de réservation :</label>
                <input type="date" id="date_reservation" name="date_reservation" required>

                <label for="date_debut_voyage">Date de début du voyage :</label>
                <input type="date" id="date_debut_voyage" name="date_debut_voyage" required>

                <label for="date_fin_voyage">Date de fin du voyage :</label>
                <input type="date" id="date_fin_voyage" name="date_fin_voyage" required>

                <label for="lieu_depart">ville de départ :</label>
                <input type="text" id="lieu_depart" name="lieu_depart" placeholder="Lieu de départ" required>

                <label for="lieu_arrive">ville d'arrivé :</label>
                <input type="text" id="lieu_arrive" name="lieu_arrive" placeholder="Lieu d'arrivé" required>

                <label for="type-hebergement">Type d'hébergement :</label>
<select id="type-hebergement" name="type_hebergement">
  <option value="hotel">Hôtel</option>
  <option value="villa">Villa</option>
  <option value="appartement">Appartement</option>
</select><br><br>
<label for="nombre-adults">Adult(+16):</label>
<input type="number" id="nombre-adults" name="nombre_adults" min="1" max="10" required><br><br>
<label for="nombre-enfants">Enfant:</label>
<input type="number" id="nombre-enfants" name="nombre_enfants" min="1" max="10" required>


                <button type="submit" name="submit_reservation" onclick="showConfirmation()">Réserver</button>
                <button type="button" class="reservation-section-button" onclick="window.location.href='page_paiement.php'">Payer en ligne</button>
            </form>
        </section>
        <section id="confirmation-message" class="confirmation-message">
            <p>Votre réservation a été enregistrée avec succès. Veuillez passer au paiement pour obtenir votre ticket.</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Système de Réservation de Voyages. Tous droits réservés.</p>
    </footer>
    <script>
        function showConfirmation() {
            document.getElementById('confirmation-message').style.display = 'block';
        }
    </script>
</body>

</html>
