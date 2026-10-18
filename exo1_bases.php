<?php 
// Auteur : Adam EL FAHLI
// Objectif : variables, constantes, types et chaines
// Date : 17/10/2026
require 'config.php';
//Commentaire sur une ligne
#Commentaire sur une ligne style shell
/*Commentaire
 sur plusieurs lignes*/

 echo "Hello PHP <br>";
 //------------------1.1 NOms et variables-------------------
 $x = 1;              // valide : une lettre
 $_x = 2;             // valide : un underscore
 // $1x = 3;          // invalide : commence par un chiffre
 // $x-y              // invalide : le caractere - n'est pas autorisé
 $Prix_HT = 60;       // valide : lettre, majuscule et _ autorisés
 // $prix ht          // invalide : l'espace n'est pas autorisé
 $état = "ok";        // valide : les caracteres accentues sont acceptés

 // $a et $A sont deux variables distinctes (PHP est sensible a la casse )
 $a = 10;
 $A = 20;
 echo '$a = ' . $a . '<br>';
 echo '$A = ' . $A . '<br>';

 //-------------------1.2 Constantes-------------------
 echo ETABLISSEMENT .'<br>';
 echo NOTE_MIN .'<br>';
 echo NOTE_MAX .'<br>';
 echo SEUIL .'<br>';
 echo 'SEUIL define : ';
 var_dump(defined('SEUIL'));
 echo '<br> INCONNUE define : ';
 var_dump(defined('INCONNUE'));
 echo '<br>';

 // Question 1 : si on utilise une constante non definie, une ERROR est generée.
 // Question 2 : une constante definie avec const doit etre déclarée au plus haut
 // niveau du contexte (elle est definie a la compilation ), alors que define ()
 // s'execute á l'exécution et peut donc etre utilisée dans un if par exemple.
 
 //------------1.3 Calcul du prix TTC-------------------
 $prix_ht = 60 ;
 $tva = 20 ;
 $prix_ttc = $prix_ht * (1 +($tva / 100));
echo 'Le prix TTC du produit est de ' . $prix_ttc . ' €.<br>';

 //------------1.4 Types et conversions-------------------
 // 1 cast en string
$test = 42;
$test = (string) $test;
var_dump($test);
echo '<br>';

//2  conversions en booléen
echo '<pre>';
echo '(bool) 0     : '; var_dump((bool) 0);      // false
echo '(bool) 0.0   : '; var_dump((bool) 0.0);    // false
echo '(bool) "0"   : '; var_dump((bool) "0");    // false
echo '(bool) ""    : '; var_dump((bool) "");     // false
echo '(bool) "abc" : '; var_dump((bool) "abc");  // true
echo '(bool) []    : '; var_dump((bool) []);     // false (tableau vide)
echo '(bool) null  : '; var_dump((bool) null);   // false

// 3. Autres conversions
echo '(int) 3.9       : '; var_dump((int) 3.9);       // 3 : arrondi vers zéro
echo '(int) "12abc"   : '; var_dump((int) "12abc");   // 12 : lecture des chiffres du début
echo '(float) "1.5e3" : '; var_dump((float) "1.5e3"); // 1500
echo '(int) true      : '; var_dump((int) true);      // 1
echo '</pre>';

// 4. Le nombre 255 en quatre notations
$decimal = 255;
$hexa = 0xFF;
$octal = 0377;
$binaire = 0b11111111;
echo 'Décimal : ' . $decimal . '<br>';
echo 'Hexadécimal : ' . $hexa . '<br>';
echo 'Octal : ' . $octal . '<br>';
echo 'Binaire : ' . $binaire . '<br>';

//-----------1.5 Chaînes de caractères-------------------
$traitees = "égales à";
$ici = 2;

echo 'Ahmed a dit : "J\'ai réussi"<br>';
echo 'Voulez-vous supprimer C:\\*.*?<br>';
echo 'Ceci n\'affichera pas \n de nouvelle ligne<br>';
echo 'Les variables ne seront pas $traitees $ici<br>';
echo "Les variables seront $traitees $ici<br>";

// trim() : supprimer les * puis afficher chaque lettre sur une ligne
$ch = "*Bonjour les developpeurs*";
$ch = trim($ch, "*");
for ($i = 0; $i < strlen($ch); $i++) {
    echo "$ch[$i] <br>";
}
?>