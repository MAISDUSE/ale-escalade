<?php

header("Content-Type: text/csv");

header("Content-disposition: filename=adherents_CSV.csv");

require_once("../Model/DAO.class.php");

$bd = new DAO;

// ATTENTION : Il faut l'adapter au csv de la FFME
//    |
//    v

// Création de la ligne d'en-tête
$entete = array("Action", "Nom", "Prénom", "Date naissance", "Sexe", "Nationalité",
"Adresse", "Complément d'adresse", "Code postal", "Ville", "Pays", "Téléphone",
"Mobile", "Courriel", "Courriel 2", "Groupe", "Personne à prévenir - Nom",
"Personne à prévenir - Prénom", "Personne à prévenir - Adresse",
 "Personne à prévenir - Compl. d'adresse" , "Personne à prévenir - Code postal",
 "Personne à prévenir - Ville", "Personne à prévenir - Téléphone",
 "Personne à prévenir - Courriel", "N° licence", "Type licence", "Assurance",
 "Option ski", "Option slackline", "Option trail", "Option VTT",
 "Option assurance", "Attestation santé", "Certificat médical - Type",
 "Certificat médical - Médecin", "Date fin CM sport-santé", "CM Alpinisme",
 "CM Alpinisme médecin");

// Création du contenu du tableau
$lignes = array();
$lignes[] = array("Jean", "Martin", "20");
$lignes[] = array("Pierre", "Dupond", "30");

//    ^
//    |

$separateur = ";";

// Affichage de la ligne de titre, terminée par un retour chariot
echo implode($separateur, $entete)."\r\n";

// Affichage du contenu du tableau
foreach ($lignes as $ligne) {
	echo implode($separateur, $ligne)."\r\n";
}

?>
