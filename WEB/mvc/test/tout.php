
  <?php
require_once("../../mvc/Model/Utilisateur.class.php");
require_once("../../mvc/Model/Contact.class.php");

  echo "test";
   $contactAll = new Contact(1,"AAAA","AAAA","01 RUE AAAA","6600000000","AAAA@AAAA.com");
  echo "test";

  $test = Genre::1;
  echo "$test";
echo "$j";
  $util1 = new Utilisateur(1,"00001",TypeLicence::J,"nom1","prenom1",Genre::H,"01/01/2000","01 Rue du gouffre, 38000 GRENOBLE","0600000001"
                                  ,"0400000001","mail1@gmail.com",Role::Adherent,"1111",Passeport::Blanc,$contactAll);

  $util2 = new Utilisateur(2,"00002",TypeLicence::J,"nom2","prenom2",Genre::H,"02/01/2000","02 Rue du gouffre, 38000 GRENOBLE","0600000002"
                                  ,"0400000002","mail2@gmail.com",Role::Adherent,"2222",Passeport::Blanc,$contactAll);

   $util3 = new Utilisateur(3,"00003",TypeLicence::J,"nom3","prenom3",Genre::H,"03/01/2000","03 Rue du gouffre, 38000 GRENOBLE","0600000003"
                                  ,"0400000000","mail1@gmail.com",Role::Adherent,"3333",Passeport::Blanc,$contactAll);

                                  echo "ok";


?>
