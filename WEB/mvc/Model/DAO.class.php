<?php

//Appel des fichiers classes
require_once("../Model/Contact.class.php");
require_once("../Model/Utilisateur.class.php");
require_once("../Model/CompteRendu.class.php");
require_once("../Model/Message.class.php");
require_once("../Model/Lieu.class.php");
require_once("../Model/Evenement.class.php");
require_once("../Model/Sujet.class.php");
require_once("../Model/AssuranceAdh.class.php");
require_once("../Model/Certificat.class.php");
require_once("../Model/Pratique.class.php");
require_once("../Model/Cours.class.php");
require_once("../Model/Commentaire.class.php");
require_once("../Model/PratiqueEvent.class.php");

//Début du DAO
class DAO{
  private $db;

  private $database = "";
  function __construct(){
    try {
      $this->db = new PDO($this->database);
    } catch (PDOException $e) {
      die("Erreur de connexion : ".$e->getMessage());
    }

  }
}

//Fonctions Utilisateur
function getAllUsers(){
  $req = "SELECT * FROM Utilisateur";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'Utilisateur');
  return array($lancement);
}
function getUserByCode($id){
  $req = "SELECT * FROM Utilisateur where id = '$id'";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'Utilisateur');
  return array($lancement);
}

function addUsers(string $nom, string $prenom, string $genre, string $passeport,
 string $naissance, string $adresse, int $codePostal, string $mail, string $base, Contact $contact)
 {
    assert(isset($nom));
    assert(isset($prenom));
    assert(isset($genre));
    assert(isset($passeport));
    assert(isset($naissance));
    assert(isset($adresse));
    assert(isset($codePostal));
    assert(isset($mail));
    assert(isset($base));
    assert(isset($contact));

    $req = "INSERT INTO Utilisateur values($nom, $prenom, $genre, $passeport,
       $naissance, $adresse, $codePostal, $mail, $base,  $contact->getId())";
    $requete = exec($req);//exec est utiliser quand on recupère pas de résultat
}


//Fonctions Contact

//Fonctions CompteRendu
function getAllCompteRendus(){
  $req = "SELECT * FROM CompteRendu";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'CompteRendu');
  return array($lancement);
}

//Fonctions Message
function getAllMessageFromUser(int $idUtilisateur){
  $req = "SELECT * FROM Message WHERE NumExp='$idUtilisateur' ORDER BY DateEnv";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'Message');
  return array($lancement);
}

//Fonctions Lieu
function getAllLieux(){
  $req = "SELECT * FROM Lieu";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'Lieu');
  return array($lancement);
}

//Fonctions Sujet
function getAllSujets(){
  $req = "SELECT * FROM Sujet";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'Sujet');
  return array($lancement);
}
function searchSujetByPartielName($partieNom){
  $req = "SELECT * FROM Sujet WHERE titre LIKE '%$partieNom%'";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'Sujet');
  return array($lancement);
}
//A tester
function searchSujetByAuthor($autor){
  $req = "SELECT * FROM Sujet S, Utilisateur U
          WHERE (U.nom = '$autor' OR U.prenom = '$author') and S.idAuteur = U.ID
          ORDER BY date";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'Sujet');
  return array($lancement);
}

//Fonctions AssuranceAdh
function getAssuranceFromUser(int $idUtilisateur){
  $req = "SELECT * FROM AssuranceAdh WHERE NumAssurer='$idUtilisateur'";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'AssuranceAdh');
  return array($lancement);
}

//Fonctions Certificat


//Fonctions Pratique

//Fonction Cours
function getAllCours(){
  $req = "SELECT * FROM Cours";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'Cours');
  return array($lancement);
}
//Actualite
function getAllActualite(){
  $req = "SELECT * FROM Actualite ORDER BY date";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'Actualite');
  return array($lancement);
}

//Fonctions Commentaire

function getAllCommentairesFomSujet($idSujet){
  //$id est l'id d'un sujet
  $req = "SELECT * FROM Commentaire WHERE IDSujet = '$idSujet' ORDER BY Date";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'Commentaire');
  return array($lancement);
}

//Fonctions PratiqueEvent

//Autre


 ?>
