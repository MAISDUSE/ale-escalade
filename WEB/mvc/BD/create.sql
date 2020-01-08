BEGIN;
CREATE TABLE IF NOT EXISTS Contact(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Nom VARCHAR(100),
  Prenom VARCHAR(100),
  Adresse VARCHAR(255),
  NumTel VARCHAR(15),
  Mail VARCHAR(100)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Utilisateur(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  NumLicence NUMERIC(6) UNIQUE,
  TypeLicence ENUM ('J','A','F'),
  Nom VARCHAR(100),
  Prenom VARCHAR(100),
  Genre ENUM('H','F'),
  DateNaissance DATE,
  Adresse VARCHAR(255),
  NumTel VARCHAR(15),
  Mail VARCHAR(100),
  Role ENUM ('Bureau', 'Entraineur', 'Administrateur', 'Adherent', 'Mineur', 'Benevole'),
  CodeUtilisateur VARCHAR(20),
  Passeport ENUM('Blanc', 'Jaune', 'Orange', 'Vert', 'Bleu', 'RougePerf', 'RougeExt','Noir'),
  Contact SMALLINT UNSIGNED,
  CONSTRAINT `fk_contact_contactid`
    FOREIGN KEY (Contact) REFERENCES Contact (ID)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
  ) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS CompteRendu(
  Titre VARCHAR(100),
  DatePub DATE,
  Contenu VARCHAR(1000),
  NumAuteur SMALLINT UNSIGNED,
  CONSTRAINT `fk_numauteur_utilisateurid_compterendu`
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
  Nom VARCHAR(100) PRIMARY KEY,
  Adresse VARCHAR(255),
  Categorie ENUM ('Interieur', 'Exterieur')
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Event(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Nom VARCHAR(100),
  DateDebut TIMESTAMP,
  DateFin TIMESTAMP CHECK (DateFin > DateDebut),
  Description TEXT(1000),
  Officiel BOOLEAN,
  NumCrea SMALLINT UNSIGNED,
  NomLieu VARCHAR(100),
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
  Titre VARCHAR(100),
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
  NumLic SMALLINT UNSIGNED,
  Type ENUM ('L','C','PSS','NP'),
  NomMedecin VARCHAR(100),
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
  Nom VARCHAR(100),
  HeureDebut TIME,
  HeureFin TIME CHECK (HeureFin > HeureDebut),
  Jour ENUM('L','M','Me','J','V','S','D'),
  NbPlace INT,
  NomLieu VARCHAR(100),
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
  DateCreation DATE,
  Contenu TEXT(1000),
  PRIMARY KEY (NumAuteur, IDSujet, DateCreation),
  CONSTRAINT `fk_numauteur_utilisateurid_commentaire`
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

CREATE TABLE IF NOT EXISTS InscriptionEnAttente(
  ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Nom VARCHAR(100),
  Prenom VARCHAR(100),
  Genre ENUM('H','F'),
  TypeAssurance ENUM ('Responsable Civile', 'Base', 'Base+', 'Base++'),
  DateNaissance DATE,
  Adresse VARCHAR(100),
  NumTel VARCHAR(15),
  Mail VARCHAR(100),
  Passeport ENUM('Blanc', 'Jaune', 'Orange', 'Vert', 'Bleu', 'RougePerf', 'RougeExt','Noir'),
  NomContact VARCHAR(100),
  PrenomContact VARCHAR(100),
  NumTelContact VARCHAR(15),
  AdresseContact VARCHAR(100),
  MailContact VARCHAR(100)
) ENGINE = InnoDB;
COMMIT;
