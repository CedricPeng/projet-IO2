<!DOCTYPE  html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
  </head>
<body>
  <form action="traitement.php" method="post">
    Prénom : <input type="text" name="prénom" size="16"><br><br>
    Nom : <input type="text" name="nom" size="16"><br><br>
    Pseudonyme : <input type="text" name="pseudo" size="16"><br><br>
    Adresse mail : <input type="text" name="mail" size="16"><br><br>
    Mot de passe : <input type="password" name="passwd" size="16"><br><br>
    Confirmer mot de passe : <input type="password" name="passwd" size="16"><br><br>
    Je n'ai pas lu les conditions d'utilisation : <input type="checkbox" name="conditions" size="16" value="conditions"><br><br>
    <button type="submit">S'inscrire</button>
    <button type="reset">Réinitialiser</button>
  </form>
</body>
</html>
