CREATE TABLE IF NOT EXISTS Contacts(
  ID SERIAL PRIMARY KEY,
  Nom TEXT,
  Prenom TEXT,
  Adresse TEXT,
  NumTel TEXT,
  Mail TEXT
);

CREATE TYPE TypeLic AS ENUM ('J','A','F');
CREATE TYPE TypeRole AS ENUM ('Bureau', 'Entraineur', 'Administrateur', 'Adherent', 'Mineur', 'Benevole');
CREATE TYPE TypePasseport AS ENUM('Blanc', 'Jaune', 'Orange', 'Vert', 'Bleu', 'RougePerf', 'RougeExt','Noir');
CREATE TYPE TypeGenre AS ENUM('H','F');

CREATE TABLE Utilisateur(
  ID SERIAL PRIMARY KEY,
  NumLicence NUMERIC(6) UNIQUE,
  TypeLicence TypeLic,
  Nom varchar(100),
  Prenom varchar(100),
  Genre TypeGenre,
  DateNaissance DATE,
  Adresse TEXT,
  NumTel TEXT,
  NumFix TEXT,
  Mail TEXT,
  Role TypeRole,
  CodeUtilisateur TEXT,
  Passeport TypePasseport,
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
  Contenue TEXT,
  PRIMARY KEY (NumExp, NumDest, DateEnv),
  FOREIGN KEY (NumExp) REFERENCES Utilisateur(ID),
  FOREIGN KEY (NumDest) REFERENCES Utilisateur(ID)
);

CREATE TYPE TypeCateg AS ENUM ('Interieur', 'Exterieur');
CREATE TABLE Lieu(
  Nom TEXT PRIMARY KEY,
  Adresse TEXT,
  Categorie TypeCateg
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

CREATE TYPE TypeAssure AS ENUM ('Responsable Civile', 'Base', 'Base+', 'Base++');
CREATE TABLE AssuranceAdh(
  NumAssurer INT PRIMARY KEY,
  Type TypeAssure,
  OptionSki BOOLEAN,
  OptionSLHL BOOLEAN,
  OptionTrail BOOLEAN,
  OptionVTT BOOLEAN
);

CREATE TYPE TypeCertificat AS ENUM ('L','C','PSS','NP');
CREATE TABLE Certificat(
  ID SERIAL PRIMARY KEY,
  NumLic INT,
  Type TypeCertificat,
  NomMedecin Text,
  DateSaisie Date,
  Alpi BOOLEAN,
  FOREIGN KEY (NumLic) REFERENCES Utilisateur(ID)
);

CREATE TYPE TypePratique AS ENUM ('Difficulte', 'Bloc', 'Vitesse');
CREATE TABLE Pratique (
  Type TypePratique PRIMARY KEY
);

CREATE TYPE TypeJour AS ENUM('L','M','Me','J','V','S','D');
CREATE TABLE Cours(
  ID SERIAL PRIMARY KEY,
  Nom TEXT,
  HeureDebut TIME,
  HeureFin TIME CHECK (HeureFin > HeureDebut),
  Jour TypeJour,
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
  Type TypePratique REFERENCES Pratique(Type),
  PRIMARY KEY (ID,Type),
  CHECK ((IDEvent <> null and IDCours = null) OR (IDEvent = null AND IDCours <> null))
);
