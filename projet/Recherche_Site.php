<?php
   

    //Si on lance la recherche
    function recherche(){
       //Connexion à la base de données
    $connex = mysqli_connect('localhost','root','','robicm');
      if(isset($_GET['Rechercher'])){

        //Si on séléctionne le tri par ordre croissant
        if(isset($_GET['croissant']) && !isset($_GET['décroissant'])){

          //On prend tous les sites avec leur note par ordre croissant
          $croissant = "SELECT * FROM sites_avis ORDER BY note ASC";
          $res1 = mysqli_query($connex, $croissant);
          $ligne1 = mysqli_fetch_assoc($res1);

          //Si il y a des résultats on affiche les sites avec un lien vers leur page
          if(mysqli_num_rows($res1) > 0){
            echo '<ul class="resultatRecherche">';
            while($ligne1){
            ?>
              
            <li>
               <image src="<?= $ligne1['source']; ?> " alt="<?= $ligne1['nom']; ?>" class="resultatLogo">
               <?php echo "<a href="."Page_Site.php?id_s=".$ligne1['id'].">".$ligne1['nom']." </a>&nbsp;"."possède un score de ".$ligne1['note']." points !" ;?>
            </li>
               <?php
            $ligne1 = mysqli_fetch_assoc($res1);
          } 
          echo '</ul>';
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
          echo '<ul class="resultatRecherche">';
          while($ligne2){
            ?>
              
             <li>
               <image src="<?= $ligne2['source']; ?> " alt="<?= $ligne2['nom']; ?>" class="resultatLogo">
               <?php echo "<a href="."Page_Site.php?id_s=".$ligne2['id'].">".$ligne2['nom']."</a>&nbsp;"."possède un score de ".$ligne2['note']." points !" ;?></li>
               <?php
            $ligne2 = mysqli_fetch_assoc($res2);
          } 
          echo '</ul>';
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
        $afficheSites = 'SELECT id,nom,source FROM sites_avis WHERE nom LIKE "%'.$recherche.'%"';
        $res3 = mysqli_query($connex, $afficheSites);

        //Si il y a un résultat
        if(mysqli_num_rows($res3) > 0){
          $ligne3 = mysqli_fetch_assoc($res3);
          echo '<ul class="resultatRecherche">';
          while($ligne3){
            ?>
              
             <li>
               <image src="<?= $ligne3['source']; ?> " alt="<?= $ligne3['nom']; ?>" class="resultatLogo">
               <?php echo "<a href="."Page_Site.php?id_s=".$ligne3['id'].">".$ligne3['nom']."</a>" ;?>
            </li>
               <?php
            $ligne3 = mysqli_fetch_assoc($res3);
          } 
          echo '</ul>';
        }
        else{
          echo "<p class='erreur'>Il n'y a aucun résultat pour votre recherche.</p>";
        }

      }
    

        //Si on coche les deux cases et on cherche quelque chose en même temps
        else{
          echo "<p class='erreur'>Impossible de faire cette recherche...</p>";
        }
      }
    }
?>

<!DOCTYPE  html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Recherche</title>
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="site.css">
  </head>
  <body>
    <div class="recherche">
    <form method="GET" action="">
      <div class="recherche">
        <p>Rechercher par nom : </p>
        <input class="barreRecherche" type="search" name='recherche'/>
        <p>Trier par :</p>
        <div class="case">
        <label for="décroissant"><input class="checkbox" type="checkbox" name='décroissant' id='décroissant'/> Les plus favorables</label>
        <label for="croissant"><input class="checkbox" type="checkbox" name='croissant' id='croissant'/> Les moins favorables</label>
        </div>
        <input class="bouton" type="submit" value="Rechercher" name='Rechercher'/>    
      </div>
      <?php echo recherche() ; ?>
    </div>
    </form>
  </body>
</html>
