
BEGIN;
DROP TABLE IF EXISTS PratiqueEvent;
COMMIT;

BEGIN;
DROP TABLE IF EXISTS Commentaire;
COMMIT;

BEGIN;
DROP TABLE IF EXISTS Cours;
DROP TYPE IF EXISTS TypeJour;
COMMIT;

BEGIN;
DROP TABLE IF EXISTS Pratique;
DROP TYPE IF EXISTS TypePratique;
COMMIT;


BEGIN;
DROP TABLE IF EXISTS Certificat;
DROP TYPE IF EXISTS TypeCertificat;
COMMIT;

BEGIN;
DROP TABLE IF EXISTS AssuranceAdh;
DROP TYPE IF EXISTS TypeAssure;
COMMIT;


BEGIN;
DROP TABLE IF EXISTS Sujet;
COMMIT;

BEGIN;
DROP TABLE IF EXISTS Event;
COMMIT;

BEGIN;
DROP TABLE IF EXISTS Lieu;
COMMIT;

BEGIN;
DROP TYPE TypeCateg;
COMMIT;

BEGIN;
DROP TABLE IF EXISTS Message;
COMMIT;

BEGIN;
DROP TABLE IF EXISTS CompteRendu;
COMMIT;

BEGIN;
DROP TABLE IF EXISTS Utilisateur CASCADE;
COMMIT;

BEGIN;
DROP TYPE IF EXISTS TypeLic;
DROP TYPE IF EXISTS TypeRole;
DROP TYPE IF EXISTS TypePasseport;
DROP TYPE IF EXISTS TypeSex;
COMMIT;

BEGIN;
DROP TABLE IF EXISTS Contacts;
COMMIT;