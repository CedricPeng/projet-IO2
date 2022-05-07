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
    <link rel="stylesheet" href="styleAvis.css">
  </head>
  <body>
    <div class="parent">
      <div class="head">
        <a href="./Afficher_Sites.php"><img src="Images Sites/Logo.png" class="logo"></a>
      </div>
      <div class="milieu">
        <?php
          $connex = mysqli_connect('localhost','root','','espace_pour_membres');
          $affiche = "SELECT * FROM avis";
          $res1 = mysqli_query($connex, $affiche);
          $ligne = mysqli_fetch_assoc($res1);

          //On affiche tous les avis + un bouton supprimer avec l'id transmis dans l'url via $_GET
          while($ligne){ 
        ?>
            <p><?php echo $ligne['message'] ;?> </p>
            <p><?php echo $ligne['note'] ;?> /10</p>
            <a href="Supprimer_Avis.php?id_a=<?= $ligne['id_avis'];?>"><button class="Supprimer">Supprimer l'avis</button></a>
        <?php
            $ligne = mysqli_fetch_assoc($res1);
          }
        ?>
      </div>
      <div class="foot">
        <a href="Accueil_admin.php" class="Retour">Revenir sur mon compte</a>
      </div> 
    </div>
  </body>
</html>
