<?php
$host = 'localhost'; 
$dbname = 'inscription'; 
$username = 'root';  
$password = 'root';  

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $login = trim($_POST['login']);
    $mdp = trim($_POST['mdp']);

    // Validation basique des champs
    if (!empty($nom) && !empty($prenom) && !empty($login) && !empty($mdp)) {

        // Prepare the SQL query to insert data without hashing the password
        $sql = "INSERT INTO users (nom, prenom, login, mdp) VALUES (:nom, :prenom, :login, :mdp)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters and execute the query
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':mdp', $mdp);

        if ($stmt->execute()) {
            echo "Inscription réussie !";
        } else {
            echo "Erreur lors de l'inscription.";
        }
    } else {
        echo "Tous les champs sont requis.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

<h2>Formulaire d'inscription</h2>
<form method="POST" action="">
    <div class='mb-3'>
        <label for="nom" class='form-label'>Nom :</label>
        <input type="text" class='form-control' id="nom" name="nom">
    </div>
    <div class='mb-3'>
        <label for="prenom" class='form-label'>Prénom :</label>
        <input type="text" class='form-control' id="prenom" name="prenom" >
    </div>
    <div class='mb-3'>
        <label for="login" class='form-label'>Login :</label>
        <input type="text" class='form-control' id="login" name="login" >
    </div>
    <div class='mb-3'>
        <label for="mdp" class='form-label'>Mot de passe :</label>
        <input type="password" class='form-control' id="mdp" name="mdp">
    </div>
    <p><a href="login.php"><button type="button">Se connecter</button></a></p>
    <button type="submit" class="btn btn-primary"> Créer un compte </button>
</form>
</body>
</html>
