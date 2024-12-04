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
//         // $nom = trim($_POST['nom']);
//         // $prenom = trim($_POST['prenom']);
//         $login = trim($_POST['login']);
//         $mdp = trim($_POST['mdp']);

//         // $nom_echap = $conn->quote($nom);
//         // $prenom = $conn->quote($prenom);
//         $login = $conn->quote($login);
//         $mdp = $conn->quote($mdp);
    
//         $sql = "SELECT * FROM comptes WHERE loginU = :login AND mdp = :mdp" ;
//         // $conn->exec($sql);

//         // $sql = "INSERT INTO comptes (nom, prenom, loginU, mdp) VALUES (:nom, :prenom, :login, :mdp)";
//         $stmt = $conn->prepare($sql);

//         // $stmt->bindParam(':nom', $nom);
//         // $stmt->bindParam(':prenom', $prenom);
//         $stmt->bindParam(':login', $login);
//         $stmt->bindParam(':mdp', $mdp);



//         $stmt->execute();


//     }

// } catch (Exception $exception) {


// Database connection settings


// Establish database connection
// Initialize login error message
$loginError = '';
$pdo = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the login form
    $login = htmlspecialchars(trim($_POST['login']));
    $mdp = htmlspecialchars(trim($_POST['mdp']));
if (!empty($login) && !empty($mdp)) {
        // Prepare SQL query to check if the user exists in the database
        $sql = "SELECT * FROM users WHERE login = :login";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':login', $login);
        $stmt->execute();

        // Fetch the user data from the database
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if user exists and if password is correct
        if ($user && password_verify($mdp, $user['mdp'])) {
            // If login and password are correct, start a session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['login'] = $user['login'];

            // Redirect the user to the dashboard (or any page you want)
            header("Location: index.php");
            exit; // Make sure the script ends here
        } else {
            // If login or password is incorrect
            $loginError = "Identifiants incorrects.";
        }
    } else {
        $loginError = "Tous les champs sont requis.";
    }
}
?>

<!-- <!DOCTYPE html>
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
 -->










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
            <input id="login" type="text" name="login" placeholder="Login">
      </div>
    
      <div class="form__field">
        <label for="mdp"></label>
            <input id="mdp" type="text" name="mdp" placeholder="Mot de passe">
      </div>
    
      <div class="form__field">
            <input type="submit" value="Se Connecter">
      </div>
    
    </form>
    
    <p class="text--center">Pas de compte? <a href="compte.php">Crée un compte</a></p>
    
  </div>
</body>
</html>
