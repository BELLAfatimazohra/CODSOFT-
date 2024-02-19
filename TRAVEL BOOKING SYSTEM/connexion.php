<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Système de Réservation de Voyages</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('reser.jpeg') ;
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

        .login-section {
            max-width: 400px;
            margin: 0 auto;
            background-color:beige;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        .login-section h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-section input[type="email"],
        .login-section input[type="password"],
        .login-section button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-section button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .login-section button:hover {
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
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "voyage";

// Création d'une connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $database);

// Vérification de la connexion
if (!$conn) {
    die("Échec de la connexion à la base de données : " . mysqli_connect_error());
}

// Vérifier si le formulaire de connexion a été soumis
if (isset($_POST['login'])) {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Requête pour vérifier les informations de connexion de l'utilisateur
    $query = "SELECT * FROM utilisateur WHERE adresse_email='$email' AND mot_de_passe='$mot_de_passe'";
    $result = mysqli_query($conn, $query);

    // Vérifier si l'utilisateur existe dans la base de données
    if (mysqli_num_rows($result) == 1) {
        // Récupérer la ligne de résultat
        $row = mysqli_fetch_assoc($result);
        // Stocker l'ID de l'utilisateur dans la session
        $_SESSION['user_id'] = $row['id']; 
        // L'utilisateur est connecté avec succès
        // Redirection vers la page de réservation ou autre page
        header("Location: reservation.php");
        exit();
    } else {
        // L'adresse e-mail ou le mot de passe est incorrect
        echo "Adresse e-mail ou mot de passe incorrect.";
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
                <li><a href="inscription.php">Inscription</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="login-section">
            <h2>Connexion</h2>
            <form action="connexion.php" method="POST">
                <input type="email" name="email" placeholder="Adresse e-mail" required>
                <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
                <button type="submit" name="login">Se connecter</button><br><br><br><br>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Système de Réservation de Voyages. Tous droits réservés.</p>
    </footer>
</body>

</html>