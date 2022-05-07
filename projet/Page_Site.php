<?php
session_start();
$connex = mysqli_connect('localhost','root','','robicm');

//Si l'url est bien correcte, on affiche le site correspondant à l'id transmit par get


if(isset($_GET['id_s']) && !empty($_GET['id_s'])){
  $id = $_GET['id_s'];
  $site = "SELECT * FROM sites_avis WHERE id = '$id'";
  $res1 = mysqli_query($connex, $site);

  //On affiche la description du site
  if(mysqli_num_rows($res1) > 0){
    $ligne = mysqli_fetch_assoc($res1);
  ?>
    <image src="<?= $ligne['source']; ?> " alt="<?= $ligne['nom']; ?>" style="width:200px;length:341px;">
  <?php
    //On affiche la note et la description
    echo $ligne['nom']." a un total de ".$ligne['note']." points !"."<br><br>";
    echo $ligne['description']."<br><br>";

    // Si l'utilisateur est connecté, il peut ajouter un avis
    if(isset($_SESSION['utilisateur'])){
      include("Inserer_Avis.php");

      //On affiche tous les avis
      $affiche = "SELECT * FROM avis WHERE id_site = '$id'";
      $res1 = mysqli_query($connex, $affiche);
      $ligne = mysqli_fetch_assoc($res1);
      if(mysqli_num_rows($res1) > 0){
        echo "Voici d'autres avis laissés par des utilisateurs :"."<br><br>";
        while($ligne){
          $idCommentaire = $ligne['id'];
          $utilisateur = "SELECT name FROM utilisateurs WHERE id = '$idCommentaire'";
          $res2 = mysqli_query($connex, $utilisateur);
          $ligne2 = mysqli_fetch_assoc($res2);
          echo "<a href="."Page_Profil.php?id_u=".$ligne['id'].">".$ligne2['name']."</a>"." ".$ligne['message']." ".$ligne['note']."<br><br>";
          $ligne = mysqli_fetch_assoc($res1);
        }
      }
      else{
        echo "Il n'y a encore aucun avis sur ce site..."."<br><br>";
      }
    }

    //Sinon on lui propose de se connecter
    else{
      echo "Pour ajouter un avis, il faut être "."<a href="."Page_Connexion.php".">connecté</a>"." !!"."<br><br>";
    }
    echo "<a href="."Afficher_Sites.php".">Revenir à l'accueil</a>";
  }
  else{
    echo "Site introuvable...";
  }
}
else{
  echo "Introuvable...";
}
?>
