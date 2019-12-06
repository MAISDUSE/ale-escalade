<?php

  require_once("../Model/Article.class.php");
  require_once("../Model/Certificat.class.php");
  require_once("../Model/Contact.class.php");
  require_once("../Model/Sortie.class.php");
  require_once("../Model/Sujet.class.php");
  require_once("../Model/Utilisateur.class.php");



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

// Utilisateur
function getAllUsers(){
  $req = "SELECT * FROM Utilisateur";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'Utilisateur');
  return array($lancement);
}

//Commentaires

function getCommentaires($id){
  //$id est l'id d'un sujet
  $req = "SELECT * FROM Commentaire WHERE IDSujet = $id";
  $requete = $this->db->query($req);
  $lancement = $requete->fetchAll(PDO::FETCH_CLASS, 'Commentaire');
  return array($lancement);
}






 ?>
