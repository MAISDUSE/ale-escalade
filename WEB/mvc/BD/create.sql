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

CREATE TABLE CompteRendu(
  Titre VARCHAR(50),
  DatePub DATE,
  Contenu VARCHAR(1000),
  NumAuteur SMALLINT UNSIGNED,
  CONSTRAINT `fk_numauteur_utilisateurid`
    FOREIGN KEY (NumAuteur) REFERENCES Utilisateur (ID)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  PRIMARY KEY (Titre, DatePub)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Message(
  NumExp SMALLINT UNSIGNED,
  NumDest SMALLINT UNSIGNED,
  DateEnv TIMESTAMP,
  Contenu VARCHAR(1000),
  PRIMARY KEY (NumExp, NumDest, DateEnv),
  CONSTRAINT `fk_numexp_utilisateurid`
    FOREIGN KEY (NumExp) REFERENCES Utilisateur (ID)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_numdest_utilisateurid`
    FOREIGN KEY (NumDest) REFERENCES Utilisateur(ID)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Lieu(
  Nom VARCHAR(50) PRIMARY KEY,
  Adresse VARCHAR(50),
  Categorie ENUM ('Interieur', 'Exterieur')
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Event(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Nom VARCHAR(40),
  DateDebut TIMESTAMP,
  DateFin TIMESTAMP CHECK (DateFin > DateDebut),
  Description TEXT(1000),
  Officiel BOOLEAN,
  NumCrea SMALLINT UNSIGNED,
  NomLieu VARCHAR(50),
  CONSTRAINT `fk_numcrea_utilisateurid`
    FOREIGN KEY (NumCrea) REFERENCES Utilisateur (ID)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_nomlieu_utilisateurid`
    FOREIGN KEY (NomLieu) REFERENCES Lieu (Nom)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Sujet(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Titre VARCHAR(50),
  DatePub DATE,
  Contenu TEXT(1000),
  IDAuteur SMALLINT UNSIGNED,
  IDEvent SMALLINT UNSIGNED default null,
  CONSTRAINT `fk_idauteur_utilisateurid`
    FOREIGN KEY (IDAuteur) REFERENCES Utilisateur (ID)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_idevent_eventid`
    FOREIGN KEY (IDEvent) REFERENCES Event (ID)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS AssuranceAdh(
  NumAssurer INT PRIMARY KEY,
  Type ENUM ('Responsable Civile', 'Base', 'Base+', 'Base++'),
  OptionSki BOOLEAN,
  OptionSLHL BOOLEAN,
  OptionTrail BOOLEAN,
  OptionVTT BOOLEAN
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Certificat(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  NumLic INT,
  Type ENUM ('L','C','PSS','NP'),
  NomMedecin VARCHAR(40),
  DateSaisie Date,
  Alpi BOOLEAN,
  CONSTRAINT `fk_numlic_utilisateurid`
    FOREIGN KEY (NumLic) REFERENCES Utilisateur (ID)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Pratique (
  Type ENUM ('Difficulte', 'Bloc', 'Vitesse') PRIMARY KEY
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Cours(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Nom VARCHAR(50),
  HeureDebut TIME,
  HeureFin TIME CHECK (HeureFin > HeureDebut),
  Jour ENUM('L','M','Me','J','V','S','D'),
  NbPlace INT,
  NomLieu VARCHAR(50),
  NumEntraineur SMALLINT UNSIGNED,
  CONSTRAINT `fk_nomlieu_lieunom`
    FOREIGN KEY (NomLieu) REFERENCES Lieu(Nom)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_numentraineur_utilisateurid`
    FOREIGN KEY (NumEntraineur) REFERENCES Utilisateur(ID)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Commentaire(
  NumAuteur SMALLINT UNSIGNED,
  IDSujet SMALLINT UNSIGNED,
  Date DATE,
  Contenu TEXT(1000),
  PRIMARY KEY (NumAuteur, IDSujet, Date),
  CONSTRAINT `fk_numauteur_utilisateurid`
    FOREIGN KEY (NumAuteur) REFERENCES Utilisateur (ID)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_idsujet_sujetid`
    FOREIGN KEY (IDSujet) REFERENCES Sujet (ID)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS PratiqueEvent(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  IDEvent SMALLINT UNSIGNED default null,
  IDCours SMALLINT UNSIGNED default null,
  Type ENUM ('Difficulte', 'Bloc', 'Vitesse') REFERENCES Pratique(Type),
  PRIMARY KEY (ID,Type),
  CHECK ((IDEvent <> null and IDCours = null) OR (IDEvent = null AND IDCours <> null))
) ENGINE = InnoDB;
