<div class="row">    <div class="col-lg-12">        <?php if (isset($_GET['message']) && $_GET['message'] == 'echec') { ?>            <div class="alert alert-warning alert-dismissible  show" role="alert">                <strong>Votre opération a été échoué.</strong>                <button type="button" class="close" data-dismiss="alert" aria-label="Close">                    <span aria-hidden="true">&times;</span>                </button>            </div>        <?php } ?>        <?php if (isset($_GET['message']) && $_GET['message'] == 'success') { ?>            <div class="alert alert-success alert-dismissible  show" role="alert">                <strong>Votre opération a été enregistré avec succées</strong>                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">                    <span aria-hidden="true">&times;</span>                </button>            </div>        <?php } ?>    </div></div><?php if (isset($liste_fichiers_non_enregistre) && sizeof($liste_fichiers_non_enregistre) > 0) { ?>    <div class="row">        <div class="col-lg-12">            <div class="panel panel-primary">                <div class="panel-heading">LISTES DES FILMS NON ENREGISTRE</div>                <div class="panel-body">                    <table  id="liste_films_non_enregistre" name="liste_films_non_enregistre" class="table table-striped table-hover">                        <thead>                            <tr>                                <th>NOM</th>                                <th>EXTENTION</th>                                <th>NOM FICHIER COMPLET</th>                                <th>TAILLE</th>                                                 <th class="sort-alpha">ACTION</th>                            </tr>                        </thead>                        <tbody>                            <?php                            if (isset($liste_fichiers_non_enregistre)) {                                $tr = '';                                $j = 0;                                foreach ($liste_fichiers_non_enregistre as $value5) {                                    $tr .= '<tr>';                                    $tr .= '<td>' . $value5 ['nom_fichier'] . '</td>';                                    $tr .= '<td>' . $value5 ['extention_fichier'] . '</td>';                                    $tr .= '<td>' . $value5 ['nom_fichier_complet'] . '</td>';                                    $tr .= '<td>' . $value5 ['taille_fichier'] . '</td>';                                    $tr .= '<td><button data-toggle="modal" data-target="#myModal_nom_enregistre_' . $j . '"  class="btn btn-primary btn-lg"  > Enregistrer </button></td>';                                    $tr .= '</tr>';                                    $j++;                                }                                echo $tr;                            }                            ?>                        </tbody>                        <tfoot>                            <tr>                                <th>                                    <input type="text" name="filter_browser" placeholder="Filter NOM" class="form-control input-sm datatable_input_col_search">                                </th>                                <th>                                    <input type="text" name="filter_browser" placeholder="Filter EXTENTION" class="form-control input-sm datatable_input_col_search">                                </th>                                <th>                                    <input type="text" name="filter_browser" placeholder="Filter TAILLE" class="form-control input-sm datatable_input_col_search">                                </th>                                <th>                                    <input type="text" name="filter_browser" placeholder="Filter NOM COMPLET" class="form-control input-sm datatable_input_col_search">                                </th>                                                                          </tr>                        </tfoot>                    </table>                </div>            </div>        </div>    </div><?php } ?><!----------------------   consultation fiche -----------------------------><?phpif (isset($liste_fichiers_non_enregistre) && sizeof($liste_fichiers_non_enregistre) > 0) {    $j = 0;    foreach ($liste_fichiers_non_enregistre as $value4) {        ?>        <div id="myModal_nom_enregistre_<?= $j; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">            <div class="modal-dialog">                <div class="modal-content">                    <form class="form-horizontal" enctype="multipart/form-data" id="form1_add_fichier_<?= $j; ?>" name="form1_add_fichier_<?= $j; ?>" method="POST" action="./controleurs/FilmsHindo/set_movie.php">                        <div class="modal-header">                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">Ã—</button>                            <h4 id="myModalLabel" class="modal-title">Edition fichier</h4>                        </div>                        <div class="modal-body">                            <div class="form-group"  style="padding-top:1%">                                <div class="col-sm-12">                                    <label class="control-label" for="emplacement_<?= $j; ?>" style="color:blue;font-size:16px">Emplacement fichier: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                </div>                                <div class="col-sm-12">                                    <input  style="background-color:#D8ECF7" type="text" class="form-control"  disabled    value="<?= $value4['RealPath']; ?>" >                                </div>                            </div>                            <div class="form-group"  style="padding-top:1%">                                <label class="control-label col-lg-3 col-md-3 col-sm-4" for="nom_<?= $j; ?>" style="color:blue;font-size:16px">Nom fichier: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                <div class="col-sm-8">                                    <input type="text" class="form-control" id="nv_nom_fichier"  name="nv_nom_fichier"  placeholder="Entrer nom de fichier" value="<?= $value4['nom_fichier_complet']; ?>" >                                </div>                            </div>                             <div class="form-group"  style="padding-top:1%">                                <label class="control-label col-lg-3 col-md-3 col-sm-4" for="titre_original_<?= $j; ?>" style="color:blue;font-size:16px">Titre original: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                <div class="col-sm-8">                                    <input type="text" class="form-control" id="titre_original"  name="titre_original"  placeholder="Entrer titre original" value="" >                                </div>                            </div>                            <div class="form-group"  style="padding-top:1%">                                <label class="control-label col-lg-3 col-md-3 col-sm-4" for="taille_fichier_<?= $j; ?>" style="color:blue;font-size:16px">Taille fichier: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                <div class="col-sm-8">                                    <input type="text" class="form-control" id="taille_fichier"  name="taille_fichier"   value="<?= $value4['taille_fichier']; ?>" >                                </div>                            </div>                            <div class="form-group"  style="padding-top:1%">                                <label class="control-label col-lg-3 col-md-3 col-sm-4" for="tannee_release_<?= $j; ?>" style="color:blue;font-size:16px">Annee release: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                <div class="col-sm-8">                                    <input type="text" class="form-control" id="annee_release"  name="annee_release"  placeholder="Entrer Année de realisation" value="" >                                </div>                            </div>                            <div class="form-group"  style="padding-top:1%">                                <label class="control-label col-lg-3 col-md-3 col-sm-4" for="tannee_release_<?= $j; ?>" style="color:blue;font-size:16px">Description: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                <div class="col-sm-8">                                    <textarea rows="4" cols="50" id="overview"  name="overview" ></textarea>                                 </div>                            </div>                            <div class="form-group"  style="padding-top:1%">                                <div class="col-sm-12">                                    <label class="control-label" for="serveur_<?= $j; ?>" style="color:blue;font-size:16px">SERVEUR: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                </div>                                <div class="col-sm-12">                                    <select class="form-control" name="serveur_film"  id="serveur_film" >                                        <?php                                        $tr = '<option value="">Select-serveur</option>';                                        foreach ($liste_serveurs_vod as $serveur) {                                            $tr.="<option value='" . $serveur['id_serveur'] . "' ";                                            $tr.= ">" . $serveur['nom_serveur'] . '-' . $serveur['emplacement_serveur'] . "</option>";                                        }                                        echo $tr;                                        ?>                                    </select>                                </div>                            </div>                            <div class="form-group"  style="padding-top:1%">                                <div class="col-sm-12">                                    <label class="control-label" for="qualite_video_<?= $j; ?>" style="color:blue;font-size:16px">QUALITE VIDEO: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                </div>                                <div class="col-sm-12">                                    <select class="form-control" name="qualite_video"  id="qualite_video" >                                        <?php                                        $tr = '<option value="">Select-qualite</option>';                                        foreach ($listeQualiteVod as $qualite) {                                            $tr.="<option value='" . $qualite['id_qualite'] . "' ";                                            $tr.= ">" . $qualite['nom_qualite'] . "</option>";                                        }                                        echo $tr;                                        ?>                                    </select>                                </div>                            </div>                            <input type="hidden" name="nom_fichier_complet"  value="<?= $value4['nom_fichier_complet']; ?>">                            <input type="hidden" name="section_film"  value="10">                        </div>                        <div class="modal-footer">                            <button type="button" data-dismiss="modal" class="btn btn-default">Fermer</button>                            <button type="submit" class="btn btn-danger"  name="button_delete"  value="delete_file">Supprimer le fichier</button>                            <button type="submit" class="btn btn-primary" name="button_register"  value="register_file">Enregistrer le fichier</button>                        </div>                    </form>                </div>            </div>        </div>        <?php        $j++;    }}?><!----------------------------------------------------------><?php if (isset($liste_fichiers_enregistre) && sizeof($liste_fichiers_enregistre) > 0) { ?>    <div class="row">        <div class="col-lg-12">            <div class="panel panel-primary">                <div class="panel-heading">LISTES DES FILMS  ENREGISTRE</div>                <div class="panel-body">                    <table  id="liste_films_enregistre" name="liste_films_enregistre" class="table table-striped table-hover">                        <thead>                            <tr>                                <th>ID</th>                                <th>JAQUETTE</th>                                               <th class="sort-alpha">NOM FICHIER</th>                                <th class="sort-numeric">TAILLE</th>                                 <th class="sort-alpha">ACTION</th>                            </tr>                        </thead>                        <tbody>                            <?php                            if (isset($liste_fichiers_enregistre)) {                                $tr = '';                                $j = 0;                                foreach ($liste_fichiers_enregistre as $value) {                                    $tr .= '<tr>';                                    $tr .= '<td style="padding-top:2%">' . $value ['id_fichier'] . '</td>';                                    $tr .= '<td><img src="' . $value['url_affiche'] . '" class="img-rounded"  width="100" height="100"></td>';                                    $tr .= '<td style="padding-top:2%">' . $value ['nom_fichier_complet'] . '</td>';                                    $tr .= '<td style="padding-top:2%">' . $value ['taille_fichier'] . '</td>';                                    $tr .= '<td style="padding-top:2%"><button  style="margin:5px"  data-toggle="modal" data-target="#myModal_deja_enregistre_' . $j . '"  class="btn btn-primary btn-lg"  > Editer </button>';                                    $tr .= '<button    data-toggle="modal" data-target="#myModal_add_link_serveur"  class="btn btn-primary btn-lg" value="add_link_serveur"   id="' . $value ['id_fichier'] . '"> ADD LINK SERVEUR </button>';                                    $tr .= '<button data-toggle="modal" data-target="#myModal_fiche_TMDB_' . $j . '"  class="btn btn-info btn-lg"  > La fiche de film </button></td>';                                    $tr .= '</tr>';                                    $j++;                                }                                echo $tr;                            }                            ?>                        </tbody>                        <tfoot>                            <tr>                                <th>                                    <input type="text" name="filter_browser" placeholder="Filter NOM" class="form-control input-sm datatable_input_col_search">                                </th>                                <th>                                    <input type="text" name="filter_engine_version" placeholder="Filter NOM" class="form-control input-sm datatable_input_col_search">                                </th>                                <th>                                    <input type="text" name="filter_engine_version" placeholder="Filter TAILLE" class="form-control input-sm datatable_input_col_search">                                </th>                                                       </tr>                        </tfoot>                    </table>                    <!----------------------   consultation fiche ----------------------------->                </div>            </div>        </div>    </div><?php } ?>*<!---------------------------------------------------------------------------------------------------><div id="myModal_add_link_serveur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">    <div class="modal-dialog">        <div class="modal-content">            <form class="form-horizontal" id="form_add_link" name="form_add_link" method="POST" action="./controleurs/FilmsHindo/add_link_servers.php">                <div class="modal-header">                    <h3 class="modal-title" id="exampleModalLabel" style="color:blue">AJOUTER UN SERVEUR </h3>                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-30px">                        <span aria-hidden="true">&times;</span>                    </button>                </div>                <div class="modal-body">                    <div class="form-group"  style="padding-top:1%">                        <div class="col-sm-12">                            <label class="control-label" for="identifiant" style="color:blue;font-size:16px">Identifiant streaming: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                        </div>                        <div class="col-sm-12">                            <input type="text" class="form-control" id="identifiant_streaming"  name="identifiant_streaming"  placeholder="Entrer identifiant streaming" value="" >                        </div>                    </div>                     <div class="form-group"  style="padding-top:1%">                        <div class="col-sm-12">                            <label class="control-label" for="serveur" style="color:blue;font-size:16px">SERVEUR: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                        </div>                        <div class="col-sm-12">                            <select class="form-control" name="serveur_film"  id="serveur_film" >                                <?php                                $tr = '<option value="">Select-serveur</option>';                                foreach ($liste_serveurs_vod as $serveur) {                                    $tr.="<option value='" . $serveur['id_serveur'] . "' ";                                    $tr.= ">" . $serveur['nom_serveur'] . '-' . $serveur['emplacement_serveur'] . "</option>";                                }                                echo $tr;                                ?>                            </select>                        </div>                    </div>                    <div class="form-group"  style="padding-top:1%">                        <div class="col-sm-12">                            <label class="control-label" for="qualite_video" style="color:blue;font-size:16px">QUALITE VIDEO: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                        </div>                        <div class="col-sm-12">                            <select class="form-control" name="qualite_video"  id="qualite_video" >                                <?php                                $tr = '<option value="">Select-qualite</option>';                                foreach ($listeQualiteVod as $qualite) {                                    $tr.="<option value='" . $qualite['id_qualite'] . "' ";                                    $tr.= ">" . $qualite['nom_qualite'] . "</option>";                                }                                echo $tr;                                ?>                            </select>                        </div>                    </div>                    <div class="form-group"  style="padding-top:1%">                        <div class="col-sm-12">                            <label class="control-label" for="url" style="color:blue;font-size:16px">URL: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                        </div>                        <div class="col-sm-12">                            <input type="text" class="form-control" id="url"  name="url"   value="" >                        </div>                    </div>                     <input type="hidden"  name="id_fichier" id="id_fichier" value="">                    <input type="hidden"  name="action_module"  value="all_films">                </div>                <div class="modal-footer">                    <button type="button" data-dismiss="modal" class="btn btn-default">Fermer</button>                                             <button type="submit" class="btn btn-primary" name="button_update"  value="update_file">Enregistrer le link</button>                </div>            </form>        </div>    </div></div><?phpif (isset($liste_fichiers_enregistre) && sizeof($liste_fichiers_enregistre) > 0) {    $j = 0;    $k = 0;    //var_dump($liste_fichiers_enregistre);    foreach ($liste_fichiers_enregistre as $value1) {        ?>        <div id="myModal_deja_enregistre_<?= $j; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">            <div class="modal-dialog">                <div class="modal-content">                    <form class="form-horizontal" enctype="multipart/form-data" id="form2_add_fichier_<?= $j; ?>" name="form2_add_fichier_<?= $j; ?>" method="POST" action="./controleurs/FilmsHindo/set_movie.php">                        <div class="modal-header">                            <h3 class="modal-title" id="exampleModalLabel" style="color:blue">Edition fichier</h3>                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-30px">                                <span aria-hidden="true">&times;</span>                            </button>                        </div>                        <div class="modal-body">                            <div class="form-group"  style="padding-top:1%">                                <label class="control-label col-lg-3 col-md-3 col-sm-4" for="nom_<?= $j; ?>" style="color:blue;font-size:16px">Nom fichier: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                <div class="col-sm-8">                                    <input type="text" class="form-control" id="nv_nom_fichier"  name="nv_nom_fichier"  placeholder="Entrer nom de fichier" value="<?= $value1['nom_fichier_complet']; ?>" >                                </div>                            </div>                            <div class="form-group"  style="padding-top:1%">                                <label class="control-label col-lg-3 col-md-3 col-sm-4" for="titre_original_<?= $j; ?>" style="color:blue;font-size:16px">Titre original: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                <div class="col-sm-8">                                    <input type="text" class="form-control" id="titre_original"  name="titre_original"  placeholder="Entrer titre original" value="<?= $value1['titre_originale']; ?>" >                                </div>                            </div>                                              <div class="form-group"  style="padding-top:1%">                                <label class="control-label col-lg-3 col-md-3 col-sm-4" for="taille_fichier_<?= $j; ?>" style="color:blue;font-size:16px">Taille fichier: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                <div class="col-sm-8">                                    <input type="text" class="form-control" id="taille_fichier"  name="taille_fichier"   value="<?= $value1['taille_fichier']; ?>" >                                </div>                            </div>                               <div class="form-group"  style="padding-top:1%">                                <label class="control-label col-lg-3 col-md-3 col-sm-4" for="tannee_release_<?= $j; ?>" style="color:blue;font-size:16px">Annee release: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                <div class="col-sm-8">                                    <input type="text" class="form-control" id="annee_release"  name="annee_release"  placeholder="Entrer Année de realisation" value="<?= $value1['annee_release']; ?>" >                                </div>                            </div>                            <div class="form-group"  style="padding-top:1%">                                <label class="control-label col-lg-3 col-md-3 col-sm-4" for="tannee_release_<?= $j; ?>" style="color:blue;font-size:16px">Description: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                <div class="col-sm-8">                                    <textarea rows="4" cols="50" id="overview"  name="overview" ><?= $value1['overview']; ?></textarea>                                 </div>                            </div>                            <div class="form-group"  style="padding-top:1%">                                <label class="control-label col-lg-3 col-md-3 col-sm-4" for="affiche_movie_<?= $j; ?>" style="color:blue;font-size:16px">AFFICHE DE DOC: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                <div class="col-sm-8">                                    <input type="file" name="affiche_movie" id="affiche_movie" />                                </div>                            </div>                            <div class="form-group">                                <label class="control-label col-lg-3 col-md-3 col-sm-4" for="activation_<?= $j; ?>" style="color:blue;font-size:16px">ACTIVATION: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                <div class="col-sm-8">                                    <select class="form-control" name="activ_movie"  id="activ_movie" >                                        <option value="">Select-activation</option>                                        <option value="1" selected>Actif</option>                                        <option value="0" >Inactif</option>                                    </select>                                </div>                            </div>                            <div class="form-group"  style="padding-top:1%">                                <div class="col-sm-12">                                    <label class="control-label" for="serveur_<?= $j; ?>" style="color:blue;font-size:16px">SERVEUR: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                </div>                                <div class="col-sm-12">                                    <select class="form-control" name="serveur_film"  id="serveur_film" >                                        <?php                                        $tr = '<option value="">Select-serveur</option>';                                        foreach ($liste_serveurs_vod as $value4) {                                            $tr.="<option value='" . $value4['id_serveur'] . "' ";                                            if ($value4['id_serveur'] == $value1['id_serveur']) {                                                $tr.=' selected="selected" ';                                            }                                            $tr.= ">" . $value4['nom_serveur'] . '-' . $value4['emplacement_serveur'] . "</option>";                                        }                                        echo $tr;                                        ?>                                    </select>                                </div>                            </div>                            <div class="form-group"  style="padding-top:1%">                                <div class="col-sm-12">                                    <label class="control-label" for="qualite_video_<?= $j; ?>" style="color:blue;font-size:16px">QUALITE VIDEO: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>                                </div>                                <div class="col-sm-12">                                    <select class="form-control" name="qualite_video"  id="qualite_video" >                                        <?php                                        $tr = '<option value="">Select-qualite</option>';                                        foreach ($listeQualiteVod as $qualite) {                                            $tr.="<option value='" . $qualite['id_qualite'] . "' ";                                            $tr.= ">" . $qualite['nom_qualite'] . "</option>";                                        }                                        echo $tr;                                        ?>                                    </select>                                </div>                            </div>                            <input type="hidden"  name="id_fichier"  value="<?= $value1['id_fichier']; ?>">                            <input type="hidden" name="titre_precedant"  value="<?= $value1['titre_originale']; ?>">                             <input type="hidden" name="nom_fichier_complet"  value="<?= $value1['nom_fichier_complet']; ?>">                            <input type="hidden" name="affiche_movie"  value="<?= $value1['affiche']; ?>">                            <input type="hidden" name="section_film"  value="10">                        </div>                        <div class="modal-footer">                            <button type="button" data-dismiss="modal" class="btn btn-default">Fermer</button>                            <button type="submit" class="btn btn-danger"  name="button_delete"  value="delete_file">Supprimer le fichier</button>                            <button type="submit" class="btn btn-primary" name="button_update"  value="update_file">Enregistrer le fichier</button>                        </div>                    </form>                </div>            </div>        </div>        <?php        $j++;    }    /*     * ************************************************************************************************** */    foreach ($liste_fichiers_enregistre as $fiche) {        ?>        <div id="myModal_fiche_TMDB_<?= $k; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">            <div class="modal-dialog">                <div class="modal-content">                                        <div class="modal-header">                        <h3 class="modal-title" id="exampleModalLabel" style="color:blue"><?= $fiche['titre_originale']; ?></h3>                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-30px">                            <span aria-hidden="true">&times;</span>                        </button>                    </div>                    <div class="modal-body">                        <div class="row"  style="margin-left:5px" >                            <img src="<?= $fiche['url_affiche']; ?>"  style="width:50%" >                        </div>                        <div class="row" style="margin-left:5px">                            <table class="table table-striped">                                <tbody>                                      <tr>                                        <th scope="col">NOM FICHIER COMPLET</th>                                        <th scope="row"><?= $fiche['nom_fichier_complet']; ?></th>                                    </tr>                                    <tr>                                        <th scope="col">EXTENTION</th>                                        <th scope="row"><?= $fiche['extention_fichier']; ?></th>                                    </tr>                                </tbody>                            </table>                        </div>                    </div>                    <div class="modal-footer">                        <button type="button" data-dismiss="modal" class="btn btn-default">Fermer</button>                                      </div>                </div>            </div>        </div>           <?php        $k++;    }}?> 