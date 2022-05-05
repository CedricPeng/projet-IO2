<?php

//Si l'utilisateur est bien connecté
  if(!isset($_SESSION['utilisateur'])){
    header('Location: Page_Connexion.php');
  }
  else{

    //Connexion à la base de données
    $connex = mysqli_connect('localhost','root','','robicm');

    //Si on lance la recherche
    if(isset($_GET['Rechercher'])){

      //Si on séléctionne le tri par ordre croissant
      if(isset($_GET['croissant']) && !isset($_GET['décroissant'])){

        //On prend tous les sites avec leur note par ordre croissant
        $croissant = "SELECT * FROM sites_avis ORDER BY note ASC";
        $res1 = mysqli_query($connex, $croissant);
        $ligne1 = mysqli_fetch_assoc($res1);

        //Si il y a des résultats on affiche les sites avec un lien vers leur page
        if(mysqli_num_rows($res1) > 0){
          while($ligne1){
            echo "<a href="."Page_Site.php?id_s=".$ligne1['id'].">".$ligne1['nom']."</a>"." possède un score de ".$ligne1['note']." points !"."<br><br>";
            $ligne1 = mysqli_fetch_assoc($res1);
          }
        }
        else{
          echo "Aucun résultat trouvé...";
        }
      }

    //Pareil que précédent mais dans l'ordre décroissant
    else if(!isset($_GET['croissant']) && isset($_GET['décroissant'])){
      $décroissant = "SELECT * FROM sites_avis ORDER BY note DESC";
      $res2 = mysqli_query($connex, $décroissant);
      $ligne2 = mysqli_fetch_assoc($res2);
      if(mysqli_num_rows($res2) > 0){
        while($ligne2){
          echo "<a href="."Page_Site.php?id_s=".$ligne2['id'].">".$ligne2['nom']."</a>"." possède un score de ".$ligne2['note']." points !"."<br><br>";
          $ligne2 = mysqli_fetch_assoc($res2);
        }
      }
      else{
        echo "Aucun résultat trouvé...";
      }
    }

    //Pour la barre de recherche
    //On vérifie que l'utilisateur a lancé sa recherche et qu'elle n'est pas vide
    else if(isset($_GET['recherche']) && !empty($_GET['recherche']) && empty($_GET['croissant']) && empty($_GET['décroissant'])){

      //On encode la recherche
      $recherche = htmlspecialchars($_GET['recherche']);

      //On sélectionne tous les sites où le nom contient des caracères recherchés par l'utilisateur et on les affiche
      $afficheSites = 'SELECT id,nom FROM sites_avis WHERE nom LIKE "%'.$recherche.'%"';
      $res3 = mysqli_query($connex, $afficheSites);

      //Si il y a un résultat
      if(mysqli_num_rows($res3) > 0){
        $ligne3 = mysqli_fetch_assoc($res3);
        while($ligne3){
          echo "<a href="."Page_Site.php?id_s=".$ligne3['id'].">".$ligne3['nom']."</a>"."<br><br>";
          $ligne3 = mysqli_fetch_assoc($res3);
        }
      }
      else{
        echo "Aucun résultat trouvé...";
      }

    }

    //Si on coche les deux cases et on cherche quelque chose en même temps
    else{
      echo "Impossible de faire cette recherche...";
    }
  }
}
?>

<!DOCTYPE  html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Recherche</title>
  </head>
  <body>
    <form method="GET" action="">
      <input type="search" name='recherche'/><br><br>
      <input type="checkbox" name='croissant'/><label for="croissant">Afficher des pires aux meilleurs</label><br><br>
      <input type="checkbox" name='décroissant'/><label for="décroissant">Afficher des meilleurs aux pires</label><br><br>
      <input type="submit" value="Rechercher" name='Rechercher'/>
    </form>
  </body>
</html>
