<?php
session_start();

//On vérfie que l'utilisateur est bien connecté, sinon on redirige vers la page de connexion
if(!isset($_SESSION['utilisateur'])){
  header('Location: Page_Connexion.php');
}
echo "Bienvenue sur votre espace personnel ".$_SESSION['utilisateur']." !"."<br><br>";
?>

<!DOCTYPE  html>
 <html lang="fr">
   <head>
     <meta charset="utf-8">
     <title>Accueil</title>
   </head>
   <body>
     <p><a href="Mon_Compte.php">Mon compte</a></p><br>
     <p><a href="Deconnexion.php"><button>Déconnexion</button></a></p>
   </body>
 </html>
