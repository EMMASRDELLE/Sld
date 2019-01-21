<?php

// connexion à la BDD

$mysqli = new Mysqli('localhost', 'root', '', 'sld2');

if ($mysqli->connect_error) die('Un problème est sevenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);

$mysqli->set_charset("utf8");  // force les transactions avec la BDD en utf-8


// session :

session_start();

// chemin du site :

// define('RACINE_SITE', '/sld/');  
// on definit le chemin de la racine du site pour pouvoir établir des url de fichiers en chemin absolu que l'on soit dans le template admin ou front

$msg =""; // cette variable contiendra les messages à echanger avec l'utilisateur. Nous la déclarons ici afin de pouvoir faire de la concaténation. (elle existe !)