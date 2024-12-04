<?php
require_once(__DIR__ . '/config/mysql.php');
// require_once(__DIR__ . '/databaseconnect.php');
// require_once(__DIR__ . '/variables.php');


// try {
//     $conn = new PDO(
//         sprintf('mysql:host=%s;dbname=aguardien;port=%s;charset=utf8', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
//         MYSQL_USER,
//         MYSQL_PASSWORD
//     );
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $nom = trim($_POST['nom']);
//         $prenom = trim($_POST['prenom']);
//         $login = trim($_POST['login']);
//         $mdp = trim($_POST['mdp']);

//         $nom_echap = $conn->quote($nom);
//         $prenom = $conn->quote($prenom);
//         $login = $conn->quote($login);
//         $mdp = $conn->quote($mdp);
    
//         $sql = "INSERT INTO comptes (nom, prenom, loginU, mdp) VALUES ($nom_echap, $prenom, $login, $mdp)";
//         $conn->exec($sql);

//         // $sql = "INSERT INTO comptes (nom, prenom, loginU, mdp) VALUES (:nom, :prenom, :login, :mdp)";
//         // $stmt = $conn->prepare($sql);

//         // $stmt->bindParam(':nom', $nom);
//         // $stmt->bindParam(':prenom', $prenom);
//         // $stmt->bindParam(':login', $login);
//         // $stmt->bindParam(':mdp', $mdp);

//         // $stmt->execute();


//     }

// } catch (Exception $exception) {
//     die('Erreur : ' . $exception->getMessage());}





?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>login</title>
</head>
<body class="align">
    <div class="grid">

        <form action="" method="POST" class="form login">
    
          <div class="form__field">
            <label for="nom"></label>
            <input id="username" type="text" name="username" placeholder="Login">
          </div>
    
          <div class="form__field">
            <label for="mdp"></label>
            <input id="mdp" type="text" name="mdp" placeholder="Mot de passe">
          </div>
    
          <div class="form__field">
            <input type="submit" value="Se Connecter">
          </div>
    
        </form>
    
        <p class="text--center">Pas de compte? <a href="#">Crée un compte</a></p>
    
      </div>
    
    </body>
</html>