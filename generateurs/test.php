<?php
//require_once 'connection/config.php';
//ini_set('date.timezone', 'Europe/Paris');
//$date_connection = date("Y-m-d  H:i:s");
//$code_client='GVC65L';
//
//$sql = " UPDATE  AbonnementsTv  SET date_debut='" . $date_connection . "',date_fin=DATE_ADD('" . $date_connection . "',INTERVAL 1 YEAR),etat='1'   WHERE code_user='" . $code_client . "' ";
//echo $sql;


//include 'espace_client/modele/modele.php';
//$random=random('6');
//echo $random;

$flux = simplexml_load_file("http://xmltv.dtdns.net/alacarte/ddl?fichier=/xmltv_site/xmlPerso/achachia.xml");

//$flux=  file_get_contents("http://xmltv.dtdns.net/alacarte/ddl?fichier=/xmltv_site/xmlPerso/achachia.xml");

print_r($flux);

?>

