<?php
  require_once("../Model/Contact.class.php");
  require_once("../Model/DAO.class.php");


  $dao = new DAO();

  //test getAllContact();
  //var_dump($dao->getAllContact());

  //test getContactByID();
  var_dump($dao->getContactByID(1));

 ?>
