
  <?php
require_once("../../mvc/Model/Utilisateur.class.php");
require_once("../../mvc/Model/Contact.class.php");

  echo "test";
   $contactAl = new Contact("AAAA","AAAA","01 RUE AAAA","6600000000","AAAA@AAAA.com");
  echo "test";
  $util1 = new Utilisateur(1,"00001",J,"nom1","prenom1",H,"01/01/2000","01 Rue du gouffre, 38000 GRENOBLE","0600000001"
                                  ,"0400000001","mail1@gmail.com",Adherent,"1111",Blanc,$contactAll);

  $util2 = new Utilisateur(2,"00002",J,"nom2","prenom2",H,"02/01/2000","02 Rue du gouffre, 38000 GRENOBLE","0600000002"
                                  ,"0400000002","mail2@gmail.com",Adherent,"2222",Blanc,$contactAll);

   $util3 = new Utilisateur(3,"00003",J,"nom3","prenom3",H,"03/01/2000","03 Rue du gouffre, 38000 GRENOBLE","0600000003"
                                  ,"0400000000","mail1@gmail.com",Adherent,"3333",Blanc,$contactAll);



?>
