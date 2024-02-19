<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement en ligne - Système de Réservation de Voyages</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('reser.jpeg');
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            max-height: 50px;
        }

        .payment-message {
            display: none; /* Caché par défaut */
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            text-align: center;
        }
        .card-logo {
            width: 50px; /* Ajustez la taille selon vos besoins */
            margin: 10px; /* Ajustez la marge selon vos besoins */
        }

    </style>
</head>
<body>
<?php
// Afficher les erreurs PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include_once 'db_connection.php';

// Vérifie si l'utilisateur est connecté
if(isset($_SESSION['user_id'])) {
    // Récupère l'ID de l'utilisateur connecté depuis la session
    $user_id = $_SESSION['user_id'];

    // Vérifie si le formulaire de paiement a été soumis
    if (isset($_POST['submit_pay'])) {
        // Récupérer les données du formulaire
        $num_compte = $_POST['num_compte']; // Changer 'card_number' en 'num_compte'
        $cv = $_POST['cvv']; // Changer 'cvv' en 'cv'

        // Print les données soumises pour débogage
        var_dump($_POST);

        // Requête pour insérer le paiement dans la base de données avec l'ID de l'utilisateur connecté
        $insert_payement_query = "INSERT INTO payement (id_utilisateur, num_compte, cv) VALUES ('$user_id', '$num_compte', '$cv')";
        if(mysqli_query($conn, $insert_payement_query)) {
            // Affiche un message de confirmation si l'insertion a réussi
            echo "<script>alert('Votre paiement a été enregistrée avec succès. Veuillez consulter votre email pour obtenir votre ticket.');</script>";
        } else {
            // Affiche un message d'erreur si l'insertion a échoué
            echo "Erreur: " . $insert_payement_query . "<br>" . mysqli_error($conn);
        }
    }
} else {
    // Redirige l'utilisateur vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: connexion.php");
    exit();
}
?>
<img src="book.png" alt="Logo" class="logo"><br><br>
<div class="container">
    <img src="VISA-logo.png" alt="Visa" class="card-logo">
    <img src="card.png" alt="Mastercard" class="card-logo">
    <img src="ex.png" alt="American Express" class="card-logo">
    <img src="dis.png" alt="American Express" class="card-logo">
    <h2>Paiement en ligne</h2>
    <form action="page_paiement.php" method="POST" onsubmit="return showPaymentMessage(event)">
        <label for="card_number">Numéro de carte :</label>
        <input type="text" id="card_number" name="num_compte" placeholder="1234 5678 9012 3456" required>
        <label for="expiry_date">Date d'expiration :</label>
        <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>
        <label for="cvv">CVV :</label>
        <input type="number" id="cvv" name="cvv" placeholder="123" required>
        <button type="submit" name="submit_pay">Payer</button>
    </form>
    <div id="payment-message" class="payment-message">Votre paiement a été traité avec succès. Veuillez consulter votre e-mail pour votre ticket, qui comprendra toutes les informations relatives à votre voyage, y compris la date de départ et les détails sur l'hébergement. </div>
</div>

<script>
    function showPaymentMessage(event) {
        event.preventDefault(); // Empêche l'envoi du formulaire
        var paymentMessage = document.getElementById('payment-message');
        paymentMessage.style.display = 'block';
    }
</script>
</body>
</html>
