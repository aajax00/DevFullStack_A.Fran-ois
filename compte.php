<?php
require_once(__DIR__ . '/config/mysql.php');
// require_once(__DIR__ . '/databaseconnect.php');
// require_once(__DIR__ . '/variables.php');


try {
    $conn = new PDO(
        sprintf('mysql:host=%s;dbname=aguardien;port=%s;charset=utf8', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
        MYSQL_USER,
        MYSQL_PASSWORD
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $login = trim($_POST['login']);
        $mdp = trim($_POST['mdp']);

        $nom_echap = $conn->quote($nom);
        $prenom = $conn->quote($prenom);
        $login = $conn->quote($login);
        $mdp = $conn->quote($mdp);
    
        $sql = "INSERT INTO comptes (nom, prenom, loginU, mdp) VALUES ($nom_echap, $prenom, $login, $mdp)";
        $conn->exec($sql);

        // $sql = "INSERT INTO comptes (nom, prenom, loginU, mdp) VALUES (:nom, :prenom, :login, :mdp)";
        // $stmt = $conn->prepare($sql);

        // $stmt->bindParam(':nom', $nom);
        // $stmt->bindParam(':prenom', $prenom);
        // $stmt->bindParam(':login', $login);
        // $stmt->bindParam(':mdp', $mdp);

        // $stmt->execute();


    }

} catch (Exception $exception) {
    die('Erreur : ' . $exception->getMessage());}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="compte.css">
    <title>Creation de compte</title>
</head>
<body>
    <div class="container">
        <h1>Creation de compte utilisateur</h1>
        <!-- Formulaire de creation de compte -->
     <form action="" method="POST">
        <ul>
            <li>
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom">
            </li>

            <li>
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom">
            </li>

            <li>
                <label for="login">Login</label>
                <input type="text" id="login" name="login">
            </li>

            <li>
                <label for="mdp">Mot de passe</label>
                <input type="text" id="mdp" name="mdp">
            </li>

            <button type="submit" class="btn">Cree un compte</button>
        </ul>
     </form>
    </div>
    
</body>
</html>