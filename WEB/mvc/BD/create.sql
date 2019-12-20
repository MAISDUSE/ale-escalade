CREATE TABLE IF NOT EXISTS Contact(
  ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Nom TEXT(100),
  Prenom TEXT(100),
  Adresse TEXT(100),
  NumTel TEXT(100),
  Mail TEXT(100)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Utilisateur(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  NumLicence NUMERIC(6) UNIQUE,
  TypeLicence ENUM ('J','A','F'),
  Nom varchar(100),
  Prenom varchar(100),
  Genre ENUM('H','F'),
  DateNaissance DATE,
  Adresse TEXT(100),
  NumTel TEXT(100)(100),
  NumFix TEXT(100),
  Mail TEXT(100),
  Role ENUM ('Bureau', 'Entraineur', 'Administrateur', 'Adherent', 'Mineur', 'Benevole'),
  CodeUtilisateur TEXT(100),
  Passeport ENUM('Blanc', 'Jaune', 'Orange', 'Vert', 'Bleu', 'RougePerf', 'RougeExt','Noir'),
  Contact INT,
  CONSTRAINT `fk_contact_contactid`
    FOREIGN KEY (Contact) REFERENCES Contact (ID)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS CompteRendu(
  Titre varchar(50),
  DatePub DATE,
  Contenu TEXT(100),
  NumAuteur INT,
  FOREIGN KEY (NumAuteur) REFERENCES Utilisateur(ID),
  PRIMARY KEY (Titre, DatePub)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Message(
  NumExp INT,
  NumDest INT,
  DateEnv TIMESTAMP,
  Contenu TEXT(100),
  PRIMARY KEY (NumExp, NumDest, DateEnv),
  FOREIGN KEY (NumExp) REFERENCES Utilisateur(ID),
  FOREIGN KEY (NumDest) REFERENCES Utilisateur(ID)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Lieu(
  Nom TEXT(100) PRIMARY KEY,
  Adresse TEXT(100),
  Categorie ENUM ('Interieur', 'Exterieur')
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Event(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Nom TEXT(100),
  DateDebut TIMESTAMP,
  DateFin TIMESTAMP CHECK (DateFin > DateDebut),
  Description TEXT(100),
  Officiel BOOLEAN,
  NumCrea INT,
  NomLieu TEXT(100),
  FOREIGN KEY (NumCrea) REFERENCES Utilisateur(ID),
  FOREIGN KEY (NomLieu) REFERENCES Lieu(Nom)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Sujet(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Titre VARCHAR(50),
  DatePub DATE,
  Contenu TEXT(100),
  IDAuteur INT,
  IDEvent INT default null,
  FOREIGN KEY (IDAuteur) REFERENCES Utilisateur(ID),
  FOREIGN KEY (IDEvent) REFERENCES Event(ID)
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
  NomMedecin TEXT(100),
  DateSaisie Date,
  Alpi BOOLEAN,
  FOREIGN KEY (NumLic) REFERENCES Utilisateur(ID)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Pratique (
  Type ENUM ('Difficulte', 'Bloc', 'Vitesse') PRIMARY KEY
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Cours(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Nom TEXT(100),
  HeureDebut TIME,
  HeureFin TIME CHECK (HeureFin > HeureDebut),
  Jour ENUM('L','M','Me','J','V','S','D'),
  NbPlace INT,
  NomLieu TEXT(100),
  NumEntraineur INT,
  FOREIGN KEY (NomLieu) REFERENCES Lieu(Nom),
  FOREIGN KEY (NumEntraineur) REFERENCES Utilisateur(ID)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Commentaire(
  NumAuteur INT,
  IDSujet INT,
  Date DATE,
  Contenu TEXT(100),
  PRIMARY KEY (NumAuteur, IDSujet, Date),
  FOREIGN KEY (NumAuteur) REFERENCES Utilisateur(ID),
  FOREIGN KEY (IDSujet) REFERENCES Sujet(ID)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS PratiqueEvent(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  IDEvent INT default null,
  IDCours INT default null,
  Type ENUM ('Difficulte', 'Bloc', 'Vitesse') REFERENCES Pratique(Type),
  PRIMARY KEY (ID,Type),
  CHECK ((IDEvent <> null and IDCours = null) OR (IDEvent = null AND IDCours <> null))
) ENGINE = InnoDB;
