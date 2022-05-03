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
    <title>Membres</title>
  </head>
  <body>
    <?php
      $connex = mysqli_connect('localhost','root','','espace_pour_membres');
      $affiche = "SELECT * FROM utilisateurs";
      $res1 = mysqli_query($connex, $affiche);
      $ligne = mysqli_fetch_assoc($res1);

      //On affiche tous les membres + un bouton supprimer avec l'id transmis dans l'url via $_GET
      while($ligne){
        echo $ligne['name']." ".$ligne['email']." ";?><a href="Supprimer_Utilisateur.php?id=<?= $ligne['id'];?>"><button>Supprimer utilisateur</button></a><br><br>
        <?php
        $ligne = mysqli_fetch_assoc($res1);
      }
     ?>
     <a href="Accueil_admin.php">Revenir à l'accueil</a>
  </body>
</html>
