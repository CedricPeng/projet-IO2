<?php
session_start();
function inscription(){
  //Connexion à la base de données
  $connex = mysqli_connect('localhost','root','','robicm');

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
}

?>

<!DOCTYPE  html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="./styleInscription.css">
  </head>

  <body>
    <div class="parent">
      <div class="headIns">
        <p class="titre">Bienvenue sur la page d'inscription !</p>
      </div>
      <div class="milieu">
        <form method="POST" action="">
          <div class="droite">
            <p>Mot de passe : </p>
            <input type="password" placeholder="Mot de passe" name='motdepasse' value=""/>
            <p>Confirmation mot de passe</p>
            <input type="password" placeholder="Confirmer le mot de passe" name='confirme_mdp' value="" />
          </div>
          <p>Nom Utilisateur : </p>
          <input type="text" placeholder="Nom d'utilisateur" name='utilisateur' value=""/>
          <p>Adresse mail : </p>
          <input type="email" placeholder="Adresse mail" name='email' autocomplete="off" value=""/>
          <p>Confirmation adresse mail : </p>
          <input type="email" placeholder="Confirmer l'adresse mail" name='confirme_email' autocomplete="off" value=""/>
          
          <p class="messageErreur"><?php echo inscription()?></p>
          <input class="Connexion" type="submit" value="Inscription" name='Inscription'/>
          <p><a href="Page_Connexion.php">J'ai déjà un compte</a></p>  
        </form>
      </div>
      <footer class="foot"> </footer>
    </div>
  </body>

</html>
