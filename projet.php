
<?php
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu des Projets</title>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Ultra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./Projet/projet.css">
</head>
<body>
    <div class="cursor" id="cursor"></div>
    <div class="container">
        <!-- Filter UI inside the container -->
        <div class="filter-container">
            <select id="projectFilter" onchange="filterProjects()">
                <option value="all">Tout</option>
                <option value="sql">SQL</option>
                <option value="python">Python</option>
                <option value="javascript">JavaScript</option>
            </select>
        </div>

        <!-- Menu content with projects -->
        <div class="menu">

            <?php foreach ($projets as $projet): ?>
                <!-- <a href="./Projet/role.html" target="_blank" class="project python"><h1>JEU DE ROLE</h1></a> -->
                <a href="./projet-db.php?id=<?= $projet['projet_id']; ?>" target="_blank" class="project python sql"><h1><?php echo $projet['projetName']; ?></h1></a>
            <?php endforeach; ?>
            <!-- <a href="./Projet/Gestion.html" target="_blank" class="project sql javascript"><h1>GESTION SECU</h1></a>
            <a href="./Projet/Scanner.html" target="_blank" class="project sql python"><h1>SCANNER</h1></a>
            <a href="./Projet/convertisseur.html" target="_blank" class="project python javascript"><h1>CONVERTISSEUR</h1></a> -->
        </div>
    </div>
    <script>
        // Function to filter the projects based on the selected option
        function filterProjects() {
            const filterValue = document.getElementById('projectFilter').value;
            const projects = document.querySelectorAll('.menu .project');
            
            projects.forEach(project => {
                // If 'All' is selected, show all projects
                if (filterValue === 'all') {
                    project.classList.remove('hidden');
                } else {
                    // Hide projects that do not match the selected category
                    if (project.classList.contains(filterValue)) {
                        project.classList.remove('hidden');
                    } else {
                        project.classList.add('hidden');
                    }
                }
            });
        }
        // Mouse move effect for menu
        const menu = document.querySelector('.menu');
        document.addEventListener('mousemove', (e) => {
            const x = e.clientX; // Position X of the mouse
            const y = e.clientY; // Position Y of the mouse
            const width = window.innerWidth; // Window width
            const height = window.innerHeight; // Window height
            const moveX = (x - width / 2) / width * 50; // X movement
            const moveY = (y - height / 2) / height * 50; // Y movement
            menu.style.transform = `rotateX(${moveY}deg) rotateY(${moveX}deg)`;
        });
    </script>
    <script src="/script.js"></script>
</body>
</html>
