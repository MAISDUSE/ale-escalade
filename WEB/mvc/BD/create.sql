BEGIN;
CREATE TABLE IF NOT EXISTS Contact(
  ID INTEGER PRIMARY KEY AUTOINCREMENT,
  Nom VARCHAR(100),
  Prenom VARCHAR(100),
  Adresse VARCHAR(255),
  NumTel VARCHAR(15),
  Mail VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS Adherent(
  ID INTEGER PRIMARY KEY AUTOINCREMENT,
  NumLicence NUMERIC(6) UNIQUE,
  TypeLicence CHAR CHECK (TypeLicence = 'J' OR TypeLicence = 'A' OR TypeLicence = 'F'),
  Nom VARCHAR(100),
  Prenom VARCHAR(100),
  Genre CHAR CHECK (Genre = 'H' OR Genre = 'F'),
  DateNaissance DATE,
  Adresse VARCHAR(255),
  NumTel VARCHAR(15),
  Mail VARCHAR(100),
  Role VARCHAR(15) CHECK (Role = 'Bureau' OR Role = 'Entraineur' OR Role = 'Administrateur'
    OR Role = 'Adherent' OR Role = 'Mineur' OR Role = 'Benevole'),
  CodeUtilisateur VARCHAR(20),
  Passeport VARCHAR(10) CHECK (Passeport = 'Blanc' OR Passeport = 'Jaune'
    OR Passeport = 'Orange' OR Passeport = 'Vert' OR Passeport = 'Bleu'
    OR Passeport = 'RougePerf' OR Passeport = 'RougeExt' OR Passeport = 'Noir'),
  Contact INTEGER UNSIGNED,
  FOREIGN KEY (Contact) REFERENCES Contact (ID)
  );

  CREATE TABLE IF NOT EXISTS Utilisateur(
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    AdhID INTEGER,
    adresseMail TEXT UNIQUE,
    Admin VARCHAR(5) CHECK (Admin = "TRUE" OR Admin = "FALSE"),
    Prenom TEXT,
    Nom TEXT,
    Mdp TEXT,
    FOREIGN KEY (AdhID) REFERENCES Adherent(ID)
  );

CREATE TABLE IF NOT EXISTS Actualite(
  Id INTEGER PRIMARY KEY AUTOINCREMENT,
  Titre VARCHAR(100),
  Image TEXT,
  DatePub DATE,
  Description TEXT,
  Fichiers TEXT,
  NumCrea INTEGER UNSIGNED,
  FOREIGN KEY (NumCrea) REFERENCES Utilisateur (ID)

);

CREATE TABLE IF NOT EXISTS Message(
  NumExp INTEGER UNSIGNED,
  NumDest INTEGER UNSIGNED,
  DateEnv DATE,
  Contenu VARCHAR(1000),
  PRIMARY KEY (NumExp, NumDest, DateEnv),
  FOREIGN KEY (NumExp) REFERENCES Utilisateur(ID),
  FOREIGN KEY (NumDest) REFERENCES Utilisateur(ID)
);

CREATE TABLE IF NOT EXISTS Lieu(
  Nom VARCHAR(100) PRIMARY KEY,
  Adresse VARCHAR(255),
  Categorie VARCHAR(10) CHECK (Categorie = 'Interieur' OR Categorie = 'Exterieur')
);

CREATE TABLE IF NOT EXISTS Event(
  ID INTEGER PRIMARY KEY AUTOINCREMENT,
  Nom VARCHAR(100),
  Image TEXT,
  DatePub DATE,
  DateDebut DATE,
  DateFin DATE,
  Description TEXT(1000),
  Officiel VARCHAR(5) CHECK (Officiel = "TRUE" OR Officiel = "FALSE"),
  NumCrea INTEGER UNSIGNED,
  NomLieu VARCHAR(100),
  FOREIGN KEY (NumCrea) REFERENCES Utilisateur (ID)

);

CREATE TABLE IF NOT EXISTS Sujet(
  ID INTEGER PRIMARY KEY AUTOINCREMENT,
  Titre VARCHAR(100),
  DatePub DATE,
  Contenu TEXT(1000),
  IDAuteur INTEGER UNSIGNED,
  IDEvent INTEGER UNSIGNED default null,
  FOREIGN KEY (IDAuteur) REFERENCES Utilisateur (ID),
  FOREIGN KEY (IDEvent) REFERENCES Event (ID)
);

CREATE TABLE IF NOT EXISTS AssuranceAdh(
  NumAssurer INTEGER PRIMARY KEY AUTOINCREMENT,
  Type VARCHAR(5) CHECK (Type = 'RC' OR Type = 'B' OR Type = 'B+'
    OR Type = 'B++'),
  OptionSki BOOLEAN,
  OptionSLHL BOOLEAN,
  OptionTrail BOOLEAN,
  OptionVTT BOOLEAN,
  OptionTypeAssurance VARCHAR(3) CHECK (OptionTypeAssurance = 'IJ1' OR OptionTypeAssurance = 'IJ2' OR OptionTypeAssurance = 'IJ3' OR OptionTypeAssurance = 'NON') DEFAULT 'NON'
);

CREATE TABLE IF NOT EXISTS Certificat(
  ID INTEGER PRIMARY KEY AUTOINCREMENT,
  NumLic INTEGER UNSIGNED,
  Type VARCHAR(3) CHECK (Type = 'L' OR Type='C' OR Type='PSS' OR Type = 'NP'),
  NomMedecin VARCHAR(100),
  DateFin Date,
  Alpi BOOLEAN,
  NomMedecinAlpi VARCHAR(100) DEFAULT '',
  FOREIGN KEY (NumLic) REFERENCES Utilisateur (ID)
);

CREATE TABLE IF NOT EXISTS Cours(
  ID INTEGER PRIMARY KEY AUTOINCREMENT,
  Nom VARCHAR(100),
  HeureDebut TIME,
  HeureFin TIME CHECK (HeureFin > HeureDebut),
  Jour VARCHAR(2) CHECK (Jour = 'L' OR Jour = 'Ma' OR Jour ='Me' OR Jour = 'J'
    OR Jour='V' OR Jour = 'S' OR Jour = 'D' ),
  NbPlace INT,
  NomLieu VARCHAR(100),
  NumEntraineur INTEGER UNSIGNED,
  FOREIGN KEY (NomLieu) REFERENCES Lieu(Nom),
  FOREIGN KEY (NumEntraineur) REFERENCES Utilisateur(ID)
);

CREATE TABLE IF NOT EXISTS Commentaire(
  NumAuteur INTEGER UNSIGNED,
  IDSujet INTEGER UNSIGNED,
  DateCreation DATE,
  Contenu TEXT(1000),
  PRIMARY KEY (NumAuteur, IDSujet, DateCreation, Contenu),
  FOREIGN KEY (NumAuteur) REFERENCES Utilisateur (ID),
  FOREIGN KEY (IDSujet) REFERENCES Sujet (ID)
);

CREATE TABLE IF NOT EXISTS PratiqueEvent(
  ID INTEGER PRIMARY KEY AUTOINCREMENT,
  IDEvent INTEGER UNSIGNED default null,
  IDCours INTEGER UNSIGNED default null,
  Type VARCHAR(10) CHECK (Type = 'Difficulte' OR Type = 'Bloc' OR Type = 'Vitesse'),
  CHECK ((IDEvent <> null and IDCours = null) OR (IDEvent = null AND IDCours <> null))
);

CREATE TABLE IF NOT EXISTS InscriptionEnAttente(
  ID INTEGER PRIMARY KEY AUTOINCREMENT,
  Nom VARCHAR(100),
  Prenom VARCHAR(100),
  Genre CHAR CHECK (Genre = 'H' OR Genre = 'F'),
  TypeAssurance TEXT(20) CHECK (TypeAssurance = "RC" OR TypeAssurance = "B"
    OR TypeAssurance = "B+" OR TypeAssurance = "B++"),
  DateNaissance DATE,
  Adresse VARCHAR(100),
  NumTel VARCHAR(15),
  Mail VARCHAR(100),
  Passeport TEXT(10) CHECK (Passeport = "Blanc" OR Passeport = "Jaune"
    OR Passeport = "Orange" OR Passeport = "Vert" OR Passeport = "Bleu"
    OR Passeport = "RougePerf" OR Passeport = "RougeExt" OR Passeport = "Noir"),
  NomContact VARCHAR(100),
  PrenomContact VARCHAR(100),
  NumTelContact VARCHAR(15),
  AdresseContact VARCHAR(100),
  MailContact VARCHAR(100)
);


INSERT INTO Utilisateur(adresseMail, Admin, Prenom, Nom, Mdp) VALUES('hugo.iteprat@etu.univ-grenoble-alpes.fr', 'TRUE', 'Hugo', 'Iteprat', 'ceciestuntresbonmdp');
COMMIT;
