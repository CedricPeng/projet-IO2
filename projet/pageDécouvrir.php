<?php
session_start();
?>

<!DOCTYPE  html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>RateMyThings</title>
        <link rel="stylesheet" href="styleCat.css">
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
            </div>
            <footer class="footAccueil"> </footer>
        </div>
    </body>
</html>