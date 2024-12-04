<?php
// Database connection setup
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

$loginError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = htmlspecialchars(trim($_POST['login']));
    $mdp = htmlspecialchars(trim($_POST['mdp']));

    if (!empty($login) && !empty($mdp)) {
        // Prepare the query to check if the login exists in the database
        $sql = "SELECT * FROM users WHERE login = :login";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':login', $login); // Bind the login parameter
        $stmt->execute();

        // Fetch user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Debug: Show the user data
        var_dump($user);

        // Check if user exists and password matches (no hashing, plain text comparison)
        if ($user && $mdp === $user['mdp']) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['login'] = $user['login'];

            // Redirect to dashboard
            header("Location: dashboard.php?id=" . $_SESSION['user_id']  );
            exit;
            
        } else {
            $loginError = "Identifiants incorrects.";
        }
    } else {
        $loginError = "Tous les champs sont requis.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h2>Formulaire de Connexion</h2>
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
</body>
</html>
