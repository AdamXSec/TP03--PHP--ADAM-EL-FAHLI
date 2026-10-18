<?php
// Auteur : Adam EL FAHLI
// Objectif : formulaire de connexion (création de la session)
// Date : 17/10/2026

session_start();   // toujours avant tout affichage

$erreur = '';

if (isset($_POST['login'])) {
    $login = trim($_POST['login']);
    if ($login !== '') {
        $_SESSION['login'] = $login;
        header("Location: profil.php");
        exit;
    }
    $erreur = 'Veuillez saisir un login.';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
</head>
<body>
  <h1>Connexion</h1>
  <?php if ($erreur !== '') : ?>
    <p style="color: red;"><?= $erreur ?></p>
  <?php endif; ?>
  <form action="login.php" method="post">
    <p>Login : <input type="text" name="login" /></p>
    <p><input type="submit" value="Se connecter"></p>
  </form>
</body>
</html>