<?php
session_start();
 ?>
<!DOCTYPE  html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Sites</title>
  </head>
  <body>
    <a href="Accueil_Personnel.php"><image src="Images Sites/Icone.png" alt="Icone" style="width:100px;length:100px;"></a><br><br>
    <?php
      include("Recherche_Site.php");
      $connex = mysqli_connect('localhost','root','','espace_pour_membres');
      $affiche = "SELECT * FROM sites_avis";
      $res1 = mysqli_query($connex, $affiche);
      $ligne = mysqli_fetch_assoc($res1);

      //On affiche tous les sites + l'image
      while($ligne){
        ?><a href="Page_Site.php?id_s=<?= $ligne['id']; ?>"><image src="<?= $ligne['source']; ?> " alt="<?= $ligne['nom']; ?>" style="width:400px;length:341px;"></a>
        <?php
        $ligne = mysqli_fetch_assoc($res1);
      }
     ?>
  </body>
</html>
