<?php
session_start();


//Si l'utilisateur n'est pas connecté
$connex = mysqli_connect('localhost','root','','robicm');
if(!isset($_SESSION['utilisateur'])){
  header('Location: Page_Connexion.php');
}

else{

  //On récupère l'id de l'utilisateur par GET
  $idUtilisateur = $_GET['id_u'];

  //On récupère le nom de l'utilisateur
  $utilisateur = "SELECT * FROM utilisateurs WHERE id = '$idUtilisateur'";
  $res1 = mysqli_query($connex, $utilisateur);
?>


<!DOCTYPE  html>
  <html lang="fr">
      <head>
          <meta charset="utf-8">
          <title>RateMyThings</title>
          <link rel="stylesheet" href="common.css">
          <link rel="stylesheet" href="site.css">
      </head>

      <body>
          <div class="parent">
              <header class="headAccueil">
                  <a href="./Afficher_Sites.php"><img src="Images Sites/Logo.png" class="logo"></a>
              </header>
              <nav class="Onglet">
                  <ul>
                  <li><a href="Afficher_Sites.php">Mes rates</a></li>
                  <li><a href="./pageCategories.php">Catégories</a></li>
                  <li><a href="pageDécouvrir.php">Découvrir</a></li>
                  <li class="deroulant"><a href=""><?php echo $_SESSION['utilisateur']?> &ensp;</a>
                      <ul class="sous">
                      <?php // si c'est un admin il va sur la page admin
                      if($_SESSION['utilisateur'] == "admin"){
                          echo "<li>"."<a href="."Accueil_admin.php".">Profil</a></li>"; 
                      }else{
                          echo "<li>"."<a href="."Mon_Compte.php".">Profil</a></li>"; 
                      }
                      ?>
                      
                      
                      <li><a href="Deconnexion.php">D&eacute;connexion</a></li> 
                      </ul>
                  </li>
                  </ul>
              </nav>
<?php
  if(mysqli_num_rows($res1) > 0){
    $ligne1 = mysqli_fetch_assoc($res1);
    echo "<p class='nom'>Voici les avis posté par : ".$ligne1['name']."</p>";
  }

?>
  <table>
    <tr>
      <th>Nom</th>
      <th>Avis</th>
      <th>Note</th>
    </tr>
<?php

  //On récupère les avis posté par cet utilisateur
  $avisUtilisateur = "SELECT * FROM avis WHERE id = '$idUtilisateur'";
  $res2 = mysqli_query($connex, $avisUtilisateur);

  //On affiche les avis + les sites correspondant
  if(mysqli_num_rows($res2) > 0){
    $ligne2 = mysqli_fetch_assoc($res2);
    while($ligne2){
      echo '<tr>';
      $idSite = $ligne2['id_site'];
      $site = "SELECT * FROM sites_avis WHERE id = '$idSite'";
      $res3 = mysqli_query($connex, $site);
      $ligne3 = mysqli_fetch_assoc($res3);
      echo '<td>'.$ligne3['nom'].'</td>';
      echo '<td>'.$ligne2['message'].'</td>';
      echo '<td>'.$ligne2 ['note']."/10".'</td>';
      $ligne2 = mysqli_fetch_assoc($res2);
      echo '</tr>';
    }
    echo '</table>';
  }
  else{
    echo "Cet utilisateur n'a posté aucun commentaire...";
  }
}
 ?>
