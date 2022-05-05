<?php
session_start();

//On vérfie que l'utilisateur est bien connecté, sinon on redirige vers la page de connexion
if(!isset($_SESSION['utilisateur'])){
  header('Location: Page_Connexion.php');
}
echo "Espace personnel de ".$_SESSION['utilisateur']." :"."<br><br>";
?>

<!DOCTYPE  html>
 <html lang="fr">
   <head>
     <meta charset="utf-8">
     <title>Espace Personnel</title>
   </head>
   <body>
     <p><a href="Mon_Compte.php">Mes informations personnelles</a></p>
     <p><a href="Afficher_Sites.php">Aller à l'accueil</a></p>
     <p><a href="Deconnexion.php"><button>Déconnexion</button></a></p>
   </body>
 </html>
