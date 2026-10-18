<?php
// Auteur : Adam EL FAHLI
// Objectif : traiter le formulaire info.html envoyé avec la méthode GET
// Date : 17/10/2026

if (!isset($_GET['nom'], $_GET['prenom'], $_GET['sexe'])) {
    echo 'Aucune donnée reçue. Veuillez remplir le <a href="info.html">formulaire</a>.';
    exit;
}

$nom = htmlspecialchars($_GET['nom']);
$prenom = htmlspecialchars($_GET['prenom']);
$sexe = $_GET['sexe'];

if ($sexe == 'M') :
    echo 'Bonjour Monsieur ' . $prenom . ' ' . $nom;
elseif ($sexe == 'F') :
    echo 'Bonjour Madame ' . $prenom . ' ' . $nom;
else :
    echo 'Bonjour ' . $prenom . ' ' . $nom;
endif;