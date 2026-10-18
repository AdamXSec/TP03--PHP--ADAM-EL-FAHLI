<?php
// Auteur : Adam EL FAHLI
// Objectif : formulaire de connexion (création de la session)
// Date : 17/10/2026

session_start();   // toujours avant tout affichage

$erreur = '';
$dernier_login = '';
if (isset($_COOKIE['dernier_login'])) {
    $dernier_login = $_COOKIE['dernier_login'];
}


if (isset($_POST['login'])) {
    $login = trim($_POST['login']);
    if ($login !== '') {
        $_SESSION['login'] = $login;
        // Cookie valable 24 heures (86400 secondes) pour tout le site ("/")
        setcookie("dernier_login", $login, time() + 86400, "/");
        header("Location: profil.php");
        exit;
    }
    $erreur = 'Veuillez saisir un login.';
}
// Question 1 : une session est stockée côté serveur (le navigateur garde
// seulement un identifiant de session dans un cookie). Un cookie est stocké
// côté client, dans le navigateur.
// Question 2 : setcookie() et header() envoient des en-têtes HTTP, qui doivent
// partir avant le contenu de la page. Dès qu'un affichage a eu lieu (HTML, echo,
// même un espace), les en-têtes sont déjà envoyés et PHP signale une erreur.
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
    <p>Login : <input type="text" name="login" value="<?= htmlspecialchars($dernier_login) ?>" /></p>
    <p><input type="submit" value="Se connecter"></p>
  </form>
</body>
</html>