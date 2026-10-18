<?php 
// Auteur : Adam EL FAHLI
// Objectif : exporter les resultats en JSON et comparer serialize() et json_encode()
// Date  : 17/10/2026

require 'config.php';

$chemin = __DIR__ . '/data/notes.csv';

if (!file_exists($chemin)) {
    echo 'Aucune note enregistrée.';
    exit;
}

//1. construire un tableau associatif
$resultats = [];
$fp = fopen($chemin, 'r');
while (($ligne = fgetcsv($fp, 1000, ';')) !== false) {
    if (count($ligne) < 3) {
        continue;   // ligne vide : on l'ignore
    }
    $resultats[] = [
        'nom' => $ligne[0],
        'info' => $ligne[1] + 0,
        'math' => $ligne[2] + 0,
        'moyenne' => ($ligne[1] + $ligne[2]) / 2
    ];
}
fclose($fp);

//2. // 2. Écrire le tableau dans data/notes.json
$json = json_encode($resultats);
file_put_contents(__DIR__ . '/data/notes.json', $json);
echo '<p>Fichier data/notes.json créé.</p>';

//3. Relire le fichier puis decoder le JSON 
$contenu = file_get_contents(__DIR__ . '/data/notes.json');
$tableau = json_decode($contenu, true);
echo '<h2>Après json_decode()</h2>';
echo '<pre>';
print_r($tableau);
echo '</pre>';

//4. comparer serialize() et json_encode() sur la meme tableau 
echo '<h2>serialize()</h2>';
echo '<pre>' . htmlspecialchars(serialize($resultats)) . '</pre>';
echo '<h2>json_encode()</h2>';
echo '<pre>' . htmlspecialchars($json) . '</pre>';

// Question : le format JSON est directement exploitable par une application
// JavaScript (avec JSON.parse), alors que le format de serialize() est propre à PHP.