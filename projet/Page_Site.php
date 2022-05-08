<?php
session_start();
$connex = mysqli_connect('localhost','root','','robicm');

//Si l'url est bien correcte, on affiche le site correspondant à l'id transmit par get


if(isset($_GET['id_s']) && !empty($_GET['id_s'])){
  $id = $_GET['id_s'];
  $site = "SELECT * FROM sites_avis WHERE id = '$id'";
  $res1 = mysqli_query($connex, $site);

  //On affiche la description du site
  if(mysqli_num_rows($res1) > 0){
    $ligne = mysqli_fetch_assoc($res1);
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
                  <a href="./pageCategories.php"><img src="Images Sites/Logo.png" class="logo"></a>
              </header>
              <nav class="Onglet">
                <ul>
                <?php // si il est connecter
                    if($_SESSION) {             
                ?>
                    <li><a href="Afficher_Sites.php">Mes rates</a></li>
                <?php } ?>
                    <li><a href="./pageCategories.php">Catégories</a></li>
                    <li><a href="pageDécouvrir.php">Découvrir</a></li>
                    <?php // si il est pas connecter
                        if($_SESSION) {             
                        ?>
                        <li class="deroulant">
                            <a href="">
                                <?php echo $_SESSION['utilisateur']?> &ensp;
                            </a>
                            <ul class="sous">
                                <?php // si c'est un admin il va sur la page admin
                                if($_SESSION['utilisateur'] == "admin") {
                                    echo "<li>"."<a href="."Accueil_admin.php".">Profil</a></li>"; 
                                } else {
                                    echo "<li>"."<a href="."Mon_Compte.php".">Profil</a></li>"; 
                                }
                                ?>
                                <li>
                                    <a href="Deconnexion.php">D&eacute;connexion</a>
                                </li> 
                            </ul>
                        </li>
                        <?php } else { ?>
                                <li> 
                                    <a href="Page_Connexion.php" >Me Connecter</a> 
                                </li>
                        <?php
                    }
                    ?>
                </ul>
            </nav>
              <div class="corps"> 
                <p class="nom"><?php echo $ligne['nom'];?> : ce site a un total de <?php /*On affiche la note */echo $ligne['note'] ; ?> points !</p>
                <image src="<?= $ligne['source']; ?> " alt="<?= $ligne['nom']; ?>" class="imgSite">
                <p class="descr">Description : </p>
                <?php
                  //On affiche la description
                  echo $ligne['description']."<br><br>";

                  // Si l'utilisateur est connecté, il peut ajouter un avis
                  if(isset($_SESSION['utilisateur'])){
                    include("Inserer_Avis.php");
?>
                      <p class="descr">Voici d'autres avis laissés par des utilisateurs :</p>
                      <?php 
                  //Sinon on lui propose de se connecter
                  }else{
                    echo "<p class='erreur'>Pour ajouter un avis, il faut être "."<a href="."Page_Connexion.php".">connecté</a>"." !!"."</p><br>";
                  }
                    //On affiche tous les avis
                    $affiche = "SELECT * FROM avis WHERE id_site = '$id'";
                    $res1 = mysqli_query($connex, $affiche);
                    $ligne = mysqli_fetch_assoc($res1);
                    if(mysqli_num_rows($res1) > 0){
                      
                      while($ligne){
                        $idCommentaire = $ligne['id'];
                        $utilisateur = "SELECT name FROM utilisateurs WHERE id = '$idCommentaire'";
                        $res2 = mysqli_query($connex, $utilisateur);
                        $ligne2 = mysqli_fetch_assoc($res2);
                      ?>
                      <div class="avis">

                      <p><?php echo "<a class='blaze' href="."Page_Profil.php?id_u=".$ligne['id']." title="."profil".">".$ligne2['name']."</a>"." a donn&eacute la note de " ;
                        echo $ligne['note']."/10"."<br>";
                        echo$ligne['message'];
                        $ligne = mysqli_fetch_assoc($res1);?>
                        </p>
                      </div>
                      <?php
                      }
                    }
                    else{
                      echo "Il n'y a encore aucun avis sur ce site..."."<br><br>";
                    }
                  }
              
                  
                  echo "<a class='bouton'"." href="."pageCategories.php".">Revenir à l'accueil</a>";
                } 
     
            
              ?>
              </div>
              <footer class="footAccueil"> </footer>
        </div>
    </body>
</html>
