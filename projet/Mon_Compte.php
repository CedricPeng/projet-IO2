<?php
session_start();

//Connexion à la base de données
$connex = mysqli_connect('pams.script.univ-paris-diderot.fr','robicm','i9T%iC2K','robicm');

//On vérfie que l'utilisateur est bien connecté, sinon on redirige vers la page de connexion
if(!isset($_SESSION['utilisateur'])){
  header('Location: Page_Connexion.php');
}

//L'utilisateur est connecté
else{
  echo "Vos informations personnelles :"."<br><br>";
  echo "Adresse renseign&eacute;e :"." ".$_SESSION['email']."<br><br>";
  echo "Nom d'utilisateur :"." ".$_SESSION['utilisateur']."<br><br>";
  $moi = $_SESSION['id'];

  //On cherche tous les avis
  $chercherAvis = "SELECT * FROM avis WHERE id = '$moi' && message != ''";
  $res1 = mysqli_query($connex, $chercherAvis);
  $ligne = mysqli_fetch_assoc($res1);

  //Si il y a des avis
  if(mysqli_num_rows($res1) > 0){
    echo "Voici les avis que vous avez déjà laiss&eacute; :"."<br><br>";
    while($ligne){

      //On affiche tant que la requête n'est pas NULL
      echo $_SESSION['utilisateur']." ".$ligne['message']." ".$ligne['note']."<br><br>";

      //On passe à la ligne suivante
      $ligne = mysqli_fetch_assoc($res1);
    }
  }

  //Si il n'y a pas d'avis
  else{
    echo "Vous n'avez pas encore donn&eacute; d'avis..."."<br><br>";
  }
  echo "<a href="."Accueil_Personnel.php".">Revenir &agrave; l'accueil</a>";
}
?>
