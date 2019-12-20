<?php
  require_once("../Model/Utilisateur.class.php");
  require_once("../Model/DAO.class.php");

  $dao = new DAO();

  var_dump($dao->getAllUsers());

 ?>
