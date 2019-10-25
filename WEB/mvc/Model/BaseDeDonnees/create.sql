CREATE TABLE Adherent(
  numAdherent INTEGER NOT NULL PRIMARY KEY,
  motdepasse TEXT NOT NULL,
  nom TEXT NOT NULL,
	prenom TEXT NOT NULL,
	role TEXT DEFAULT NULL,
  naissance DATE NOT NULL,
  telephone TEXT NOT NULL,
  email TEXT NOT NULL,
  addrCourrier TEXT NOT NULL,
  passport_escalade TEXT DEFAULT NULL,
  passport_skialpinisme TEXT DEFAULT NULL,
  passport_alpinisme TEXT DEFAULT NULL,
  passport_canyon TEXT DEFAULT NULL,
  passport_montagne TEXT DEFAULT NULL
);

CREATE TABLE CompteRendu(
  id INTEGER NOT NULL PRIMARY KEY,
  numAuteur INTEGER REFERENCES Adherent(numAdherent),
  titre TEXT NOT NULL,
	date DATE NOT NULL,
	contenu TEXT NOT NULL
);

CREATE TABLE Message(
  id INTEGER NOT NULL PRIMARY KEY,
  date DATE NOT NULL,
  numExpediteur INTEGER,
  numDestinataire INTEGER,
	contenu TEXT NOT NULL,
  FOREIGN KEY (numExpediteur, numDestinataire) REFERENCES Adherent(numAdherent, numAdherent)
);

CREATE TABLE Lieu(
  adresse TEXT NOT NULL PRIMARY KEY,
  nom TEXT NOT NULL
);

CREATE TABLE Sortie(
  id INTEGER NOT NULL PRIMARY KEY,
  nom TEXT NOT NULL,
  numOrganisateur INTEGER REFERENCES Adherent(numAdherent),
  addrLieu TEXT REFERENCES Lieu(adresse),
  date DATE NOT NULL,
  valide BOOLEAN DEFAULT 0,
  pratique TEXT NOT NULL
);

CREATE TABLE Vehicule(
  matricule TEXT NOT NULL PRIMARY KEY,
  numProprietaire TEXT REFERENCES Adherent(numAdherent),
  nomSortie TEXT REFERENCES Sortie(nom),
  nbplaces INTEGER NOT NULL
);

CREATE TABLE Commentaire(
  id INTEGER NOT NULL PRIMARY KEY,
  date DATE NOT NULL,
  numAuteur INTEGER REFERENCES Adherent(numAdherent),
  nomSortie TEXT REFERENCES Sortie(nom),
  contenu TEXT NOT NULL
);
