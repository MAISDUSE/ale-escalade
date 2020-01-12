<?php

//Appel des fichiers classes
require_once("../Model/Actualite.class.php");
require_once("../Model/Adherent.class.php");
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
  $reponse = $this->db->query($req);
  $lancement = $reponse->fetchAll();
  $retour = array();
  foreach ($lancement as $v){
    array_push($retour, new Utilisateur($v[0], $v[1], $v[2], $v[3], $v[4], $v[5],
                      $v[6]),$v[7],$v[8],$v[9],$v[10],$v[11],$v[12],$v[13]);
    }
  return $retour;
}

function addUserFromInscription($idInscrit){
  $req =  "SELECT * FROM InscriptionEnAttente where ID = '$idInscrit'";

  $reponse = $this->db->query($req);
  $lancement = $reponse->fetchAll();
  $this->addContact($lancement[0][10],$lancement[0][11],$lancement[0][13],$lancement[0][12],
                    $lancement[0][14]);
  $retour = array();
  foreach($lancement as $v){
    $reqContact = "SELECT ID FROM Contact where Nom = '$v[10]' and Prenom = '$v[11]' limit 1";
    $reponseContact = $this->db->query($reqContact);
    $lancementContact = $reponseContact->fetchAll();
    $idContact = $lancementContact[0]["ID"];
    $this->addAdherent($v[1],$v[2],$v[3],$v[5],$v[6],$v[7],$v[8],'123456',$v[9],$idContact);

    $reqAdherent = "SELECT ID FROM Adherent where Nom = '$v[1]' and Prenom = '$v[2]'";
    $reponseAdherent = $this->db->query($reqAdherent);
    $lancementAdherent = $reponseAdherent->fetchAll();

    $idAdherent = $lancementAdherent[0]["ID"];
    $user1 = new Utilisateur($v[0], $idAdherent, $v[8], "FALSE", $v[2], $v[1],
                      '123456');

  }

  $req2 = "INSERT INTO Utilisateur(AdhID,adresseMail,Admin,Prenom,Nom,Mdp)
          VALUES(:AdhId,:adresseMail,:Admin,:Prenom,:Nom,:Mdp)";
  $reponse2 = $this->db->prepare($req2);
  $reponse2->execute(array(
    "AdhId" => $user1->getAdhID(),
    "adresseMail" => $user1->getAdresseMail(),
    "Admin" => $user1->isAdmin(),
    "Prenom" => $user1->getPrenom(),
    "Nom" => $user1->getNom(),
    "Mdp" => $user1->getMdp()
  ));

}
//Fonction Adherents
function getAllAdherents(){
  $req = "SELECT * FROM Adherent";
  $reponse = $this->db->query($req);
  $lancement = $reponse->fetchAll();
  $retour = array();
  foreach ($lancement as $v){
    array_push($retour, new Adherent($v[0], $v[1], $v[2], $v[3], $v[4], $v[5],
                        $v[6], $v[7], $v[8], $v[9], $v[10], $v[11], $v[12], $this->getContactByID($v[13])));
    }
  return $retour;
}

function getAdherentByCode($id){
  $req = "SELECT * FROM Adherent where id = '$id'";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll()[0];

  return new Adherent($lancement[0], $lancement[1], $lancement[2], $lancement[3], $lancement[4], $lancement[5], $lancement[6],
                      $lancement[7], $lancement[8], $lancement[9], $lancement[10], $lancement[11], $lancement[12], $this->getContactByID($lancement[13]));
}

function getNomPrenomAuteur($id){
  $req = $this->db->query("SELECT Nom,Prenom from Utilisateur where id='$id'");
  $identite = $req->fetchAll();
  return $identite[0];
}

