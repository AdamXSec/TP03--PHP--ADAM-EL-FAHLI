<?php
// Auteur : Adam EL FAHLI
// Objectif : page protégée, accessible seulement si on est connecté
// Date : 17/10/2026

session_start();

// Si la variable de session n'existe pas, retour à la page de connexion
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Profil</title>
</head>
<body>
  <h1>Bienvenue <?= htmlspecialchars($_SESSION['login']) ?></h1>
  <p><a href="deconnexion.php">Se déconnecter</a></p>
</body>
</html>