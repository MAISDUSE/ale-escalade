CREATE TABLE Adherent(
  numAdherent INTEGER PRIMARY KEY,
  nom TEXT,
	prenom TEXT,
	role TEXT,
  naissance DATE
);

CREATE TABLE CompteRendu(
  numAuteur INTEGER REFERENCES Adherent(numAdherent),
  titre TEXT,
	date DATE,
	contenu TEXT,
  PRIMARY KEY (titre, date)
);

CREATE TABLE Message(
  date DATE,
  numExpediteur INTEGER,
  numDestinataire INTEGER,
	contenu TEXT,
  PRIMARY KEY (date, numExpediteur),
  FOREIGN KEY (numExpediteur, numDestinataire) REFERENCES Adherent(numAdherent, numAdherent)
);

CREATE TABLE Lieu(
  adresse TEXT PRIMARY KEY,
  nom TEXT
);

CREATE TABLE Sortie(
  nom TEXT,
  numOrganisateur INTEGER REFERENCES Adherent(numAdherent),
  addrLieu TEXT REFERENCES Lieu(adresse),
  date DATE,
  valide BOOLEAN,
  pratique TEXT,
  image BLOP,
  PRIMARY KEY (nom, date)
);

CREATE TABLE Vehicule(
  matricule TEXT PRIMARY KEY,
  numProprietaire TEXT REFERENCES Adherent(numAdherent),
  nomSortie TEXT REFERENCES Sortie(nom),
  nbplaces INTEGER
);

CREATE TABLE Commentaire(
  date DATE,
  numAuteur INTEGER REFERENCES Adherent(numAdherent),
  nomSortie TEXT REFERENCES Sortie(nom),
  contenu TEXT,
  PRIMARY KEY (date, numAuteur)
);