function addAdherent($nom,$prenom,$genre,$dateNaissance,$adresse,$numTel,$adresseMail,$codeUtilisateur,$passeport,$contact){
  $req = "INSERT INTO Adherent(Nom,Prenom,Genre,DateNaissance,Adresse,NumTel,Mail,CodeUtilisateur,Passeport,Contact)
          VALUES (:Nom,:Prenom,:Genre,:DateNaissance,:Adresse,:NumTel,:Mail,:CodeUtilisateur,:Passeport,:Contact)";

  $reponse = $this->db->prepare($req);

  $reponse->execute(array(
    "Nom" => $nom,
    "Prenom" => $prenom,
    "Genre"  => $genre,
    "DateNaissance" => $dateNaissance,
    "Adresse" => $adresse,
    "NumTel" => $numTel,
    "Mail" => $adresseMail,
    "CodeUtilisateur" => $codeUtilisateur,
    "Passeport" => $passeport,
    "Contact" => $contact
  ));

}

  // Récupère toute les inscriptions en attentes
  function getAllInscriptions(){
    $req = "SELECT * FROM InscriptionEnAttente";
    $requete = $this->db->query($req);
    $lancement = $requete->fetchAll();
    $retour = array();
    foreach ($lancement as $v) {
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

function addContact($Nom,$Prenom,$Adresse,$NumTel,$Mail){

  $req = "INSERT INTO Contact(Nom,Prenom,Adresse,NumTel,Mail) VALUES(:Nom,:Prenom,:Adresse,:NumTel,:Mail)";
  $lancement = $this->db->prepare($req);

  $lancement->execute(array(
    "Nom" => $Nom,
    "Prenom" => $Prenom,
    "Adresse" => $Adresse,
    "NumTel" => $NumTel,
    "Mail"   => $Mail
  ));

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
  $lancement = $requete->fetchAll();
  $retour = array();

  foreach ($lancement as $v) {
    array_push($retour, new Actualite($v[0], $v[1], $v[2], $v[3],
    $v[4], $v[5], $v[6], $v[7], $v[8]));
  }

  return array($lancement);
}

//Actualite
function getAllActualite(){
  $req = "SELECT * FROM Actualite ORDER BY datePub";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll();

  $retour = array();
  foreach ($lancement as $v) {
    array_push($retour, new Actualite(intval($v[0]), $v[1], $v[3], $v[2],
    intval($v[6]), $v[4], $v[5]));
  }

  return $retour;
}

function getActualiteByID($id){
  $req = "SELECT * FROM Actualite WHERE id = '$id'";
  $requete = $this->db->query($req);
  $v = $requete->fetchAll()[0];
  return new Actualite(intval($v[0]), $v[1], $v[3], $v[2],
  intval($v[6]), $v[4], $v[5]);
}

function getNextNumActualite(){
  $req = $this->db->query("SELECT max(ID) FROM Actualite")->fetchAll()[0]['max(ID)'] + 1 ;
  return $req;

}
function addActualite( string $titre, string $img, string $dateCreation,string $description,
                         int $numCrea, string $fichiers){

    $req ="INSERT INTO Actualite(Titre,DatePub,Image,Description,Fichiers,NumCrea) VALUES(:titre,:datePub,:image,:description,:Fichiers,:numCrea)";
      $requete = $this->db->prepare($req);
      $requete->execute(array(
                        'titre'=> $titre,
                        'datePub' => $dateCreation,
                        'image' => $img,
                        'description' => $description,
                        'Fichiers' => $fichiers,
                        'numCrea' => $numCrea));

    }

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
  $requete = $this->db->query($req)->fetchAll();
  $evenements = array();
  foreach ($requete as $value) {
    $event = new Evenement($value['ID'],$value['Nom'], $value['Image'], $value['DatePub']
                          , $value['DateDebut'], $value['DateFin'], $value['Description']
                          , $value['Officiel'], $value['NumCrea'], $value['NomLieu'] );
    array_push($evenements, $event);
  }
  return $evenements;
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

    $req ="INSERT INTO Event(Nom,Image,DatePub,DateDebut,DateFin,Description,Officiel,NumCrea,NomLieu)
    VALUES(:nom,:image,:datePub,:dateDeb,:dateFin,:description,:officiel,:numCrea,:lieu)";
      $requete = $this->db->prepare($req);
      $requete->execute(array(
                        ':nom'=> $nom,
                        ':image' => $img,
                        ':datePub' => $dateCreation,
                        ':dateDeb' => $dateDebut,
                        ':dateFin' => $dateFin,
                        ':description' => $description,
                        ':officiel' => $officiel,
                        ':numCrea' => $numCrea,
                        ':lieu'=> $nomLieu));

}


function addInscription($nom, $prenom, $sexe, $assurance, $datedenaissance, $adresse, $adressemail, $passeport, $numtel
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

function getEventByID($ID){
  $req = $this->db->query("SELECT * FROM Event WHERE ID = '$ID'")->fetchAll()[0];
  return new Evenement($req['ID'],$req['Nom'],$req['Image'],
                    $req['DatePub'], $req['DateDebut'], $req['DateFin'],
                    $req['Description'], $req['Officiel'], $req['NumCrea'],
                    $req['NomLieu']);
}

function getNextNumEvent(){
  $req = $this->db->query("SELECT max(ID) FROM Event")->fetchAll()[0]['max(ID)'] + 1 ;
  return $req;

}


function addCommentaire($numAuteur, $IDSujet, $DateCreation, $Contenu){
  $request = $this->db->prepare('INSERT INTO Commentaire
                                VALUES (:numAuteur, :IDSujet, :DateCreation, :Contenu )');


  $request->execute(array(
    ":numAuteur" => intval($numAuteur),
    ":IDSujet" => intval($IDSujet),
    ":DateCreation" => $DateCreation,
    ":Contenu" => $Contenu
  ));
}
//Fonctions PratiqueEvent

//Autre

function deleteInscriptionById($idInscrit){
  $req = $this->db->prepare("DELETE FROM InscriptionEnAttente WHERE ID = :ID");

  $req->execute(array(
    ':ID' => $idInscrit
  ));

}

}
 ?>
