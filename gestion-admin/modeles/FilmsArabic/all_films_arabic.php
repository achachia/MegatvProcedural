<?php//modelefunction liste_fichiers() {    global $cxn, $url_espace_admin;    $liste_fichiers = array();    $liste_fichier_enregistre = array();    $liste_fichier_non_enregistre = array();    if ($_SERVER['SERVER_NAME'] == 'localhost') {        $dir = "C:\wamp64\www\MegaTV-Backend\Media-Vod\Films-Arabic";    } else {        $dir = "/volume1/web/media/Films-arabic";    }    $url_affiche = $url_espace_admin . '/images/JaquetteFilmsArabic';    $dh = opendir($dir);    $i = 0;    while (false !== ($filename = readdir($dh))) {        if ($filename != '.' && $filename != '..') {            $info = new SplFileInfo($dir . '/' . $filename);            try {                $sql = " SELECT id_movie,cover,taille_fichier,titre_originale,activation,annee_release,overview,nom_fichier   FROM  Movies_arabic_hindo   WHERE  nom_fichier='" . $filename . "'  ORDER BY id_movie DESC ";                $select = $cxn->query($sql);                $nb = $select->rowCount();                if ($nb <= 0) {                    //   var_dump($info->getCTime());                    $liste_fichier_non_enregistre[$i]['nom_fichier'] = substr($info->getBasename($info->getExtension()), 0, -1);                    $liste_fichier_non_enregistre[$i]['nom_fichier_complet'] = $filename;                    $liste_fichier_non_enregistre[$i]['taille_fichier'] = FileSizeConvert(filesize($dir . '/' . $filename));                    $liste_fichier_non_enregistre[$i]['extention_fichier'] = $info->getExtension();                    $liste_fichier_non_enregistre[$i]['RealPath'] = $info->getRealPath();                } else {                    $enregistrement = $select->fetch();                    $liste_fichier_enregistre[$i]['id_fichier'] = $enregistrement['id_movie'];                            $liste_fichier_enregistre[$i]['titre_originale'] = $enregistrement['titre_originale'];                    $liste_fichier_enregistre[$i]['nom_fichier_complet'] = $filename;                    if ($enregistrement['taille_fichier'] != '') {                        $liste_fichier_enregistre[$i]['taille_fichier'] = $enregistrement['taille_fichier'];                    } else {                        $liste_fichier_enregistre[$i]['taille_fichier'] = FileSizeConvert(filesize($dir . '/' . $filename));                    }                    $liste_fichier_enregistre[$i]['affiche'] = $enregistrement['cover'];                    $liste_fichier_enregistre[$i]['url_affiche'] = $url_affiche . '/' . $enregistrement['cover'];                    $liste_fichier_enregistre[$i]['overview'] = $enregistrement['overview'];                    $liste_fichier_enregistre[$i]['annee_release'] = $enregistrement['annee_release'];                    $liste_fichier_enregistre[$i]['activation'] = $enregistrement['activation'];                                                 /*                     * ******************************************************* */                                          updateLinkServeur($enregistrement['id_movie'],$enregistrement['nom_fichier']);                }            } catch (Exception $e) {                echo $e->getMessage();            }            $i++;        }    }    $liste_fichiers['liste_fichier_enregistre'] = $liste_fichier_enregistre;    $liste_fichiers['liste_fichier_non_enregistre'] = $liste_fichier_non_enregistre;    return $liste_fichiers;}function updateLinkServeur($id_fichier,$nom_fichier) {    global $cxn;    $date_created = date("Y-m-d");    try {        $sql = " UPDATE  LinksServersFichierVod  SET   nom_fichier='".$nom_fichier."'   WHERE  id_fichier='".$id_fichier."' ";        $resultat = $cxn->prepare($sql);        $resultat->execute();    } catch (Exception $e) {        echo $e->getMessage();    }}function updateUrl($id_fichier, $filename) {    global $cxn;    $url = 'http://megatvmedia.ddns.net/Films-arabic/' . $filename;    try {        $sql = " UPDATE  Movies_arabic_hindo  SET  url='" . $url . "'       WHERE  id_movie='" . $id_fichier . "' ";        $resultat = $cxn->prepare($sql);        $resultat->execute();    } catch (Exception $e) {        echo $e->getMessage();    }}function listeServeursVod() {    global $cxn;    $liste = array();    try {        $sql = " SELECT  id_serveur,url_serveur,emplacement,nom_serveur  FROM  ListeServeursVod   ";        $resultat = $cxn->prepare($sql);        $resultat->execute();        $i = 0;        while ($enregistrement = $resultat->fetch()) {            $liste[$i]['id_serveur'] = $enregistrement['id_serveur'];            $liste[$i]['url_serveur'] = $enregistrement['url_serveur'];            $liste[$i]['emplacement_serveur'] = $enregistrement['emplacement'];            $liste[$i]['nom_serveur'] = $enregistrement['nom_serveur'];            $i++;        }    } catch (Exception $e) {        echo $e->getMessage();    }    return $liste;}?>