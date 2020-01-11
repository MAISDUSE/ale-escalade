<?php

//Appel des fichiers classes
require_once("../Model/Actualite.class.php");
require_once("../Model/AssuranceAdh.class.php");
require_once("../Model/Certificat.class.php");
require_once("../Model/Commentaire.class.php");
require_once("../Model/CompteRendu.class.php");
require_once("../Model/Contact.class.php");
require_once("../Model/Cours.class.php");
require_once("../Model/Evenement.class.php");
require_once("../Model/InscriptionEnAttente.class.php");
require_once("../Model/Lieu.class.php");
require_once("../Model/Message.class.php");
require_once("../Model/Pratique.class.php");
require_once("../Model/PratiqueEvent.class.php");
require_once("../Model/Sujet.class.php");
require_once("../Model/Utilisateur.class.php");
require_once("../Framework/Retour.class.php");

//Début du DAO
class DAO{
  private $db;
  private $chemin = "../BD/data.db";

  function __construct(){
    try {
      $this->db = new PDO("sqlite:".$this->chemin);
      if (!$this->db) {
        die ("Database error: cannot open '".$this->db."'\n");
      }
    } catch (PDOException $e) {
      die("PDO Error :".$e->getMessage()." '".$this->db."'\n");
    }
  }
//Fonctions Utilisateur
function getAllUsers(){
  $req = "SELECT * FROM Utilisateur";

  return array($lancement);
}
function getUserByCode($id){
  $req = "SELECT * FROM Utilisateur where id = '$id'";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll();
  $retour = array();
  //utilisation de foreach car problème du au PDO::FETCH_CLASS
  foreach ($lancement as $v){
    //Utilisateur int $id, string $licence, string $typeLicence,
    //string $nom, string $prenom, string $genre, string $dateNaissance,
    //string $adresse, string $numTel, string $adresseMail,
    //string $role, string $codeUtilisateur, string $passeport, Contact $contact = null
    array_push($retour, new Utilisateur($v[1], $v[2], $v[3], $v[4], $v[5], $v[6],
                        $v[7], $v[8], $v[9], $v[10], $v[11], $v[12], getContactByID($v[13])));
  }
  return $retour;
}

  // Récupère toute les inscriptions en attentes
  function getAllInscriptions(){
    $req = "SELECT * FROM InscriptionEnAttente";
    $requete = $this->db->query($req);
    $lancement = $requete->fetchAll();
    $retour = array();
    foreach ($variable as $v) {
      array_push($retour, new InscriptionEnAttente($v[0], $v[1], $v[2], $v[3], $v[4],
                  $v[5], $v[6], $v[7], $v[8], $v[9], $v[10], $v[11], $v[12],
                  $v[13], $v[14]));
    }
    return $retour;
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

function verifUser($addrMail, $mdp){

  $req = "SELECT * FROM Utilisateur WHERE adresseMail = '$addrMail' ";
  $recup = $this->db->query($req)->fetchAll();
  $verifMdp = $recup[0]['Mdp'];
  if($recup == NULL){
    $messageErreur = "Le mot de passe ou l'adresse mail est incorrecte";
    $retour = new Retour(NULL,TRUE, $messageErreur);
  }else{
    if($verifMdp == $mdp){
      $retour = new Retour($recup[0]);
    }else{
      $messageErreur = "Le mot de passe ou l'adresse mail est incorrecte";
      $retour = new Retour(NULL,TRUE, $messageErreur);
    }
  }
  return $retour;

}

function getSujetByID($ID){
  $req = $this->db->query("SELECT * FROM Sujet WHERE ID = '$ID'")->fetchAll()[0];
  return new Sujet($req['ID'],$req['Titre'], $req['Contenu'], date("Y/m/d", strtotime($req['DatePub']))
                    , $req['IDAuteur'], $req['IDEvent']);
}


//Fonctions Contact

function getAllContact(){
  $req = "SELECT * FROM Contact";
  $requete = $this->db->query($req);
  //var_dump($requete);
  $lancement = $requete->fetchAll();
  //var_dump($lancement[0]);
  $retour = array();
  foreach ($lancement as $v) {
    array_push($retour,new Contact($v[0],$v[1],$v[2],$v[3],$v[4],$v[5]));
  }
  return $retour;
}

function getContactByID($id){
  $req = "SELECT * FROM Contact WHERE id = '$id'";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll()[0];
  //Verifier que la liste ne soit pas vide
  //var_dump($lancement);
  return new Contact($lancement[0], $lancement[1], $lancement[2], $lancement[3], $lancement[4], $lancement[5]);
}

//Fonctions CompteRendu
function getAllCompteRendus(){
  $req = "SELECT * FROM CompteRendu ORDER BY DatePub";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'CompteRendu');
  return array($lancement);
}
function searchCompteRenduByName($name){
  $req = "SELECT * FROM CompteRendu WHERE Titre LIKE '%$name%' ORDER BY DatePub";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'CompteRendu');
  return array($lancement);
}
function searchCompteRenduByAuthor(Utilisateur $authore){
  $req = "SELECT * FROM CompteRendu WHERE NumAuteur == '$author->id' ORDER BY DatePub";
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
  $lancement = $requete->fetchAll();
  return $lancement;
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
function getActualiteByID($id){
  $req = "SELECT * FROM Actualite WHERE id = '$id'";
  $requete = $this->db->query($req);
  $l = $requete->fetchAll();
  return new Actualite($l[0], $l[1], $l[2], $l[3], $l[4], $l[5], $l[6]);
}
/*
function getNomPrenomAuteur($id){
  $req = "SELECT nom, prenom FROM Utilisateur U, Actualite A WHERE A.id = '$id'
          and A.numAuteur = U.id";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll();
  return $lancement;
}*/

//Fonctions Commentaire

function getAllCommentairesFomSujet($idSujet){
  //$id est l'id d'un sujet
  $ID = intval($idSujet);
  $req = "SELECT * FROM Commentaire WHERE IDSujet = '$ID' ORDER BY DateCreation";
  $res = $this->db->query($req)->fetchAll();
  $commentaires = array();
  foreach($res as $value){
    $comm  = new Commentaire($value['NumAuteur'],$value['IDSujet'],date("d/m/y",strtotime($value['DateCreation'])),$value['Contenu']);
    array_push($commentaires, $comm);
  }
  return $commentaires;
}

//event
function getAllEvent(){
  $req = "SELECT * FROM Event ORDER BY DateDebut";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'Evenement');
  return array($lancement);
}
function getEventByDates($debut, $fin){
  $req = "SELECT * FROM Event WHERE '$debut' < DateDebut and '$fin' < DateFin";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'Evenement');
  return array($lancement);
}
function getEventOfficial(){
  $req = "SELECT * FROM Event WHERE Officiel = 'true'";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'Evenement');
  return array($lancement);
 }
  function addEvenement( string $nom, string $img, string $dateCreation,
                         string $dateDebut, string $dateFin, string $description,
                         int $numCrea,string $nomLieu, bool $officiel){

    $req ="INSERT INTO Event(Nom,Image,DatePub,DateDebut,DateFin,Description,Officiel,NumCrea,NomLieu) VALUES(:nom,:image,:datePub,:dateDeb,:dateFin,:description,:numCrea,:officiel,:lieu)";
      $requete = $this->db->prepare($req);
      $requete->execute(array(
                        'nom'=> $nom,
                        'image' => $img,
                        'datePub' => $dateCreation,
                        'dateDeb' => $dateDebut,
                        'dateFin' => $dateFin,
                        'description' => $description,
                        'numCrea' => $numCrea,
                        'officiel' => $officiel,
                        'lieu'=> $nomLieu));

    }


