<?php 
// Auteur : Adam EL FAHLI
// Objectif : constantes de l'application 
// Date : 17/10/2026

const ETABLISSEMENT = "Faculté des Sciences Semlalia - Marrakech";
define("NOTE_MIN", 0);
define("NOTE_MAX", 20);
define("SEUIL",10);


// Retourne la mention correspondant à une note
function mention($note) {
    
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}