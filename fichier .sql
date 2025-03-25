-- Création de la base de données
CREATE DATABASE IF NOT EXISTS gestion_projets;
USE gestion_projets;

-- Création de la table utilisateurs
CREATE TABLE utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prénom VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL
);

-- Création de la table projets
CREATE TABLE projets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    date_debut DATE,
    date_fin DATE,
    statut VARCHAR(50)
);

-- Création de la table projets_utilisateurs (table d'association)
CREATE TABLE projets_utilisateurs (
    id_utilisateur INT,
    id_projet INT,
    PRIMARY KEY (id_utilisateur, id_projet),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id),
    FOREIGN KEY (id_projet) REFERENCES projets(id)
);

-- Insertion de quelques données d'exemple
INSERT INTO utilisateurs (nom, prénom, email) VALUES
('Doe', 'John', 'john.doe@example.com'),
('Smith', 'Jane', 'jane.smith@example.com');

INSERT INTO projets (titre, description, date_debut, date_fin, statut) VALUES
('Projet Web', 'Développement du site web de l\'entreprise.', '2024-01-15', '2024-06-30', 'En cours'),
('Application Mobile', 'Création d\'une application mobile pour les clients.', '2024-03-01', '2024-09-30', 'Planifié');

INSERT INTO projets_utilisateurs (id_utilisateur, id_projet) VALUES
(1, 1), -- John Doe affecté au Projet Web
(2, 1), -- Jane Smith affectée au Projet Web
(2, 2); -- Jane Smith affectée à l'Application Mobile