<?php

// connexion à la BDD

$mysqli = new Mysqli('localhost', 'root', '', 'sld');

if ($mysqli->connect_error) die('Un problème est sevenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);

$mysqli->set_charset("utf8");  // force les transactions avec la BDD en utf-8


// session :

session_start();

// chemin du site :

// define('RACINE_SITE', '/sld/');  
// on definit le chemin de la racine du site pour pouvoir établir des url de fichiers en chemin absolu que l'on soit dans le template admin ou front

// déclaration de variables d'affichage de contenus  :
$contenu = '';
$contenu_haut = '';
$contenu_bas = '';

$contenu_gauche = '';
$contenu_droite = '';