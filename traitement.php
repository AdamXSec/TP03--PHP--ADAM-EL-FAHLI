<?php
// Auteur : Adam EL FAHLI
// Objectif : traiter le formulaire saisie.html envoyé avec la méthode POST
// Date : 17/10/2026

require 'config.php';

// Question 1 : on préfère POST à GET pour un mot de passe, car avec GET les
// données apparaissent dans l'URL (barre d'adresse, historique). Avec POST,
// elles sont envoyées dans le corps de la requête.
// Question 2 : $_REQUEST contient les données de $_GET et de $_POST
// (et de $_COOKIE selon la configuration de PHP).

$erreur = '';

if (!isset($_POST['nom'], $_POST['note_info'], $_POST['note_math'])) {
    // Page ouverte directement, sans passer par le formulaire
    $erreur = 'Aucune donnée reçue. Veuillez remplir le formulaire.';
} else {
    $nom = trim($_POST['nom']);
    $note_info = trim($_POST['note_info']);
    $note_math = trim($_POST['note_math']);

    if (empty($nom) || $note_info === '' || $note_math === '') {
        $erreur = 'Tous les champs sont obligatoires.';
    } elseif (!is_numeric($note_info) || !is_numeric($note_math)) {
        $erreur = 'Les notes doivent être des nombres.';
    } elseif ($note_info < NOTE_MIN || $note_info > NOTE_MAX
           || $note_math < NOTE_MIN || $note_math > NOTE_MAX) {
        $erreur = 'Les notes doivent être comprises entre ' . NOTE_MIN . ' et ' . NOTE_MAX . '.';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Résultat</title>
</head>
<body>
<?php if ($erreur !== '') : ?>
  <p style="color: red;"><?= $erreur ?></p>
  <p><a href="saisie.html">Retour au formulaire</a></p>
<?php else : ?>
  <?php $moyenne = ($note_info + $note_math) / 2; ?>
  <h1>Récapitulatif</h1>
  <p>Nom : <?= htmlspecialchars($nom) ?></p>
  <p>Note info : <?= $note_info ?></p>
  <p>Note math : <?= $note_math ?></p>
  <p>Moyenne : <?= $moyenne ?> (<?= mention($moyenne) ?>)</p>
<?php endif; ?>
</body>
</html>