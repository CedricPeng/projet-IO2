<?php
session_start();
?>

<!DOCTYPE  html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>RateMyThings</title>
    <link rel="stylesheet" href="styleSites.css">
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
                  
                  <li><a href="#">Paramètre</a></li>
                  <li><a href="Deconnexion.php">D&eacute;connexion</a></li> 
                </ul>
              </li>
            </ul>
          </nav>

          <div class="corps">
            <p class="mesRates"> Mes rates</p>
              <?php
                //Connexion à la base de données
                $connex = mysqli_connect('localhost','root','','robicm');

                $moi = $_SESSION['id'];
                //On cherche tous les avis
                $chercherAvis = "SELECT * FROM avis WHERE id = '$moi' && message != ''";
                $res1 = mysqli_query($connex, $chercherAvis);
                $ligne = mysqli_fetch_assoc($res1);

                //Si il y a des avis
                if(mysqli_num_rows($res1) > 0){
                  
              ?>  
                  <table>
                    <caption>Voici les avis que vous avez déjà laiss&eacute; :</caption>
                    <tr>
                      <th>Nom</th>
                      <th>Avis</th>
                      <th>Note</th>
                    </tr>
                  
                    <?php
                      while($ligne){ //On affiche tant que la requête n'est pas NULL
                        echo '<tr>';
                        $idSite = $ligne['id_site'];
                        $site = "SELECT * FROM sites_avis WHERE id = '$idSite'";
                        $res2 = mysqli_query($connex, $site);
                        $ligne2 = mysqli_fetch_assoc($res2);
                        echo '<td>'.$ligne2['nom'].'</td>';
                        if(strlen($ligne['message']) % 100 > 0 ){ // si le message est trop long on le coupe
                          $taille = strlen($ligne['message']);
                          $nmbRetour = $taille/100;
                          $s = substr($ligne['message'],0,100); 
                          echo '<td>';
                          for($i = 0; $i < $nmbRetour; $i++){
                            echo $s;
                            echo '<br>';
                            $s = substr($ligne['message'],100*($i+1),100*($i+2)); 
                          }
                          echo '</td>';
                        }else{ 
                          echo '<td>'.$ligne['message'].'</td>';
                        }
                        echo '<td>'.$ligne['note']."/10".'</td>';
                        //On passe à la ligne suivante
                        $ligne = mysqli_fetch_assoc($res1);
                        echo '</tr>';
                      }
                  echo '</table>';
                }
                
              
            
            //Si il n'y a pas d'avis
            else{
              echo "Vous n'avez pas encore donn&eacute; d'avis..."."<br><br>";
            }
            ?>

          </div>

          <footer class="footAccueil"> </footer>
        </div>


    <?php
      
      include("Recherche_Site.php");
      $connex = mysqli_connect('localhost','root','','espace_pour_membres');
      $affiche = "SELECT * FROM sites_avis";
      $res1 = mysqli_query($connex, $affiche);
      $ligne = mysqli_fetch_assoc($res1);

      //On affiche tous les sites + l'image
      while($ligne){
    ?>
        <a href="Page_Site.php?id_s=<?= $ligne['id']; ?>"><image src="<?= $ligne['source']; ?> " alt="<?= $ligne['nom']; ?>" style="width:200px;length:341px;"></a>
    <?php
        $ligne = mysqli_fetch_assoc($res1);
      }
    ?>

   
  </body>
</html>
