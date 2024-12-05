<?php
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');


// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['login'])) {
    header("Location: index.php"); // Rediriger vers la page de connexion si non connecté
    exit;
}

// echo "Bienvenue " . $_SESSION['login'];
// echo " ";
// echo "Vous êtes connecté";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <title>Alexandre Gardien</title>
</head>

<body>
    <div class="cursor" id="cursor"></div>

    <div class="container">
        <div class="header">
            <h1>Alexandre Gardien</h1>
            <p class="subtitle">Developpeur Web Fullstack</p>
        </div>

        <?php if ($_SESSION['login']): ?>
            <p class="session" onclick="toggleLogout()" unselectable="off">
                <?php echo " 👤 - " . $_SESSION['login']; ?>
                <span class="deco" id="deco-link">
                    <a href="logout.php">Déconnexion</a>
                </span>
                

            </p>
        <?php endif; ?>

        <div class="box">



            <main>
                <section class="hero">
                    <div class="hero-content">
                        <h1>Bienvenue,<br>
                            Tu cherches un <span>Developpeur web Fullstack</span> ?
                        </h1>
                        <p>Je suis <span>Alexandre</span>, un développeur web fullstack <span>passionné</span>.<br>
                            Je suis l'incarnation de l’adaptation et la créativité.<br>
                            je crée des solution numériques modernes et performantes, <br>du design à la base de donnée.
                        </p>

                        <div class="social">
                            <a href="https://www.linkedin.com/school/guardia-cybersecurity-school/" target="_blank">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                            <a href="https://x.com/Guardia_School" target="_blank">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="https://www.facebook.com/guardiaschool/" target="_blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </div>

                        <div class="sec-right">
                            <div class="menu">
                                <div class="menu-item">
                                    <a href="#education" class="link">Infos</a>
                                </div>
                                <div class="menu-item">
                                    <a href="projet.php" target="_blank" class="link">ProJets</a>
                                </div>
                                <div class="menu-item">
                                    <a href="mailto:contact@guardia.school" class="link">Contact</a>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="photo">
                        <img src="img/agardien.png" alt="">
                    </div>

                </section>
            </main>

        </div>
    </div>

    <section class="section-education" id="education">
        <h2 class="heading">EDUCATION</h2>

        <div class="timeline">
            <div class="time-item">
                <div class="time-dot"></div>
                <div class="time-date-1">2023</div>
                <div class="time-content">
                    <h3>MASTER IGÉNIERIE WEB ET INNOVATIONS DIGITALES</h3>
                    <p>IIM Digital School (47 BD de Pésaro, 92000 Nanterre)</p>
                    <P>
                        <li>Architecture mobile : Flutter, Swift</li>
                    </P>
                    <p>
                        <li>DevOps : Azure, Kubernetes, AWS</li>
                    </p>
                    <p>
                        <li>Open source : création et contribution</li>
                    </p>
                    <p>
                        <li>Creative development : nouvelles interfaces</li>
                    </p>
                </div>
            </div>

            <div class="time-item">
                <div class="time-dot"></div>
                <div class="time-date-2">2021</div>
                <div class="time-content">
                    <h3>BACHELOR APPLICATION DEVELOPER</h3>
                    <p>ECE-PARIS (131 BD de Sébastopol, 75002 Paris)</p>
                    <p>
                        <li>Développer une application sécurisée</li>
                    </p>
                    <p>
                        <li>Développer une application sécurisée en couches</li>
                    </p>
                    <p>
                        <li>Préparer le déploiement d’une application sécurisée</li>
                    </p>
                </div>
            </div>

            <div class="time-item">
                <div class="time-dot"></div>
                <div class="time-date-3">2020</div>
                <div class="time-content">
                    <h3>BTS SIO / SLAM</h3>
                    <p>IMIE-PARIS (70 r Anatole France, 92300 Levallois Perret) </p>
                    <p>
                        <li>Mathématiques pour l'informatique</li>
                    </p>
                    <p>
                        <li>Culture économique, juridique et managériale pour l'informatique</li>
                    </p>
                    <p>
                        <li>Conception et développement d'applications</li>
                    </p>
                    <p>
                        <li>Support et mise à disposition de services informatiques</li>
                    </p>
                </div>

            </div>

            <div class="time-item">
                <div class="time-dot"></div>
                <div class="time-date-4">2018</div>
                <div class="time-content">
                    <h3>BAC S SCIENCE DE L'INGÉNIEUR</h3>
                    <p>Lycée Charles Augustin Coulomb (10 all Joachim du Bellay, 16000 Angoulême) </p>
                    <p>
                        <li>les objets connectés et l’internet des objets</li>
                    </p>
                    <p>
                        <li>les applications numériques nomades</li>
                    </p>
                    <p>
                        <li>l’ingénierie design et le prototypage de produits innovants</li>
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="competence" id="competence">
        <h2 class="heading">Compétence</h2>
        <div class="competence-container">
            <div class="competence-box">
                <div class="competence-info">
                    <h4>Fullstack web</h4>
                    <p> HTML CSS JS(angular, react) </p>
                </div>
            </div>
            <div class="competence-box">
                <div class="competence-info">
                    <h4>Python</h4>
                    <p> DJANGO TURBOGEARS PYRAMID </p>
                </div>
            </div>
            <div class="competence-box">
                <div class="competence-info">
                    <h4>Base de donnée</h4>
                    <p> MySQL Oracle Mongodb </p>
                </div>
            </div>
            <div class="competence-box">
                <div class="competence-info">
                    <h4>CMS</h4>
                    <p> Wordpress Magneto </p>
                </div>
            </div>
        </div>
    </section>


    <section class="experience" id="experience">
        <div class="experience-box">
            <h2 class="heading">Expérience</h2>
            <div class="wrapper">
                <div class="experience-item">
                    <img src="img/Vera.jpg">
                    <h2>Vera</h2>
                    <div class="rating">
                        <i class="fa-sharp fa-solid fa-star"></i>
                        <i class="fa-sharp fa-solid fa-star"></i>
                        <i class="fa-sharp fa-solid fa-star"></i>
                        <i class="fa-sharp fa-solid fa-star"></i>
                        <i class="fa-sharp fa-solid fa-star"></i>
                    </div>
                    <p>Création d'un site e-commerce pour un créateur de vêtement</p>
                </div>
                <div class="experience-item">
                    <img src="img/arm.jpg">
                    <h2>Armure et Saumure</h2>
                    <div class="rating">
                        <i class="fa-sharp fa-solid fa-star"></i>
                        <i class="fa-sharp fa-solid fa-star"></i>
                    </div>
                    <p>Création d'un site web d'entreprise</p>
                </div>
                <div class="experience-item">
                    <img src="img/ang.jpg">
                    <h2>Angoulème</h2>
                    <div class="rating">
                        <i class="fa-sharp fa-solid fa-star"></i>
                        <i class="fa-sharp fa-solid fa-star"></i>
                        <i class="fa-sharp fa-solid fa-star"></i>
                    </div>
                    <p>Amélioration du site web de la mairie d'anghouleme</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Alexandre Gardien | Tous droits réservés</p>
    </footer>


    <script src="https://kit.fontawesome.com/b283df68b9.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>