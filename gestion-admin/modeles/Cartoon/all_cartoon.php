<?php//modelefunction liste_fichiers() {    global $cxn;    $liste_fichiers=array();    $liste_fichier_enregistre = array();    $liste_fichier_non_enregistre = array();    if ($_SERVER['SERVER_NAME'] == 'localhost') {        $dir = "C:\wamp64\www\MegaTV-Backend\Media-Vod\Cartoon";    } else {        $dir = "/volume1/web/media/Cartoon";    }    $dh = opendir($dir);    $i = 0;    while (false !== ($filename = readdir($dh))) {         if ($filename != '.' && $filename != '..') {            $info = new SplFileInfo($dir . '/' . $filename);                                          try {                $sql = " SELECT id_fichier,titre_originale,nom_fichier,section_fichier,taille_fichier,id_TMD,id_serveur,genre,url  FROM  FichierVod  WHERE  nom_fichier='" . $filename . "'   ORDER BY id_fichier DESC ";                $select = $cxn->query($sql);                $nb = $select->rowCount();                if ($nb <= 0) {                    $liste_fichier_non_enregistre[$i]['nom_fichier'] = substr($info->getBasename($info->getExtension()), 0, -1);                    $liste_fichier_non_enregistre[$i]['nom_fichier_complet'] = $filename;                    $liste_fichier_non_enregistre[$i]['taille_fichier'] = FileSizeConvert(filesize($dir . '/' . $filename));                    $liste_fichier_non_enregistre[$i]['extention_fichier'] = $info->getExtension();                    $liste_fichier_non_enregistre[$i]['date_modification'] = date('d-m-Y', $info->getCTime());                    $liste_fichier_non_enregistre[$i]['RealPath'] = $info->getRealPath();                } else {                    $enregistrement = $select->fetch();                    $liste_fichier_enregistre[$i]['id_fichier'] = $enregistrement['id_fichier'];                                    $liste_fichier_enregistre[$i]['nom_fichier_complet'] = $filename;                    if ($enregistrement['taille_fichier'] != '') {                        $liste_fichier_enregistre[$i]['taille_fichier'] = $enregistrement['taille_fichier'];                    } else {                        $liste_fichier_enregistre[$i]['taille_fichier'] = FileSizeConvert(filesize($dir . '/' . $filename));                    }                    $liste_fichier_enregistre[$i]['titre_originale'] = $enregistrement['titre_originale'];                    $liste_fichier_enregistre[$i]['date_upload'] = $enregistrement['date_upload'];                    $liste_fichier_enregistre[$i]['id_TMD'] = $enregistrement['id_TMD'];                                    $liste_fichier_enregistre[$i]['section_fichier'] = getNomSection($enregistrement['section_fichier']);                    //  $liste_fichier_enregistre[$i]['extention_fichier'] = $info->getExtension();                    /*                     * ******************************************************** */                    $parseHeaders = parseHeaders('https://api.themoviedb.org/3/movie/' . $enregistrement['id_TMD'] . '?api_key=cf673ba3b2a3baceeeefa90d7460cd10&language=fr');                    $liste_fichier_enregistre[$i]['messageStatutCheckJson'] = getMessageStatut($parseHeaders);                    /*                     * ******************************************************* */                    $json_source = file_get_contents('https://api.themoviedb.org/3/movie/' . $enregistrement['id_TMD'] . '?api_key=cf673ba3b2a3baceeeefa90d7460cd10&language=fr');                    // Décode le JSON                    $json_data = json_decode($json_source);                    $liste_fichier_enregistre[$i]['poster_path'] = 'https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $json_data->poster_path;                    $genres = '';                    foreach ($json_data->genres as $key => $value) {                        $genres.= $value->name . ',';                        /*                         * *********** Check genre film dans la table *********************** */                        try {                            $sql = " SELECT *  FROM  ListeGenreMovieTmdb  WHERE  nom_genre='" . $value->name . "'  ";                            $select = $cxn->query($sql);                            $nb = $select->rowCount();                            if ($nb <= 0) {                                InsertGenreMovie($value->id, $value->name);                            }                        } catch (Exception $e2) {                            echo $e2->getMessage();                        }                        /*                         * ************************************************************* */                    }                    $genres = substr($genres, 0, -1);                    if ($enregistrement['genre'] == '') {                        InsertGenreFichierVod($enregistrement['id_fichier'], $genres);                    }                    /*                     * ******************************************************* */                                          updateLinkServeur($enregistrement['id_fichier'],$enregistrement['nom_fichier']);                }            } catch (Exception $e) {                echo $e->getMessage();            }            $i++;        }    }    $liste_fichiers['liste_fichier_enregistre']=$liste_fichier_enregistre;        $liste_fichiers['liste_fichier_non_enregistre']=$liste_fichier_non_enregistre;    return $liste_fichiers;}function updateLinkServeur($id_fichier,$nom_fichier) {    global $cxn;    $date_created = date("Y-m-d");    try {        $sql = " UPDATE  LinksServersFichierVod  SET   nom_fichier='".$nom_fichier."'   WHERE  id_fichier='".$id_fichier."' ";        $resultat = $cxn->prepare($sql);        $resultat->execute();    } catch (Exception $e) {        echo $e->getMessage();    }}function updateUrl($id_fichier, $filename) {    global $cxn;    $url = 'http://megatvmedia.ddns.net/Cartoon/' . $filename;    try {        $sql = " UPDATE  FichierVod  SET   url='" . $url . "' WHERE id_fichier='" . $id_fichier . "' ";        $resultat = $cxn->prepare($sql);        $resultat->execute();    } catch (Exception $e) {        echo $e->getMessage();    }}function InsertGenreMovie($id,$name ) {    global $cxn;    try {        $sql = " INSERT INTO  ListeGenreMovieTmdb (id_Tmdb,nom_genre) VALUES ('" . $id . "','" . $name . "') ";        $resultat = $cxn->prepare($sql);        $resultat->execute();    } catch (Exception $e) {        echo $e->getMessage();    }}function InsertGenreFichierVod($id_fichier, $genre) {    global $cxn;    try {        $sql = " UPDATE  FichierVod  SET  genre='" . $genre . "'    WHERE  id_fichier='" . $id_fichier . "'     ";        $resultat = $cxn->prepare($sql);        $resultat->execute();    } catch (Exception $e) {        echo $e->getMessage();    }}function getNomSection($id_section) {    global $cxn;    try {        $sql = " SELECT nom_section FROM  SectionVod   WHERE id_section=:param ";        $resultat = $cxn->prepare($sql);        $resultat->bindParam(':param', $id_section);        $resultat->execute();        $enregistrement = $resultat->fetch();        $string = $enregistrement['nom_section'];    } catch (Exception $e) {        echo $e->getMessage();    }    return $string;}function getListeGenreFilms() {    global $cxn;    $liste = array();    try {        $sql = " SELECT id_section,nom_section FROM  SectionVod  ";        $resultat = $cxn->prepare($sql);        $resultat->execute();        $i = 0;        while ($enregistrement = $resultat->fetch()) {            $liste[$i]['id_section'] = $enregistrement['id_section'];            $liste[$i]['nom_section'] = $enregistrement['nom_section'];            $i++;        }    } catch (Exception $e) {        echo $e->getMessage();    }    return $liste;}function listeServeursVod() {    global $cxn;    $liste = array();    try {        $sql = " SELECT  id_serveur,url_serveur,emplacement,nom_serveur  FROM  ListeServeursVod   ";        $resultat = $cxn->prepare($sql);        $resultat->execute();        $i = 0;        while ($enregistrement = $resultat->fetch()) {            $liste[$i]['id_serveur'] = $enregistrement['id_serveur'];            $liste[$i]['url_serveur'] = $enregistrement['url_serveur'];            $liste[$i]['emplacement_serveur'] = $enregistrement['emplacement'];            $liste[$i]['nom_serveur'] = $enregistrement['nom_serveur'];            $i++;        }    } catch (Exception $e) {        echo $e->getMessage();    }    return $liste;}?>