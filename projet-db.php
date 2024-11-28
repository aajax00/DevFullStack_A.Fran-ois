<?php
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">    <title>Liste des projets</title>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            margin: 0;
            padding: 0;
            background-color: black;
        }
        header {
            background-color: #1E1E1E;
            color: white;
            text-align: center;
            padding: 20px;
        }
        section {
            padding: 20px;
            margin: 20px;
            background-color: #313131;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        section h2 span {
            color: red;
        }

        .project-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }
        .image img:hover {
            transform: scale(1.05);
        }
        .text-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 10px;
        }
        .text-content h2 {
            font-size: 1.5rem;
            color: white;
            margin-bottom: 10px;
        }
        .text-content p {
            font-size: 1rem;
            color: white;
            line-height: 1.5;
        }
        .project-card {
            padding: 20px;
            background-color: #007bff;
            color: white;
            text-align: center;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
        .project-card:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: inherit;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

    <header>
        <h1>LISTE DES PROJETS</h1>
    </header>

    <section>
        <h2><?php echo $projets[0]['projetName']; ?> - <span>[<?php echo $projets[0]['dateprojet']; ?>]</span></h2>
        <p><?php echo $projets[0]['projetDesc']; ?></p>
    </section>

    <section>
        <h2>Objectifs du Projet</h2>
        <p><?php echo $projets[0]['projetObj']; ?></p>
    </section>

    <section>
        <h2>Description Visuelle</h2>
        <div class="project-info">
            <div class="text-content">
                <p>Voici quelques images illustrant les étapes clés du projet. Ces visuels permettent de comprendre les innovations appliquées.</p>
            </div>
            <!-- Placez ici vos photos -->
            <div class="image">
                <img src="<?php echo $projets[0]['imageproj']; ?>" alt="">
            </div>
            <div>

            </div>
        </div>
    </section>

    <section>
        <h2>Conclusion</h2>
        <div class="project-card">
            <h2>Ressenti</h2>
            <p><?php echo $projets[0]['experience']; ?></p>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Projet Jeu de role Textuel | Tous droits réservés</p>
    </footer>

</body>
</html>
