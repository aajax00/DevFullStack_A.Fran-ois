<?php
// Connexion à la base de données
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
            $sql = "SELECT * FROM users WHERE login = :login";
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
                header("Location: dashboard.php");  // Assurez-vous que dashboard.php existe    //////////////////////////////////////////////////////////////////////////////
                exit;
            } else {
                $loginError = "Identifiants incorrects.";
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
            $sql = "SELECT * FROM users WHERE login = :login";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':login', $login);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $inscriptionError = "Le login est déjà utilisé.";
            } else {
                // Hacher le mot de passe
                $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (nom, prenom, login, mdp) VALUES (:nom, :prenom, :login, :mdp)";
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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'authentification</title>
    <style>
        .tabs {
            display: flex;
            margin-bottom: 20px;
        }
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            text-align: center;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-bottom: none;
            margin-right: 10px;
        }
        .tab:hover {
            background-color: #ddd;
        }
        .active {
            background-color: #ccc;
            font-weight: bold;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

<!-- Onglets de navigation -->
<div class="tabs">
    <div class="tab active" onclick="showTab('login')">Se connecter</div>
    <div class="tab" onclick="showTab('create')">S'inscrire</div>
</div>

<!-- Formulaires de connexion et d'inscription -->
<div id="login" class="form-container" style="display: block;">
    <h2>Connexion</h2>
    <form method="POST" action="">
    <form method="POST" action="">
        <div>
            <label for="login">Login :</label>
            <input type="text" id="login" name="login" required>
        </div>
        <div>
            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" required>
        </div>
        <button type="submit">Se connecter</button>
    </form>

    <?php if ($loginError): ?>
        <p style="color: red;"><?php echo $loginError; ?></p>
    <?php endif; ?>
</div>

<div id="create" class="form-container" style="display: none;">
    <h2>Inscription</h2>
    <form method="POST" action="">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div>
            <label for="login">Login :</label>
            <input type="text" id="login" name="login" required>
        </div>
        <div>
            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" required>
        </div>
        <button type="submit" name="create_account">Créer un compte</button>
    </form>
    <?php if ($inscriptionError): ?>
        <p class="error"><?php echo $inscriptionError; ?></p>
    <?php endif; ?>
</div>

<script>
    // Fonction pour afficher l'onglet actif
    function showTab(tabName) {
        // Cacher toutes les sections
        document.getElementById('login').style.display = 'none';
        document.getElementById('create').style.display = 'none';

        // Retirer la classe active de tous les onglets
        let tabs = document.querySelectorAll('.tab');
        tabs.forEach(tab => tab.classList.remove('active'));

        // Afficher la section correspondant à l'onglet actif
        document.getElementById(tabName).style.display = 'block';

        // Ajouter la classe active à l'onglet cliqué
        document.querySelector(`.tab:nth-child(${tabName === 'login' ? 1 : 2})`).classList.add('active');
    }
</script>

</body>
</html>
