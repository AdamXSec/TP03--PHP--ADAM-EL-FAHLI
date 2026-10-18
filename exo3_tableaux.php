<?php
/*
 * Auteur : EL FAHLI Adam
 * Objectif : tableaux indexés et associatifs, statistiques et tri
 * Date : 17/10/2026
 */

require 'config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Partie 3 : tableaux</title>
</head>
<body>
<?php
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';
// ---------- 3.1 : création -----------

echo '<h2> 3.1 : création</h2>';
$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];
$modules = ["Programmation Web", "Algorithmes", "Programmation C"];

echo '<h3>Modules avec foreach</h3>';
foreach ($modules as $module) {
    echo $module . '<br>';
}
echo '<h3>Modules par indice</h3>';
echo $modules[0] . '<br>';
echo $modules[1] . '<br>';
echo $modules[2] . '<br>';

// ---------- 3.2 : affichage HTML ----------

echo '<h2> 3.2 : tableau des notes</h2>';
echo '<table border="1" cellpadding="5">';
echo '<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>';
foreach ($notes as $nom => $note) {
    if ($note < SEUIL) {
        echo '<tr style="color: red;">';   // note inférieure au seuil : en rouge
    } else {
        echo '<tr>';
    }
    echo '<td>' . $nom . '</td><td>' . $note . '</td><td>' . mention($note) . '</td>';
    echo '</tr>';
}
echo '</table>';

// ---------- 3.3 : statistiques ----------

echo '<h2> 3.3 : statistiques</h2>';

// 1. Calculs avec une boucle (sans array_sum)

$somme = 0;
$max = NOTE_MIN;
$min = NOTE_MAX;
foreach ($notes as $nom => $note) {
    $somme += $note;
    if ($note > $max) {
        $max = $note;
    }
    if ($note < $min) {
        $min = $note;
    }
}
$moyenne = $somme / count($notes);
echo 'Somme : ' . $somme . '<br>';
echo 'Moyenne : ' . round($moyenne, 2) . '<br>';
echo 'Meilleure note : ' . $max . '<br>';
echo 'Note la plus faible : ' . $min . '<br>';

// 2. Vérification avec les fonctions PHP

echo '<h3>Vérification</h3>';
echo 'array_sum : ' . array_sum($notes) . '<br>';
echo 'Moyenne (array_sum / count) : ' . round(array_sum($notes) / count($notes), 2) . '<br>';
echo 'max : ' . max($notes) . '<br>';
echo 'min : ' . min($notes) . '<br>';

// 3. Effectifs par mention

echo '<h3>Effectifs par mention</h3>';
$effectifs = [];
foreach ($notes as $nom => $note) {
    $m = mention($note);
    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 0;
    }
    $effectifs[$m]++;
}
foreach ($effectifs as $m => $nb) {
    echo $m . ' : ' . $nb . '<br>';
}

// ---------- 3.4 : tri ----------
echo '<h2> 3.4 : tri</h2>';

// Fonction qui factorise l'affichage d'un tableau Nom / Note

function afficher($tab)
{
    echo '<table border="1" cellpadding="5">';
    echo '<tr><th>Nom</th><th>Note</th></tr>';
    foreach ($tab as $nom => $note) {
        echo '<tr><td>' . $nom . '</td><td>' . $note . '</td></tr>';
    }
    echo '</table>';
}

// Les fonctions de tri modifient le tableau lui-même : on trie donc une copie

echo '<h3>Tableau trié par noms croissants (ksort)</h3>';
$tri = $notes;
ksort($tri);
afficher($tri);

echo '<h3>Tableau trié par notes décroissantes (arsort)</h3>';
$tri = $notes;
arsort($tri);
afficher($tri);

echo '<h3>Tableau trié par noms décroissants (krsort)</h3>';
$tri = $notes;
krsort($tri);
afficher($tri);

echo '<h3>Tableau trié par notes croissantes (asort)</h3>';
$tri = $notes;
asort($tri);
afficher($tri);

// Question : pour un tableau indexé comme $modules, on utilise sort() (ordre
// croissant) ou rsort() (ordre décroissant), car il n'y a pas de clés à conserver.

// ---------- 3.5 : opérateurs de tableaux ----------

echo '<h2> 3.5 : opérateurs de tableaux</h2>';
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];
echo '<pre>';
echo '$a + $b   : '; print_r($a + $b);    // prédiction : [x] => 1, [y] => 2
echo '$a == $b  : '; var_dump($a == $b);  // prédiction : true
echo '$a === $b : '; var_dump($a === $b); // prédiction : false
echo '</pre>';


// $a + $b est l'union : on garde les clés de $a et on ajoute celles de $b qui
// n'existent pas déjà (ici aucune, donc le résultat est identique à $a).
// $a == $b est true : les deux tableaux contiennent les mêmes paires clé/valeur.
// $a === $b est false : les paires sont les mêmes mais dans un ordre différent


// Expérience 1 : avec include, un fichier inexistant provoque un avertissement
// (Warning) mais le reste du script s'exécute. Avec require, c'est une erreur
// fatale (Fatal error) : l'exécution s'arrête immédiatement.
// Expérience 2 : include inclut le fichier à chaque appel (le menu apparaît
// deux fois), alors que include_once ne l'inclut qu'une seule fois.

include 'includes/pied_inc.php';
?>
</body>
</html>