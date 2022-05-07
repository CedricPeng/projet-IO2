<?php
session_start();

//Si l'utilisateur n'est pas connecté
$connex = mysqli_connect('localhost','root','','robicm');
if(!isset($_SESSION['utilisateur'])){
  header('Location: Page_Connexion.php');
}

else{

  //On récupère l'id de l'utilisateur par GET
  $idUtilisateur = $_GET['id_u'];

  //On récupère le nom de l'utilisateur
  $utilisateur = "SELECT * FROM utilisateurs WHERE id = '$idUtilisateur'";
  $res1 = mysqli_query($connex, $utilisateur);
  if(mysqli_num_rows($res1) > 0){
    $ligne1 = mysqli_fetch_assoc($res1);
    echo "Voici les avis posté par : ".$ligne1['name']."<br><br>";
  }



  //On récupère les avis posté par cet utilisateur
  $avisUtilisateur = "SELECT * FROM avis WHERE id = '$idUtilisateur'";
  $res2 = mysqli_query($connex, $avisUtilisateur);

  //On affiche les avis + les sites correspondant
  if(mysqli_num_rows($res2) > 0){
    $ligne2 = mysqli_fetch_assoc($res2);
    while($ligne2){
      $idSite = $ligne2['id_site'];
      $site = "SELECT * FROM sites_avis WHERE id = '$idSite'";
      $res3 = mysqli_query($connex, $site);
      $ligne3 = mysqli_fetch_assoc($res3);
      echo $ligne3['nom']." : ".$ligne2['message']."<br><br>";
      $ligne2 = mysqli_fetch_assoc($res2);
    }
  }
  else{
    echo "Cet utilisateur n'a posté aucun commentaire...";
  }
}
 ?>
