<?php
session_start();

//On vérfie que l'utilisateur est bien connecté, sinon on redirige vers la page de connexion
if(!isset($_SESSION['utilisateur'])){
  header('Location: Page_Connexion.php');
}
echo "Bienvenue à l'accueil ".$_SESSION['utilisateur']." !"."<br><br>";
?>

<!DOCTYPE  html>
 <html lang="fr">
   <head>
     <meta charset="utf-8">
     <title>Accueil</title>
   </head>
   <body>
     <p><a href="Mon_Compte.php">Mon compte</a></p><br>
     <p><a href="Recherche.php">Rechercher un avis</a></p><br><br>
     <?php include("Inserer_Avis.php"); ?>
     <p><a href="Deconnexion.php"><button>Déconnexion</button></a></p>
   </body>
 </html>
