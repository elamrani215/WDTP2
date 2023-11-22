CREATE DATABASE college_forum;

CREATE TABLE Utilisateur (
    id_Utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nomUtilisateur VARCHAR(45) UNIQUE,
    nom VARCHAR(25),
    MotDePasse VARCHAR(20),
    DateDeNaissance DATE
);

CREATE TABLE Forum (
    id_Article INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100),
    article varchar(1000),
    datePublication DATE,
    auteur varchar(45),
    id_Utilisateur INT,
    FOREIGN KEY (id_Utilisateur) REFERENCES Utilisateur(id_Utilisateur)
);