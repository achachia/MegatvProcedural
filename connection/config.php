﻿<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {

    $dns = 'mysql:host=localhost;dbname=megatv_ip';

    $user = 'root';

    $password = '';

    $host = 'http://localhost/MegaTV-Backend';
    
    $root_projet = 'C:\wamp64\www\MegaTV-Backend';
} else {


}

$url_espace_client=$host.'/espace_client';

define('chemin_vue', '/vues/');

define('chemin_modele', '/modele/');

define('chemin_controleur', '/controleurs/');

define('dir_media', 'http://megatv.fr/media');

define('dir_vues', '/vues/');

define('dir_modele', '/modele/');

define('dir_controleur', '/controleurs/');

define('root_web', getcwd());

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
