<?php
//require_once("../Model/Article.class.php");
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");


if(isset($_POST['age'])){
  var_dump($_POST);
  //$date = date("Y-m-d", strtotime($_POST['age']));
  $db = new DAO;
  $db->addInscription($_POST['nom'], $_POST['prenom'], $_POST['sexe'], $_POST['base']
                      ,$_POST['age'], $_POST['adresse'], $_POST['mail'], $_POST['codepostal'], $_POST['passeport']
                      ,$_POST['tel'], $_POST['nomContact'], $_POST['prenomContact']
                      ,$_POST['telContact'], $_POST['adresseContact'], $_POST['mailContact']);

}else{
  $view = new View("Inscription");
  $view->afficher();
}
/*$else{
view = new View("Inscription");
$view->afficher();*/

?>
