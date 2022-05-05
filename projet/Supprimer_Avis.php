<?php
session_start();
$connex = mysqli_connect('localhost','root','','robicm');
if(!isset($_SESSION['utilisateur'])){
  header('Location: Page_Connexion.php');
}
else{
  //Informations passées dans l'url donc on utilise $_GET
  if(isset($_GET['id_a']) && !empty($_GET['id_a'])){
    $id = $_GET['id_a'];

    //On récupère l'avis qui a cet id
    $recupAvis = "SELECT * FROM avis WHERE id_avis = '$id'";
    $res1 = mysqli_query($connex, $recupAvis);

    //Si il y a bien cet utilisateur
    if(mysqli_num_rows($res1) > 0){
      $supprimer = "DELETE FROM avis WHERE id_avis = '$id'";
      $res2 = mysqli_query($connex, $supprimer);
      header('Location: Avis.php');
    }

    //Si l'avis est inexistant
    else{
      echo "L'avis n'a pas été trouvé...";
    }
  }

  //Si il n'y a rien dans l'url
  else{
    echo "Identifiant introuvable !";
  }
}
