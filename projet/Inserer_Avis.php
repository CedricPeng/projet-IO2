<?php

function insereAvis(){

//Connexion à la base de données
$connex = mysqli_connect('localhost','root','','robicm');


  //On vérifie la validité du formulaire
  if(isset($_POST['Valider'])){
    if(!empty($_POST['avis']) && !empty($_POST['choix_note'])){
      if(isset($_GET['id_s']) && !empty($_GET['id_s'])){
        //Si c'est valide, on déclare les variables
        $avis = htmlspecialchars($_POST['avis']);
        $note = $_POST['choix_note'];
        $idUtilisateur = $_SESSION['id'];
        $idSite = $_GET['id_s'];

        //On insère l'avis dans la base de données
        $insererAvis = "INSERT INTO avis (id, id_site, message, note) VALUES ('$idUtilisateur', '$idSite', '$avis', '$note')";
        $res1 = mysqli_query($connex, $insererAvis);

        //On ajoute la note au compteur de points du site
        $siteNote = "SELECT note FROM sites_avis WHERE id = '$idSite'";
        $res2 = mysqli_query($connex, $siteNote);
        $ligne = mysqli_fetch_assoc($res2);
        $pointsEnPlus = $ligne['note'] + $note;
        $ajouterPoints = "UPDATE sites_avis SET note = '$pointsEnPlus' WHERE id = '$idSite'";
        $res3 = mysqli_query($connex, $ajouterPoints);

        //On vérifie que la requête a été exécutée
        if($res1){
          echo '<div class="toaster toaster-ok">Avis ajouté avec succès !</div>';
        }
        else{
          echo '<div class="toaster toaster-nok">Oups, il semblerait qu\'il y ait une erreur...</div>';
        }
      }
    }

    //Si les champs ne sont pas remplis
    else{
      echo '<div class="toaster toaster-nok">Vous devez mettre une note et un avis...</div>';
    }
  }
}
?>

<!DOCTYPE  html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Ajouter un avis</title>
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="site.css">
  </head>
  <body>
    <form method="POST" action="">
      <label for='avis'>Ajoutez un commentaire !</label><br><br>
      <textarea name='avis' rows="5" cols="150" maxlength="256" placeholder="(256 caractères maximum)"></textarea><br><br>
      <label for='choix_note'>Mettez une note entre 0 et 10 :</label><br><br>
      <input class ="note" type="number" name='choix_note' min="0" max="10" placeholder="Note entre 0 et 10"/><br><br>
      <input class="bouton" type="submit" value="Ajouter mon avis !" name='Valider'/>
      <?php insereAvis()?>
    </form>

    


  </body>
</html>
