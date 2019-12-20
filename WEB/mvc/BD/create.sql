CREATE TABLE Contact(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Nom VARCHAR(40),
  Prenom VARCHAR(40),
  Adresse VARCHAR(50),
  NumTel VARCHAR(10),
  Mail VARCHAR(30)
) ENGINE = InnoDB;

CREATE TABLE Utilisateur(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  NumLicence NUMERIC(6) UNIQUE,
  TypeLicence ENUM ('J','A','F'),
  Nom VARCHAR(40),
  Prenom VARCHAR(40),
  Genre ENUM('H','F'),
  DateNaissance DATE,
  Adresse VARCHAR(50),
  NumTel VARCHAR(10),
  NumFix VARCHAR(10),
  Mail VARCHAR(30),
  Role ENUM ('Bureau', 'Entraineur', 'Administrateur', 'Adherent', 'Mineur', 'Benevole'),
  CodeUtilisateur VARCHAR(20),
  Passeport ENUM('Blanc', 'Jaune', 'Orange', 'Vert', 'Bleu', 'RougePerf', 'RougeExt','Noir'),
  Contact SMALLINT UNSIGNED,
  CONSTRAINT `fk_contact_contactid`
    FOREIGN KEY (Contact) REFERENCES Contact (ID)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
  ) ENGINE = InnoDB;
