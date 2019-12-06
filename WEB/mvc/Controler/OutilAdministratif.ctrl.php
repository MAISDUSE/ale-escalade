<?php
if( isset($_FILES['fichier'])){
  $file_tmp_loc = $_FILES['fichier']['tmp_name'];
  $file_new_loc =  "../Ressources/Upload/Test";
  if(move_uploaded_file($file_tmp_loc,$file_new_loc)){
    echo "<img src=\"$file_new_loc\" alt=\"Une image\">";
  }else{
    echo "Upload raté";
  }


}



 ?>
