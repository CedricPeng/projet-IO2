<?php
session_start();
  if(!isset($_SESSION['utilisateur'])){
    header('Location: Page_Connexion.php');
  }
  else{
    //Connexion à la base de données
    $connex = mysqli_connect('pams.script.univ-paris-diderot.fr','robicm','i9T%iC2K','robicm');
    if(isset($_POST['Valider'])){

      //Si les deux sont cochés c'est contradictoire
      if(!empty($_POST['les_mieux_notes']) && !empty($_POST['les_moins_bien_notes'])){
        echo "Vous ne pouvez pas cocher des requêtes contradictoires !";
      }

      //Sinon on affiche les mieux notés
      else if(!empty($_POST['les_mieux_notes'])){
        $meilleurs = "SELECT * FROM avis WHERE note>=7";
        $res1 = mysqli_query($connex, $meilleurs);
        $ligne = mysqli_fetch_assoc($res1);
        while($ligne){
          echo $ligne['message']." ".$ligne['note'];
          $ligne = mysqli_fetch_assoc($res1);
        }
      }

      //Ou on affiche les pires
      else if(!empty($_POST['les_moins_bien_notes'])){
        $moins_bons = "SELECT * FROM avis WHERE note<7";
        $res2 = mysqli_query($connex, $moins_bons);
        $ligne2 = mysqli_fetch_assoc($res2);
        while($ligne2){
          echo $ligne2['message']." ".$ligne2['note'];
          $ligne2 = mysqli_fetch_assoc($res2);
        }
      }

      //Si rien n'est coché
      else{
        echo "Veuillez cocher au moins un critère !";
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
    <form method="POST" action="">
      <input type="checkbox" name='les_mieux_notes'/><label for="les_mieux_notes">Les mieux notés (supérieurs ou égal à 7)</label><br><br>
      <input type="checkbox" name='les_moins_bien_notes'/><label for="les_moins_bien_notes">Les moins bien notés (inférieurs à 7)</label><br><br>
      <input type="submit" value="Rechercher" name='Valider'/>
    </form>
    <p><a href=Accueil_Personnel.php>Revenir à l'accueil</a></p>
  </body>
</html>