function addInscription($nom, $prenom, $sexe, $assurance, $datedenaissance, $adresse, $codepostal, $adressemail, $passeport, $numtel
                        , $NomContact, $PrenomContact, $NumTelContact, $AdresseContact, $MailContact){

 $req = $this->db->prepare("INSERT INTO InscriptionEnAttente(Nom, Prenom, Genre, TypeAssurance, DateNaissance,Adresse, NumTel, Mail,
                                 Passeport, NomContact, PrenomContact, NumTelContact,  AdresseContact, MailContact)
                                 VALUES(:nom, :prenom, :sexe, :assurance, :datedenaissance,:adresse,:numtel, :adressemail,:passeport
                                        ,:NomContact, :PrenomContact, :NumTelContact, :AdresseContact, :MailContact)");


  $req->execute(array(
    'nom'=> $nom,
    'prenom' => $prenom,
    'sexe' => $sexe,
    'assurance' => $assurance,
    'datedenaissance' => $datedenaissance,
    'adresse' => $adresse,
    'adressemail' => $adressemail,
    'passeport' => $passeport,
    'numtel' => $numtel,
    'NomContact'=> $NomContact,
    'PrenomContact' => $PrenomContact,
    'NumTelContact' => $NumTelContact,
    'AdresseContact' => $AdresseContact,
    'MailContact' => $MailContact
  ));


}

function addSujet($titre,$date,$contenu,$IDAuteur,$IDEvent){
  $request = $this->db->prepare('INSERT INTO Sujet(Titre, DatePub, Contenu, IDAuteur, IDEvent)
                                VALUES (:titre, :datepub, :contenu, :IDAuteur, :IDEvent )');

  //$request->bindParam('')

  $request->execute(array(
    ":titre" => $titre,
    ":datepub" => $date,
    ":contenu" => $contenu,
    ":IDAuteur" => intval($IDAuteur),
    ":IDEvent" => $IDEvent
  ));
}

function getUserByID($ID){
  $req = $this->db->query("SELECT * FROM Utilisateur WHERE ID = '$ID'")->fetchAll()[0];
  return new Utilisateur($req['ID'],$req['AdhID'],$req['adresseMail'],
                    $req['Admin'], $req['Prenom'], $req['Nom'], $req['Mdp']);
}

//Fonctions PratiqueEvent

//Autre

}
 ?>
