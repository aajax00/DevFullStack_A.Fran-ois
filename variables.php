<?php

// Retrieving Variables Using the MySQL Client
$projetsStatement = $mysqlClient->prepare('SELECT * FROM projets');
$projetsStatement->execute();
$projets = $projetsStatement->fetchAll();


// $employees = [
//     [
//         'name' => 'Alice',
//         'departement' => 'IT',
//         'experiance' => 5,
//     ],
//     [
//         'name' => 'Maxime',
//         'departement' => 'Finance',
//         'experiance' => 2,
//     ],
//     [
//         'name' => 'Antoine',
//         'departement' => 'RH',
//         'experiance' => 4,
//     ],
// ];
