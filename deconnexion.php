<?php
// Auteur : Adam EL FAHLI
// Objectif : se déconnecter (vider et détruire la session)
// Date : 17/10/2026

session_start();
session_unset();     // vide les variables de session
session_destroy();   // détruit la session
header("Location: login.php");
exit;