﻿<?php// parametres de connectionif ($_SERVER['SERVER_NAME'] == 'localhost') {    $dns = 'mysql:host=localhost;dbname=megatv_ip';    $user = 'root';    $password = '';    $host = 'http://localhost/MegatvProcedural';    $root_projet = 'C:\wamp64\www\MegacoursProcedural';} else {    $dns = 'mysql:host=localhost:3307;dbname=megatv_ip';    $user = 'achachia';    $password = '7130chachia';    $host = 'http://' . $_SERVER['SERVER_NAME'];    $root_projet = '/volume1/web/Megacours/MegacoursProcedural';}$url_espace_client=$host.'/espace_client';// Constantes a definir .Chemins à utiliser pour accéder aux vues/controleur/fonctionsdefine('dir_media', 'http://megatv.ovh/media');define('root_web', getcwd());define('chemin_global', '/global/');define('chemin_vue', '/vues/');define('chemin_modele', '/modeles/');define('chemin_controleur', '/controleurs/');define('Directory_web', 'gestion-admin');define('Host', "http://megatv.ovh");define('Separator', DIRECTORY_SEPARATOR);$options = array(    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);try {    $cxn = new PDO($dns, $user, $password, $options);} catch (Exception $e) {    echo "Connection à Mysql imposible : " . $e->getMessage();    die();}?>