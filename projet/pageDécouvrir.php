<?php
session_start();
?>

<!DOCTYPE  html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>RateMyThings</title>
        <link rel="stylesheet" href="styleCat.css">
        <link rel="stylesheet" href="common.css">
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
            <?php

                include("Recherche_Site.php");
                $connex = mysqli_connect('localhost','root','','espace_pour_membres');
                $affiche = "SELECT * FROM sites_avis";
                $res1 = mysqli_query($connex, $affiche);
                $ligne = mysqli_fetch_assoc($res1);
                //On affiche tous les sites + l'image
                echo "<p class='sousTitre'>Voir tous nos sites à noter :"."</p>"; 
                ?>
                    <ul class="imageCategories">
                        <?php
                    while($ligne){
                        ?>
                        <li>
                            <a href="Page_Site.php?id_s=<?= $ligne['id']; ?>"><img src="<?= $ligne['source']; ?> " alt="<?= $ligne['nom']; ?>" ></a>
                        </li>
                        <?php
                            $ligne = mysqli_fetch_assoc($res1);
                    }
                    ?>  
                    </ul>

            </div>
            <footer class="footAccueil"> </footer>
        </div>
    </body>
</html>