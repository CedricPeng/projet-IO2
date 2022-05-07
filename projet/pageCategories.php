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
                <p class="cat">Choisissez une catégorie :</p>
                <br>
                <table>
                    <tr class="titreCat">
                      <td>Sites notations</td>
                      <td>Portable</td>
                      <td>Voiture</td>
                      <td>Chaise</td>
                    </tr>
                    <tr>
                        <td><a href="pageDécouvrir.php"><image src="./Images Sites/TripAdvisor.png" alt="sites notations" title="Sites de Notations"></a></td>
                        <td><a href=""><image src="./Images Sites/portable.jpg" alt="portables" title="Portable"></a></td>
                        <td><a href=""><image src="./Images Sites/voiture.jpg" alt="voitures" title="Voiture"></a></td>
                        <td><a href=""><image src="./Images Sites/chaise.jpg" alt="chaises" title="Chaises"></a></td>
                    </tr>
                    <tr class="titreCat">
                      <td>Fast Food</td>
                      <td>Jeux Vidéo</td>
                      <td>Pays</td>
                      <td>Chanteurs</td>
                    </tr>
                    <tr>
                        <td><a href=""><image src="./Images Sites/fastfood.png" alt="fast food" title="Fast Food"></a></td>
                        <td><a href=""><image src="./Images Sites/jeuxVideos.jpg" alt="Jeux Vidéo" title="Jeux Vidéos"></a></td>
                        <td><a href=""><image src="./Images Sites/pays.jpg" alt="Pays" title="Pays"></a></td>
                        <td><a href=""><image src="./Images Sites/chanteur.png" alt="Chanteurs" title="Chanteurs"></a></td>
                    </tr>
                    <tr class="titreCat">
                      <td>Fleurs</td>
                      <td>Livres</td>
                    </tr>
                    <tr>
                        <td><a href=""><image src="./Images Sites/fleur.jpg" alt="Fleur" title="Fleurs" ></a></td>
                        <td><a href=""><image src="./Images Sites/livre.jpg" alt="Livres" title="Livres"></a></td>
                    </tr> 
                </table>
            </div>

            <footer class="footAccueil"> </footer>
        </div>
    </body>
</html>