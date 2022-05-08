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
                <p class="cat">Choisissez une catégorie :</p>
                <ul class="imageCategories">
                    <li>
                        <span>Sites notations</span>
                        <a href="pageDécouvrir.php"><img src="./Images Sites/TripAdvisor.png" alt="sites notations" title="Sites de Notations"></a>
                    </li>
                    <li>
                        <span>Portables</span>
                        <a href=""><img src="./Images Sites/portable.jpg" alt="Portable" title="Portable"></a>
                    </li>
                    <li>
                        <span>Voitures</span>
                        <a href=""><img src="./Images Sites/voiture.jpg" alt="Voitures" title="Voitures"></a>
                    </li>
                    <li>
                        <span>Chaises</span>
                        <a href=""><img src="./Images Sites/chaise.jpg" alt="Chaises" title="Chaises"></a>
                    </li>
                    <li>
                        <span>Fast food</span>
                        <a href=""><img src="./Images Sites/fastfood.png" alt="Fast food" title="Fast food"></a>
                    </li>
                    <li>
                        <span>Jeux Vidéo</span>
                        <a href=""><img src="./Images Sites/jeuxVideos.jpg" alt="Jeux Vidéo" title="Jeux Vidéo"></a>
                    </li>
                    <li>
                        <span>Pays</span>
                        <a href=""><img src="./Images Sites/pays.jpg" alt="Pays" title="Pays"></a>
                    </li>
                    <li>
                        <span>Chanteurs</span>
                        <a href=""><img src="./Images Sites/chanteur.png" alt="Chanteurs" title="Chanteurs"></a>
                    </li>
                    <li>
                        <span>Fleurs</span>
                        <a href=""><img src="./Images Sites/fleur.jpg" alt="Fleurs" title="Fleurs"></a>
                    </li>
                    <li>
                        <span>Livres</span>
                        <a href=""><img src="./Images Sites/livre.jpg" alt="Livres" title="Livres"></a>
                    </li>
                </ul>
            </div>

            <footer class="footAccueil"> </footer>
        </div>
    </body>
</html>