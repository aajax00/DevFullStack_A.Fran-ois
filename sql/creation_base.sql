-- Database Creation
CREATE DATABASE IF NOT EXISTS `aguardien`;
USE `aguardien`;

DROP TABLE comptes;
-- Table Creation
CREATE TABLE IF NOT EXISTS `projets` (
    `projet_id` INTEGER AUTO_INCREMENT,
    `projetName` VARCHAR(20) NOT NULL,
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
    `nom_id` INTEGER AUTO_INCREMENT,
    `nom` TEXT,
    `prenom` TEXT,
    `loginU` TEXT,
    `mdp` TEXT,
    PRIMARY KEY (`nom_id`)
);


-- Removing Old Data
DELETE FROM `projets`;
-- SELECT FORMAT (getdate(), 'dd/MM/yyyy') as date;

-- Data Insertion
INSERT INTO `projets` (projetName, dateprojet ,projetDesc ,projetObj, imageproj, experience, compétence_1, compétence_2, compétence_3)
VALUES 
('CONVERTISSEUR', '2019-10-10',
"Un convertisseur tout-en-un est une application qui permet de convertir divers types de données ou d'unités entre plusieurs formats ou systèmes. L'utilisateur peut réaliser des conversions d'unités de mesure (comme la longueur, le poids, ou la température), de devises (avec des taux de change en temps réel), ou encore de formats de fichiers (par exemple, de JPG à PNG, de PDF à Word, etc.)." ,
"L'objectif principal est de permettre à l'utilisateur de réaliser facilement et rapidement des conversions entre différents types de données et d'unités. L'application doit offrir une interface simple, où l'utilisateur peut sélectionner le type de conversion (unités, devises, fichiers, etc.), entrer les valeurs nécessaires et obtenir les résultats de manière fluide. Outils à utiliser : Python",
'./img/commercia_map.jpg',  
"Ce projet a été une belle opportunité d'apprentissage et d'innovation.", 
'Python', 'null', 'null');

-- Data Insertion compte utilisateur
INSERT INTO `comptes` (nom, prenom, loginU, mdp) VALUES
('aaaa', 'bbbb', 'cccc', 'cccc');




