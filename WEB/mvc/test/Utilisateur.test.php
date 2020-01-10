<?php
  // model->mvc->Model
  require_once("../../Model/Utilisateur.class.php");
  require_once("../../Model/DAO.class.php");

  $dao = new DAO();
  //test addUsers

  var_dump($dao->getAllUsers());

 ?>
