CREATE TABLE IF NOT EXISTS Contacts(
  ID SERIAL PRIMARY KEY,
  Nom TEXT,
  Prenom TEXT,
  Adresse TEXT,
  NumTel TEXT,
  Mail TEXT
);

CREATE TABLE Utilisateur(
  ID SERIAL PRIMARY KEY,
  NumLicence NUMERIC(6) UNIQUE,
  TypeLicence ENUM ('J','A','F'),
  Nom varchar(100),
  Prenom varchar(100),
  Genre ENUM('H','F'),
  DateNaissance DATE,
  Adresse TEXT,
  NumTel TEXT,
  NumFix TEXT,
  Mail TEXT,
  Role ENUM ('Bureau', 'Entraineur', 'Administrateur', 'Adherent', 'Mineur', 'Benevole'),
  CodeUtilisateur TEXT,
  Passeport ENUM('Blanc', 'Jaune', 'Orange', 'Vert', 'Bleu', 'RougePerf', 'RougeExt','Noir'),
  Contact INT,
  FOREIGN KEY (Contact) REFERENCES Contacts(ID)
);

CREATE TABLE CompteRendu(
  Titre varchar(50),
  DatePub DATE,
  Contenu TEXT,
  NumAuteur INT,
  FOREIGN KEY (NumAuteur) REFERENCES Utilisateur(ID),
  PRIMARY KEY (Titre, DatePub)
);

CREATE TABLE Message(
  NumExp INT,
  NumDest INT,
  DateEnv TIMESTAMP,
  Contenu TEXT,
  PRIMARY KEY (NumExp, NumDest, DateEnv),
  FOREIGN KEY (NumExp) REFERENCES Utilisateur(ID),
  FOREIGN KEY (NumDest) REFERENCES Utilisateur(ID)
);

CREATE TABLE Lieu(
  Nom TEXT PRIMARY KEY,
  Adresse TEXT,
  Categorie ENUM ('Interieur', 'Exterieur')
);

CREATE TABLE Event(
  ID SERIAL PRIMARY KEY,
  Nom TEXT,
  DateDebut TIMESTAMP,
  DateFin TIMESTAMP CHECK (DateFin > DateDebut),
  Description TEXT,
  Officiel BOOLEAN,
  NumCrea INT,
  NomLieu TEXT,
  FOREIGN KEY (NumCrea) REFERENCES Utilisateur(ID),
  FOREIGN KEY (NomLieu) REFERENCES Lieu(Nom)
);

CREATE TABLE Sujet(
  ID SERIAL PRIMARY KEY,
  Titre VARCHAR(50),
  DatePub DATE,
  Contenu TEXT,
  IDAuteur INT,
  IDEvent INT default null,
  FOREIGN KEY (IDAuteur) REFERENCES Utilisateur(ID),
  FOREIGN KEY (IDEvent) REFERENCES Event(ID)
);

CREATE TABLE AssuranceAdh(
  NumAssurer INT PRIMARY KEY,
  Type ENUM ('Responsable Civile', 'Base', 'Base+', 'Base++'),
  OptionSki BOOLEAN,
  OptionSLHL BOOLEAN,
  OptionTrail BOOLEAN,
  OptionVTT BOOLEAN
);

CREATE TABLE Certificat(
  ID SERIAL PRIMARY KEY,
  NumLic INT,
  Type ENUM ('L','C','PSS','NP'),
  NomMedecin Text,
  DateSaisie Date,
  Alpi BOOLEAN,
  FOREIGN KEY (NumLic) REFERENCES Utilisateur(ID)
);

CREATE TABLE Pratique (
  Type ENUM ('Difficulte', 'Bloc', 'Vitesse') PRIMARY KEY
);

CREATE TABLE Cours(
  ID SERIAL PRIMARY KEY,
  Nom TEXT,
  HeureDebut TIME,
  HeureFin TIME CHECK (HeureFin > HeureDebut),
  Jour ENUM('L','M','Me','J','V','S','D'),
  NbPlace INT,
  NomLieu TEXT,
  NumEntraineur INT,
  FOREIGN KEY (NomLieu) REFERENCES Lieu(Nom),
  FOREIGN KEY (NumEntraineur) REFERENCES Utilisateur(ID)
);

CREATE TABLE Commentaire(
  NumAuteur INT,
  IDSujet INT,
  Date DATE,
  Contenu TEXT,
  PRIMARY KEY (NumAuteur, IDSujet, Date),
  FOREIGN KEY (NumAuteur) REFERENCES Utilisateur(ID),
  FOREIGN KEY (IDSujet) REFERENCES Sujet(ID)
);

CREATE TABLE PratiqueEvent(
  ID SERIAL,
  IDEvent INT default null,
  IDCours INT default null,
  Type ENUM ('Difficulte', 'Bloc', 'Vitesse') REFERENCES Pratique(Type),
  PRIMARY KEY (ID,Type),
  CHECK ((IDEvent <> null and IDCours = null) OR (IDEvent = null AND IDCours <> null))
);
