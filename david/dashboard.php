<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si non connecté
    exit;
}

echo "<h1>Bienvenue " . $_SESSION['login'] . " !</h1>";
echo "<p>Vous êtes connecté et voici votre tableau de bord.</p>";
?>
