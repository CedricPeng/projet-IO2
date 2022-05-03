<?php
session_start();
$connex = mysqli_connect('localhost','root','','espace_pour_membres');
if(!isset($_SESSION['utilisateur'])){
  header('Location: Page_Connexion.php');
}
else{
  //Informations passées dans l'url donc on utilise $_GET
  if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];

    //On récupère l'utilisateur qui a cet id
    $recupUtilisateur = "SELECT * FROM utilisateurs WHERE id = '$id'";
    $res1 = mysqli_query($connex, $recupUtilisateur);

    //On récupère tous les avis de l'utilisateur en question
    $recupAvis = "SELECT * FROM avis WHERE id = '$id'";
    $res2 = mysqli_query($connex, $recupAvis);

    //Si il y a bien cet utilisateur
    if(mysqli_num_rows($res1) > 0){

      //Si il a des avis
      if(mysqli_num_rows($res2) > 0){
        $supprimerAvis = "DELETE FROM avis WHERE id = '$id'";
        $res3 = mysqli_query($connex, $supprimerAvis);
      }
      $supprimer = "DELETE FROM utilisateurs WHERE id = '$id'";
      $res4 = mysqli_query($connex, $supprimer);
      header('Location: Membres.php');
    }

    //Si l'utilisateur est inexistant
    else{
      echo "L'utilisateur n'a pas été trouvé...";
    }
  }

  //Si il n'y a rien dans l'url
  else{
    echo "Identifiant introuvable !";
  }
}




 ?>
