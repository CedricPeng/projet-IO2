<?php


//Connexion à la base de données
$connex = mysqli_connect('pams.script.univ-paris-diderot.fr','robicm','i9T%iC2K','robicm');

//On vérfie que l'utilisateur est bien connecté, sinon on redirige vers la page de connexion
if(!isset($_SESSION['utilisateur'])){
  header('Location: Page_Connexion.php');
}

//L'utilisateur est connecté
else{

  //On vérifie la validité du formulaire
  if(isset($_POST['Valider'])){
    if(!empty($_POST['avis']) && !empty($_POST['choix_note'])){

      //Si c'est valide, on déclare les variables
      $avis = htmlspecialchars($_POST['avis']);
      $note = $_POST['choix_note'];
      $idUtilisateur = $_SESSION['id'];

      //On insère l'avis dans la base de données
      $insererAvis = "INSERT INTO avis (id, message, note) VALUES ('$idUtilisateur', '$avis', '$note')";
      $res1 = mysqli_query($connex, $insererAvis);

      //On vérifie que la requête a été exécutée
      if($res1){
        header("Location: Accueil_Personnel.php");
      }
      else{
        echo "Oups, il semblerait qu'il y ait une erreur...";
      }
    }

    //Si les champs ne sont pas remplis
    else{
      echo "Vous devez mettre une note et un avis...";
    }
  }
}
?>

<!DOCTYPE  html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Ajouter un avis</title>
  </head>
  <body>
    <form method="POST" action="">
      <label for='avis'>Ajoutez un commentaire !</label><br><br>
      <textarea name='avis' rows="5" cols="50" maxlength="256" placeholder="(256 caractères maximum)"><?php echo $_POST['avis'] ?></textarea><br><br>
      <label for='choix_note'>Mettez une note !</label><br><br>
      <input type="number" name='choix_note' min="0" max="10" placeholder="Note entre 1 et 10" value="<?php echo $_POST['choix_note']?>"/><br><br>
      <input type="submit" value="Ajouter mon avis !" name='Valider'/>
    </form>
  </body>
</html>
