<?php
session_start();

function connexion(){
  //Connexion à la base de données
  $connex = mysqli_connect('pams.script.univ-paris-diderot.fr','robicm','i9T%iC2K','robicm');

  //Vérification du formulaire
  if(isset($_POST['Connexion'])){
    if(!empty($_POST['email']) && !empty($_POST['utilisateur']) && !empty($_POST['motdepasse'])){

      //Si tout est bon, on déclare les variables
      $utilisateur = htmlspecialchars($_POST['utilisateur']);
      $email = htmlspecialchars($_POST['email']);
      $mdp = md5($_POST['motdepasse']);

      //On cherche l'utilisateur grâce aux informations rentrées dans le formulaire
      $chercheProfil = "SELECT * FROM utilisateurs WHERE email='$email' && mdp='$mdp' && name='$utilisateur'";
      $res1 = mysqli_query($connex, $chercheProfil);

      //Si il existe, on commence une session
      if(mysqli_num_rows($res1) > 0){
        $correct = mysqli_fetch_assoc($res1);
        $_SESSION['email'] = $correct['email'];
        $_SESSION['utilisateur'] = $correct['name'];
        $_SESSION['mdp'] = $correct['mdp'];
        $_SESSION['id'] = $correct['id'];
        header('Location: Accueil_Personnel.php');
      }

      //Si il n'existe pas
      else{
        echo "Aïe... Il semblerait que ce compte n'existe pas...";
      }
    }

    //Si les champs ne sont pas remplis
    else {
        echo "Veuillez remplir tous les champs !";
    }
  }
}

?>

<!DOCTYPE  html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylePageConnexion.css">
    <title>Connexion</title>
  </head>
  <body>
    <div class="parent">
      <header class='logo'>
        <img src="Logo.png" class="logoc">
      </header>
      <div class="headConnec">
        <p class="titre">Rebonjour</p>
      </div>
      <div class="pageConnec">
        <form method="POST" action="">
          <p>E-mail :</p>
          <input type="email" placeholder="Adresse mail" name='email' autocomplete="off" value="" /><br><br>
          <p>Nom d'utilisateur :</p>
          <input type="text" placeholder="Nom d'utilisateur" name='utilisateur' value="" /><br><br>
          <p>Mot de passe :</p>
          <input type="password" placeholder="Mot de passe" name='motdepasse' value="" /><br><br>
          <p class="messageErreur"><?php echo connexion() ?></p>
          <input class="Connexion" type="submit" value="Connexion" name='Connexion' /><br><br>
        </form>
          <p><a href="Page_Inscription.php">Je n'ai pas de compte</a></p>
      </div>
      <footer class="foot"></footer>
    </div>
  </body>
</html>
