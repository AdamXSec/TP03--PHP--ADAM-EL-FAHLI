<?php
// Auteur : Adam EL FAHLI
// Objectif : lire le fichier CSV et afficher la liste des apprenants
// Date : 17/10/2026

require 'config.php';

$chemin = __DIR__ . '/data/notes.csv';

// 1. Test de l'existence du fichier
if (!file_exists($chemin)) {
    echo 'Aucune note enregistrée. <a href="saisie.html">Saisir une note</a>';
    exit;
}

// 2. Ouverture en lecture avec gestion de l'échec
if (!$fp = fopen($chemin, 'r')) {
    echo "Echec de l'ouverture du fichier";
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Liste des apprenants</title>
</head>
<body>
  <h1>Liste des apprenants</h1>
  <table border="1" cellpadding="5">
    <tr>
      <th>Nom</th><th>Info</th><th>Math</th><th>Moyenne</th><th>Mention</th>
    </tr>
<?php
$somme_moyennes = 0;
$nb = 0;

// 3. Lecture ligne par ligne avec fgetcsv()
while (($data = fgetcsv($fp, 1000, ';')) !== false) {
    if (count($data) < 3) {
        continue;   // ligne vide : on l'ignore
    }
    $nom = $data[0];
    $info = $data[1];
    $math = $data[2];
    $moyenne = ($info + $math) / 2;
    $somme_moyennes += $moyenne;
    $nb++;

    // 4. Une ligne du tableau HTML par apprenant
    echo '<tr>';
    echo '<td>' . htmlspecialchars($nom) . '</td>';
    echo '<td>' . $info . '</td>';
    echo '<td>' . $math . '</td>';
    echo '<td>' . $moyenne . '</td>';
    echo '<td>' . mention($moyenne) . '</td>';
    echo '</tr>';
}
fclose($fp);
?>
  </table>
<?php
// 5. Moyenne générale de la classe
if ($nb > 0) {
    echo '<p>Moyenne générale de la classe : ' . round($somme_moyennes / $nb, 2) . '</p>';
}
?>
</body>
</html>