<?php
// Auteur : Adam EL FAHLI
// Objectif : jours restants avant la fin du semestre et validation d'une date
// Date : 17/10/2026

require 'config.php';

$aujourdhui = new DateTime('today');
$fin_semestre = new DateTime('2027-01-31');
$interval = $aujourdhui->diff($fin_semestre);
echo '<h2>Fin du semestre</h2>';
echo 'Jours restants : ' . $interval->format('%a') . '<br>';


echo '<h2>Valider une date</h2>';
if (isset($_GET['jour'], $_GET['mois'], $_GET['annee'])) {
    $jour = (int) $_GET['jour'];
    $mois = (int) $_GET['mois'];
    $annee = (int) $_GET['annee'];

    
    if (checkdate($mois, $jour, $annee)) {
        echo 'Date valide : ' . sprintf('%02d/%02d/%04d', $jour, $mois, $annee);
    } else {
        echo 'Date invalide';
    }
}

echo '<form action="dates.php" method="get">
  <p>Jour : <input type="number" name="jour"></p>
  <p>Mois : <input type="number" name="mois"></p>
  <p>Année : <input type="number" name="annee"></p>
  <p><input type="submit" value="Valider"></p>
</form>';