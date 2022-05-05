<?php
session_start();
if(!isset($_SESSION['utilisateur'])){
  header('Location: Page_Connexion.php');
}
?>
<!DOCTYPE  html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Avis</title>
  </head>
  <body>
    <?php
      $connex = mysqli_connect('localhost','root','','espace_pour_membres');
      $affiche = "SELECT * FROM avis";
      $res1 = mysqli_query($connex, $affiche);
      $ligne = mysqli_fetch_assoc($res1);

      //On affiche tous les avis + un bouton supprimer avec l'id transmis dans l'url via $_GET
      while($ligne){
        echo $ligne['message']." ".$ligne['note']." ";?><a href="Supprimer_Avis.php?id_a=<?= $ligne['id_avis'];?>"><button>Supprimer l'avis</button></a><br><br>
        <?php
        $ligne = mysqli_fetch_assoc($res1);
      }
     ?>
     <a href="Accueil_admin.php">Revenir sur mon compte</a>
  </body>
</html>
