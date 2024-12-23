<?php
require_once(__DIR__ . '/config/mysql.php');
// require_once(__DIR__ . '/databaseconnect.php');
// require_once(__DIR__ . '/variables.php');


try {
    $pdo = new PDO(
        sprintf('mysql:host=%s;dbname=aguardien;port=%s;charset=utf8', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
        MYSQL_USER,
        MYSQL_PASSWORD
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Démarrer la session
session_start();

$loginError = '';
$inscriptionError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement de la connexion
    if (isset($_POST['login'])) {
        $login = htmlspecialchars(trim($_POST['login']));
        $mdp = htmlspecialchars(trim($_POST['mdp']));

        if (!empty($login) && !empty($mdp)) {
            // Vérifier les informations de connexion
            $sql = "SELECT * FROM comptes WHERE login = :login";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':login', $login);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifier si l'utilisateur existe et si le mot de passe correspond
            if ($user && password_verify($mdp, $user['mdp'])) {
                // Authentification réussie, démarrer la session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['login'] = $user['login'];

                // Rediriger vers le tableau de bord
                header("Location: aguardien.php?id=" . $_SESSION['user_id']);  // Assurez-vous que dashboard.php existe    //////////////////////////////////////////////////////////////////////////////
                exit;
            } else {
                $loginError = "Identifiants incorrects.";
                // echo "Identifiants incorrects";
            }
        } else {
            $loginError = "Tous les champs sont requis.";
        }
    }

    // Traitement de l'inscription
    if (isset($_POST['create_account'])) {
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $login = trim($_POST['login']);
        $mdp = trim($_POST['mdp']);

        if (!empty($nom) && !empty($prenom) && !empty($login) && !empty($mdp)) {
            // Vérifier si le login existe déjà
            $sql = "SELECT * FROM comptes WHERE login = :login";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':login', $login);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $inscriptionError = "Le login est déjà utilisé.";
            } else {
                // Hacher le mot de passe
                $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

                $sql = "INSERT INTO comptes (nom, prenom, login, mdp) VALUES (:nom, :prenom, :login, :mdp)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':login', $login);
                $stmt->bindParam(':mdp', $hashedPassword);

                if ($stmt->execute()) {
                    $inscriptionError = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
                } else {
                    $inscriptionError = "Erreur lors de l'inscription.";
                }
            }
        } else {
            $inscriptionError = "Tous les champs sont requis.";
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./connexion.css">
    <title>Connexion</title>
</head>

<body>


    <h2>-- ALEXANDRE GARDIEN --</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="POST">
                <h1>Cree ton compte</h1>

                <?php if ($inscriptionError): ?>
                    <p class="error"><?php echo $inscriptionError; ?></p>
                <?php endif; ?>

                <label for="nom">Nom</label>
                <input type="text" id="nom" placeholder="Nom" name="nom" required>

                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" placeholder="Prenom" name="prenom" required>

                <label for="login">Login</label>
                <input type="text" id="login" placeholder="Login" name="login" required>

                <label for="mdp">Mot de passe</label>
                <input type="password" id="mdp" placeholder="Mot de passe" name="mdp" required>

                <button type="submit" name="create_account">s'inscrire</button>
            </form>

        </div>


        <div class="form-container sign-in-container">
            <form action="" method="post">
                <h1>Connecte toi</h1>

                <?php if ($loginError): ?>
                    <p style="color: red;"><?php echo $loginError; ?></p>
                <?php endif; ?>

                <label for="login"></label>
                <input id="login" type="text" name="login" placeholder="Login" required>


                <label for="mdp">Mot de passe</label>
                <input id="mdp" type="password" name="mdp" placeholder="Mot de passe" required>
                <a href="https://www.youtube.com/watch?v=80Sf6x2ZKJM">Tu as perdu ton mot de passe?</a>
                <button type="submit" value="Se connecter">Se connecter</button>
            </form>>
        </div>


        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bonjour !</h1>
                    <p>Pour te connecter, utilise tes information personnels</p>
                    <button class="ghost" id="signIn">Se connecter</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>tu n'as pas de compte ?</h1>
                    <p>Cree toi un nouveau compte !</p>
                    <button class="ghost" id="signUp">S'inscrire</button>
                </div>
            </div>
        </div>
    </div>

    <!-- bouton api -->
    <button id="fetchButton">Derniere infos fuitées</button>
    <div id="box-info">
        <div id="dataDisplay"></div>
    </div>
    <!-- fin bouton api -->

    <footer>
        <p> &copy; Alexandre Gardien - 2024 </p>
    </footer>

<script src="app.js"></script>
    <script src="script.js"></script>
</body>

</html>