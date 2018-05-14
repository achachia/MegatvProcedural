﻿<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {

    $dns = 'mysql:host=localhost;dbname=megatv_vod';

    $user = 'root';

    $password = '';

    $host = 'http://localhost/MegatvProcedural';

    $root_projet = 'C:\wamp64\www\MegacoursProcedural';
} else {
 

}

// Constantes a definir .Chemins à utiliser pour accéder aux vues/controleur/fonctions

$url_espace_client=$host.'/espace_client';


define('root_web', getcwd());

define('chemin_global', '/global/');

define('chemin_vue', '/vues/');

define('chemin_modele', '/modeles/');

define('chemin_controleur', '/controleurs/');

/* * ******************************************** */

define('Directory_web', 'gestion-admin');

define('Host', "");

define('Separator', DIRECTORY_SEPARATOR);









/* * **************************************** */

$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

try {

    $cxn = new PDO($dns, $user, $password, $options);
} catch (Exception $e) {

    echo "Connection à Mysql imposible : " . $e->getMessage();

    die();
}

?>
