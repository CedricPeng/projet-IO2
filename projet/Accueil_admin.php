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
  </head>
  <body>
     <p><a href="Membres.php">Afficher tous les membres</a></p>
     <p><a href="Avis.php">Afficher tous les avis</a></p>
     <p><a href="Afficher_Sites.php">Aller à l'accueil</a></p>
     <p><a href="Deconnexion.php"><button>Déconnexion</button></a></p>
  </body>
</html>
<?php } ?>
