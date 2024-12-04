-- Database Creation
CREATE DATABASE IF NOT EXISTS `aguardien`;
USE `aguardien`;

DROP TABLE IF EXISTS `comptes`;
DROP TABLE IF EXISTS `projets`;

-- Table Creation
CREATE TABLE IF NOT EXISTS `projets` (
    `projet_id` INTEGER AUTO_INCREMENT,
    `projetName` VARCHAR(50) NOT NULL,
    `dateprojet` DATE NOT NULL,
    `projetDesc` TEXT,
    `projetObj` TEXT,
    `imageproj` VARCHAR(200),
    `experience` TEXT,
    `compétence_1` TEXT,
    `compétence_2` TEXT,
    `compétence_3` TEXT,
    PRIMARY KEY (`projet_id`)
);


-- Creation table utilisateur
CREATE TABLE IF NOT EXISTS `comptes` (
    `id` INTEGER AUTO_INCREMENT,
    `nom` TEXT,
    `prenom` TEXT,
    `login` TEXT,
    `mdp` TEXT,
    PRIMARY KEY (`id`)
);


-- Removing Old Data
DELETE FROM `projets`;
-- SELECT FORMAT (getdate(), 'dd/MM/yyyy') as date;

-- Data Insertion
INSERT INTO `projets` (projetName, dateprojet ,projetDesc ,projetObj, imageproj, experience, compétence_1, compétence_2, compétence_3)
VALUES 
('Convertisseur', '2019-10-10',
"Un convertisseur tout-en-un est une application qui permet de convertir divers types de données ou d'unités entre plusieurs formats ou systèmes. L'utilisateur peut réaliser des conversions d'unités de mesure (comme la longueur, le poids, ou la température), de devises (avec des taux de change en temps réel), ou encore de formats de fichiers (par exemple, de JPG à PNG, de PDF à Word, etc.)." ,
"L'objectif principal est de permettre à l'utilisateur de réaliser facilement et rapidement des conversions entre différents types de données et d'unités. L'application doit offrir une interface simple, où l'utilisateur peut sélectionner le type de conversion (unités, devises, fichiers, etc.), entrer les valeurs nécessaires et obtenir les résultats de manière fluide. Outils à utiliser : Python",
'./img/Convertisseur.jpg',  
"Ce projet a été une belle opportunité d'apprentissage et d'innovation.", 
'Python', 'null', 'null');

INSERT INTO `projets` (projetName, dateprojet ,projetDesc ,projetObj, imageproj, experience, compétence_1, compétence_2, compétence_3)
VALUES 
('Jeu De Role','2019-05-05',
"Développez un jeu de rôle textuel dans lequel les joueurs interagissent avec l'histoire en choisissant différentes options à chaque étape. Les choix influencent le déroulement de l'histoire et peuvent conduire à plusieurs fins possibles.",
"Créer une narration riche et immersive où les choix du joueur affectent l'intrigue, les personnages et l'environnement. Outils à utiliser : Python (avec des bibliothèques comme textual)",
'./img/commercia_map.jpg',
"Ce projet a été une belle opportunité d'apprentissage et d'innovation. J'espère que vous avez apprécié cette présentation !",
'Python','null', 'null');

INSERT INTO `projets` (projetName, dateprojet ,projetDesc ,projetObj, imageproj, experience, compétence_1, compétence_2, compétence_3)
VALUES 
("Logiciel d'Inscription",'2020-11-09',
"Créez un logiciel permettant aux utilisateurs de s’inscrire à un événement en ligne, comme une conférence ou un séminaire. Le système peut inclure la collecte d'informations comme le nom, l'adresse e-mail, et l'option de choisir des sessions ou ateliers spécifiques.",
"Permettre aux utilisateurs de s'inscrire facilement, recevoir des confirmations d’inscription et des rappels par e-mail. Intégrer une gestion des places disponibles et des choix de sessions. Outils à utiliser : Python (Django ou Flask), MySQL pour la gestion des données, intégration d'API de messagerie (SendGrid, Mailgun).",
'./img/eleve.png',
"Ce projet a été une belle opportunité d'apprentissage et d'innovation.",
'Python', 'SQL', 'null');

INSERT INTO `projets` (projetName, dateprojet ,projetDesc ,projetObj, imageproj, experience, compétence_1, compétence_2, compétence_3)
VALUES 
('Logs de sécurité', '2021-09-08',
"Créer une plateforme qui collecte, analyse et alerte sur les logs de sécurité dans un système. Cette plateforme peut être utilisée pour surveiller les événements suspects, comme les tentatives d'intrusion, et fournir des rapports détaillés.",
"Permettre une surveillance continue des systèmes en analysant les logs générés par les serveurs, les applications, et les pare-feu pour détecter des comportements anormaux. Outils à utiliser : SQL, javascript",
'./img/Securite.jpg',
"Ce projet a été une belle opportunité d'apprentissage et d'innovation.",
'null', 'SQL', 'JavaScript');

INSERT INTO `projets` (projetName, dateprojet ,projetDesc ,projetObj, imageproj, experience, compétence_1, compétence_2, compétence_3)
VALUES 
('Gestion des vulnérabilités', '2023-10-10',
"Concevoir une plateforme qui centralise la gestion des vulnérabilités détectées dans l’environnement de production, en offrant une vue d'ensemble, des rapports et des recommandations pour résoudre les problèmes.",
"Fournir une interface qui permet aux équipes DevSecOps de suivre les vulnérabilités, de planifier leur résolution et de vérifier l’état de la sécurité. Outils à utiliser : python, sql",
'./img/R.png',
"Ce projet a été une belle opportunité d'apprentissage et d'innovation.",
'Python', 'SQL', 'null');


-- Data Insertion compte utilisateur
-- INSERT INTO users (nom, prenom, login, mdp) VALUES 
-- ('Dupont', 'Jean', 'jdp@mail.com', 'azerty'),
-- ('Dusinge', 'Karine', 'kds@mail.com', 'uiop'),
-- ('Dufond', 'Carole', 'cdf@mail.com', 'qsdfg'),
-- ('Duchef', 'Timeo', 'tdc@mail.com', 'hjklm'),
-- ('Dujuin', 'Maxime', 'mdj@mail.com', 'wxcv'),
-- ('Duvoisin', 'Patrick', 'pdv@mail.com', 'bn,;');

-- SELECT * FROM users;




