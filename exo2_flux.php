<?php
/*
 * Auteur : EL FAHLI Adam
 * Objectif : structures de contrôle et boucles
 * Date : 17/10/2026
 */

require 'config.php';

// -------------- 2.1 : if / elseif / else ----------
echo '<h2>Exercice 2.1 : mentions</h2>';
$notes_test = [17, 15, 13, 10, 8];
foreach ($notes_test as $n) {
    echo 'Note ' . $n . ' : ' . mention($n) . '<br>';
}

// -------------- 2.2 : switch ----------
echo '<h2>Exercice 2.2 : mois courant</h2>';
$numeroDeMois = date("m");
switch ($numeroDeMois) {
    case 1:  $moisFrancaisActuel = 'Janvier';
    break;
    case 2:  $moisFrancaisActuel = 'Février';
    break;
    case 3:  $moisFrancaisActuel = 'Mars';
    break;
    case 4:  $moisFrancaisActuel = 'Avril';
    break;
    case 5:  $moisFrancaisActuel = 'Mai';
    break;
    case 6:  $moisFrancaisActuel = 'Juin';
    break;
    case 7:  $moisFrancaisActuel = 'Juillet';
    break;
    case 8:  $moisFrancaisActuel = 'Août';
    break;
    case 9:  $moisFrancaisActuel = 'Septembre';
    break;
    case 10: $moisFrancaisActuel = 'Octobre';
    break;
    case 11: $moisFrancaisActuel = 'Novembre';
    break;
    case 12: $moisFrancaisActuel = 'Décembre';
    break;
    default: $moisFrancaisActuel = 'Mois invalide';
}
echo 'Nous sommes au mois de ' . $moisFrancaisActuel . '<br>';

// Question : si on oublie un break, PHP continue d'exécuter les instructions
// des case suivants jusqu'à la fin du switch ou jusqu'au prochain break.

// -------------- 2.3 : boucles ----------
echo '<h2>Exercice 2.3 : boucles</h2>';

// 1. Triangle avec deux boucles for imbriquées
echo '<h3>1. Triangle </h3>';
echo '<pre>';
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo '*';
    }
    echo PHP_EOL;
}
echo '</pre>';

// 2. while : de 0 à 20 par pas de 2, avec 10 en gras
echo '<h3>2. while</h3>';
$k = 0;
while ($k <= 20) {
    if ($k == 10) {
        echo '<strong>' . $k . '</strong>';
    } else {
        echo $k;
    }
    echo '<br>';
    $k = $k + 2;
}

// 3. for et continue : seulement les nombres pairs de 0 à 10
echo '<h3>3. for et continue</h3>';
for ($i = 0; $i <= 10; ++$i) {
    if ($i % 2)
        continue;   // on saute les nombres impairs
    echo $i . '<br>';
}

// 4. while, switch et break 2
echo '<h3>4. break 2</h3>';
$i = 0;
while (++$i) {
    switch ($i) {
        case 5:
            echo "At 5<br />\n";
            break 1;    // termine uniquement le switch
        case 10:
            echo "At 10; quitting<br />\n";
            break 2;    // termine le switch et la boucle while
        default:
            break;
    }
}

// 5. La question 2 réécrite avec do-while
echo '<h3>5. do-while</h3>';
$k = 0;
do {
    if ($k == 10) {
        echo '<strong>' . $k . '</strong>';
    } else {
        echo $k;
    }
    echo '<br>';
    $k = $k + 2;
} while ($k <= 20);
// Différence essentielle : while teste la condition AVANT d'exécuter le corps
// (il peut ne jamais s'exécuter), alors que la première itération du do-while
// est toujours exécutée, car la condition est testée APRÈS.