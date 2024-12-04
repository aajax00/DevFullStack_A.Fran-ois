DROP DATABASE IF EXISTS inscription;
CREATE DATABASE inscription;
USE inscription;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom TEXT,
  prenom TEXT,
  login TEXT,
  mdp TEXT);

-- INSERT INTO users (nom, prenom, login, mdp) VALUES 
-- ('Dupont', 'Jean', 'jdp@mail.com', 'azerty'),
-- ('Dusinge', 'Karine', 'kds@mail.com', 'uiop'),
-- ('Dufond', 'Carole', 'cdf@mail.com', 'qsdfg'),
-- ('Duchef', 'Timeo', 'tdc@mail.com', 'hjklm'),
-- ('Dujuin', 'Maxime', 'mdj@mail.com', 'wxcv'),
-- ('Duvoisin', 'Patrick', 'pdv@mail.com', 'bn,;');

SELECT * FROM users;
