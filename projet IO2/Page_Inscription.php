<?php
session_start();

//Connexion à la base de données
$connex = mysqli_connect('pams.script.univ-paris-diderot.fr','robicm','i9T%iC2K','robicm');

//Vérification du formulaire
if(isset($_POST['Inscription'])){
  if(!empty($_POST['utilisateur']) && !empty($_POST['motdepasse']) && !empty($_POST['email']) && !empty($_POST['confirme_email']) && !empty($_POST['confirme_mdp'])){
    if($_POST['motdepasse'] == $_POST['confirme_mdp'] && $_POST['email'] == $_POST['confirme_email']){

      //Si tout est bon, on déclare les variables
      $utilisateur = htmlspecialchars($_POST['utilisateur']);
      $email = htmlspecialchars($_POST['email']);
      $mdp = md5($_POST['motdepasse']);

      //On vérifie que l'utilisateur n'existe pas avec l'email
      $emailExiste = "SELECT * FROM utilisateurs WHERE email='$email'";
      $res1 = mysqli_query($connex, $emailExiste);
      if(mysqli_num_rows($res1) > 0){
        echo "Oups ! Il semblerait que cette adresse mail soit déjà utilisée...";
      }

      //Si il n'existe pas, on ajoute l'utilisateur à la base
      else{
        $insererUtilisateur = "INSERT INTO utilisateurs (name,mdp,email) VALUES ('$utilisateur','$mdp','$email')";
        $res2 = mysqli_query($connex, $insererUtilisateur);

        //On récupère l'utilisateur et on commence sa session
        $recupUtilisateur = "SELECT * FROM utilisateurs WHERE email='$email' && name='$utilisateur' && mdp ='$mdp'";
        $res3 = mysqli_query($connex, $recupUtilisateur);
        if(mysqli_num_rows($res3) > 0){
          $correct = mysqli_fetch_assoc($res3);
          $_SESSION['email'] = $correct['email'];
          $_SESSION['utilisateur'] = $correct['name'];
          $_SESSION['mdp'] = $correct['mdp'];
          $_SESSION['id'] = $correct['id'];
          header('Location: Accueil_Personnel.php');
        }
      }
    }

    //Si la confirmation est erronée
    else{
      echo "L'adresse mail ou le mot de passe de confirmation doivent être similaires !!";
    }
  }

  //Si les champs sont incomplets
  else{
    echo "Veuillez remplir tous les champs pour poursuivre votre inscription !!";
  }
}
?>

<!DOCTYPE  html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
  </head>
  <body>
    <h1>Bienvenue sur la page d'inscription !</h1>
    <form method="POST" action="">
      <input type="text" placeholder="Nom d'utilisateur" name='utilisateur' value="<?php echo $_POST['utilisateur'];?>"/><br><br>
      <input type="email" placeholder="Adresse mail" name='email' autocomplete="off" value="<?php echo $_POST['email'];?>"/><br><br>
      <input type="email" placeholder="Confirmer l'adresse mail" name='confirme_email' autocomplete="off" value="<?php echo $_POST['confirme_email'];?>"/><br><br>
      <input type="password" placeholder="Mot de passe" name='motdepasse' value="<?php echo $_POST['motdepasse'];?>"/><br><br>
      <input type="password" placeholder="Confirmer le mot de passe" name='confirme_mdp' value="<?php echo $_POST['confirme_mdp'];?>" /><br><br>
      <input type="submit" value="Inscription" name='Inscription'/><br><br>
    </form>
    <p><a href="Page_Connexion.php">J'ai déjà un compte</a></p>
  </body>
</html>
