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
  Nom TEXT(100),
  Prenom TEXT(100),
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
  CONSTRAINT `fk_numauteur_utilisateurid`
    FOREIGN KEY (NumAuteur) REFERENCES Utilisateur (ID)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  PRIMARY KEY (Titre, DatePub)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Message(
  NumExp INT,
  NumDest INT,
  DateEnv TIMESTAMP,
  Contenu TEXT(100),
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
  Contenu TEXT(100),
  IDAuteur INT,
  IDEvent INT default null,
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
  NomMedecin TEXT(100),
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
  Nom TEXT(100),
  HeureDebut TIME,
  HeureFin TIME CHECK (HeureFin > HeureDebut),
  Jour ENUM('L','M','Me','J','V','S','D'),
  NbPlace INT,
  NomLieu TEXT(100),
  NumEntraineur INT,
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
  NumAuteur INT,
  IDSujet INT,
  Date DATE,
  Contenu TEXT(100),
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
  IDEvent INT default null,
  IDCours INT default null,
  Type ENUM ('Difficulte', 'Bloc', 'Vitesse') REFERENCES Pratique(Type),
  PRIMARY KEY (ID,Type),
  CHECK ((IDEvent <> null and IDCours = null) OR (IDEvent = null AND IDCours <> null))
) ENGINE = InnoDB;
