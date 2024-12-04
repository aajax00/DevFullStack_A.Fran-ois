<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./connexion.css">
    <title>Connexion</title>
</head>

<body>


    <h2>ALEXANDRE GARDIEN</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="POST">
                <h1>Cree ton compte</h1>
                <label for="nom">Nom</label>
                <input type="text" placeholder="Nom" name="nom" />

                <label for="prenom">Prénom</label>
                <input type="text" placeholder="Prenom" name="prenom" />

                <label for="login">Login</label>
                <input type="text" placeholder="Login" />

                <label for="mdp">Mot de passe</label>
                <input type="text" placeholder="Mot de passe" name="mdp" />
                
                <button type="submit">s'inscrire</button>
            </form>
        </div>


        <div class="form-container sign-in-container">
            <form action="" method="post">
                <h1>Connecte toi</h1>

                <label for="nom"></label>
                <input id="login" type="text" name="login" placeholder="Login">


                <label for="mdp"></label>
                <input id="mdp" type="text" name="mdp" placeholder="Mot de passe">
                <!-- <a href="#">Tu as perdu ton mot de passe?</a> -->
                <button type="submit" value="Se connecter">Se connecter</button>
            </form>
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
                    <p>Cree toi un noiveau compte !</p>
                    <button class="ghost" id="signUp">S'inscrire</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p> &copy; Alexandre Gardien - 2024 </p>
    </footer>


    <script src="script.js"></script>
</body>

</html>