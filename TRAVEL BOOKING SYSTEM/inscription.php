<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Système de Réservation de Voyages</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('inso.jpeg') ;
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

        .register-section {
            max-width: 400px;
            margin: 0 auto;
            background-color:beige;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .register-section h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .register-section input[type="text"],
        .register-section input[type="email"],
        .register-section input[type="password"],
        .register-section button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .register-section button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .register-section button:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    include_once 'db_connection.php';

    // Vérifier si le formulaire d'inscription a été soumis
    if (isset($_POST['register'])) {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];

        // Requête pour insérer l'utilisateur dans la base de données
        $insert_user_query = "INSERT INTO utilisateur (nom, prenom, adresse_email, mot_de_passe) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe')";
        
        // Exécuter la requête et vérifier si elle s'est exécutée avec succès
        if (mysqli_query($conn, $insert_user_query)) {
            // Redirection vers la page de connexion après l'inscription
            header("Location: connexion.php");
            exit();
        } else {
            // Afficher un message d'erreur en cas d'échec de l'insertion
            echo "Erreur lors de l'inscription : " . mysqli_error($conn);
        }
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
        <section class="register-section">
            <h2>Inscription</h2>
            <form action="inscription.php" method="POST">
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="text" name="prenom" placeholder="Prénom" required>
                <input type="email" name="email" placeholder="Adresse e-mail" required>
                <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
                <button type="submit" name="register">S'inscrire</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Système de Réservation de Voyages. Tous droits réservés.</p>
    </footer>
</body>

</html> 