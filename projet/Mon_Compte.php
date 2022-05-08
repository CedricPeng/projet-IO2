<?php
session_start();

//Connexion à la base de données
$connex = mysqli_connect('localhost','root','','robicm');

//On vérfie que l'utilisateur est bien connecté, sinon on redirige vers la page de connexion
if(!isset($_SESSION['utilisateur'])){
  header('Location: Page_Connexion.php');
}

//L'utilisateur est connecté
else{
  
?>
<!DOCTYPE  html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>RateMyThings</title>
    <link rel="stylesheet" href="styleProfil.css">

  </head>

  <body>
    <div class="parent">
      <header class="head">
        <a href="./Afficher_Sites.php"><img src="Images Sites/Logo.png" class="logo"></a>
      </header>
      <div class="milieu">    
        <image src="Images Sites/Icone.png" alt="Icone" style="width:100px;length:100px;">
        <p>Vos informations personnelles :<p>
        <p>Adresse renseign&eacute;e : </p><?php echo $_SESSION['email'] ?>
        <p>Nom d'utilisateur :</p><?php echo $_SESSION['utilisateur'] ?>
        <br>
        <?php  
          if($_SESSION['utilisateur'] == "admin"){ // si c'est un admin il retourne à l'acccueil admin
            $lien = "Accueil_admin.php";
          }else{
            $lien = "Afficher_Sites.php";
          } 
          echo '<a href="'.$lien.'" class="Retour">Retour</a>';
        ?>
      </div>
 
    </div>

  </body>
</html>

<?php } ?>