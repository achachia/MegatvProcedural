<?php//modelefunction liste_fichiers() {    global $cxn,$url_espace_admin;    $liste_fichiers=array();    $liste_fichier_enregistre = array();    $liste_fichier_non_enregistre = array();    if ($_SERVER['SERVER_NAME'] == 'localhost') {        $dir = "C:\wamp64\www\MegatvProcedural\Media-Vod\Films-Hindo";    } else {        $dir = "/volume1/web/media/Films-Hindo";    }    $url_affiche = $url_espace_admin . '/images/JaquetteFilmsHindo';    $dh = opendir($dir);    $i = 0;    while (false !== ($filename = readdir($dh))) {        if ($filename != '.' && $filename != '..') {            $info = new SplFileInfo($dir . '/' . $filename);            try {               $sql = " SELECT id_movie,cover,taille_fichier,titre_originale   FROM  Movies_arabic_hindo   WHERE  nom_fichier='" . $filename . "' ";                $select = $cxn->query($sql);                $nb = $select->rowCount();                if ($nb <= 0) {                    $liste_fichier_non_enregistre[$i]['nom_fichier'] = substr($info->getBasename($info->getExtension()), 0, -1);                    $liste_fichier_non_enregistre[$i]['nom_fichier_complet'] = $filename;                    $liste_fichier_non_enregistre[$i]['taille_fichier'] = FileSizeConvert(filesize($dir . '/' . $filename));                    $liste_fichier_non_enregistre[$i]['extention_fichier'] = $info->getExtension();                } else {                             $enregistrement = $select->fetch();                    $liste_fichier_enregistre[$i]['id_fichier'] = $enregistrement['id_movie'];                    //  $liste_fichier_enregistre[$i]['nom_fichier'] = substr($info->getBasename($info->getExtension()), 0, -1);                                        $liste_fichier_enregistre[$i]['titre_originale'] = $enregistrement['titre_originale'];                    $liste_fichier_enregistre[$i]['nom_fichier_complet'] = $filename;                    $liste_fichier_enregistre[$i]['taille_fichier'] = FileSizeConvert(filesize($dir . '/' . $filename));                              $liste_fichier_enregistre[$i]['affiche'] = $enregistrement['cover'];                    $liste_fichier_enregistre[$i]['url_affiche'] = $url_affiche . '/' . $enregistrement['cover'];                }            } catch (Exception $e) {                echo $e->getMessage();            }            $i++;        }    }    $liste_fichiers['liste_fichier_enregistre']=$liste_fichier_enregistre;        $liste_fichiers['liste_fichier_non_enregistre']=$liste_fichier_non_enregistre;    return $liste_fichiers;}?>