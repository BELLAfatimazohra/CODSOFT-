<?php
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
?>