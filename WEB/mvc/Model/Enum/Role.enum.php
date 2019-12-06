<?php
require_once("../Model/Enum/BasicEnum.enum.php");

abstract class Role extends BasicEnum{
  const Bureau = 1;
  const Entraineur = 2;
  const Administrateur = 3;
  const Adherent = 4;
  const Mineur = 5;
  const Benevole = 6;
}

 ?>
