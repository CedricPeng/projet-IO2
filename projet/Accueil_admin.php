<?php
session_start();
if(!isset($_SESSION['utilisateur']) || $_SESSION['utilisateur'] != "admin"){
  header('Location: Page_Connexion.php');
}
else{?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Espace Personnel Admin</title>
    <link rel="stylesheet" href="styleProfil.css">
  </head>
  <body>
    <div class="parent">
      <header class="head">
        <a href="./Afficher_Sites.php"><img src="Images Sites/Logo.png" class="logo"></a>
      </header>
      <div class="milieu">
        <p><a href="Membres.php">Afficher tous les membres</a></p>
        <p><a href="Avis.php">Afficher tous les avis</a></p>
        <p><a href="Mon_Compte.php">Voir mon profil</a></p>
        <p><a href="./Afficher_Sites.php">Aller à l'accueil</a></p>
        <br>
        <a href="Deconnexion.php"><button class="Retour">Déconnexion</button></a>
      </div>
    </div>
  </body>
</html>
<?php } ?>
