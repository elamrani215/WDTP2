CREATE DATABASE college_forum;

USE college_forum ;

CREATE TABLE Utilisateur (
    id_Utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nomUtilisateur VARCHAR(45) unique,
    nom VARCHAR(25),
    motDePasse VARCHAR(80),
    dateDeNaissance DATE
);

CREATE TABLE Forum (
    id_forum INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100),
    article varchar(1000),
    datePublication DATE,
    auteur VARCHAR(45),
    id_Utilisateur INT,
    FOREIGN KEY (id_Utilisateur) REFERENCES Utilisateur(id_Utilisateur)
);


