<div class="row">

    <div class="col-lg-12">

        <?php if (isset($_GET['message']) && $_GET['message'] == 'echec') { ?>

            <div class="alert alert-warning alert-dismissible  show" role="alert">
                <strong>Votre opération a été échoué.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php } ?>
        <?php if (isset($_GET['message']) && $_GET['message'] == 'success') { ?> 
            <div class="alert alert-success alert-dismissible  show" role="alert">
                <strong>Votre opération a été enregistré avec succées</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

    </div>
</div>
<div class="row" style="margin-bottom:2%;margin-left: 1%;margin-right: 1% ">					

    <div class="btn-group btn-group-justified" role="group">


        <div class="btn-group" role="group">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_add_film_ligne">

                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                Enregistrer un nouveau film en ligne

            </button>  

        </div>


    </div>				

</div>
<div id="myModal_add_film_ligne" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" id="form_add_film_serveur" name="form_add_film_serveur" method="POST"  enctype="multipart/form-data"  action="./controleurs/FilmsHindo/set_film_en_ligne.php">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel" style="color:blue">Enregistrer un nouveau film</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-30px">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group"  style="padding-top:1%">
                        <div class="col-sm-12">
                            <label class="control-label" for="titre_originale_<?= $j; ?>" style="color:blue;font-size:16px">Titre original: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                        </div>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="titre_original"  name="titre_original"  placeholder="Entrer titre original" value="" >

                        </div>
                    </div> 
                    <div class="form-group"  style="padding-top:1%">
                        <div class="col-sm-12">
                            <label class="control-label" for="tannee_release_<?= $j; ?>" style="color:blue;font-size:16px">Annee release: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                        </div>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="annee_release"  name="annee_release"  placeholder="Entrer Année de realisation" value="" >

                        </div>
                    </div>
                    <div class="form-group"  style="padding-top:1%">
                        <div class="col-sm-12">
                            <label class="control-label" for="overview_<?= $j; ?>" style="color:blue;font-size:16px">Description: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                        </div>

                        <div class="col-sm-12">
                            <textarea rows="4" cols="50" id="overview"  name="overview" ></textarea> 

                        </div>
                    </div>
                    <div class="form-group"  style="padding-top:1%">
                        <div class="col-sm-12">
                            <label class="control-label" for="affiche_movie_<?= $j; ?>" style="color:blue;font-size:16px">AFFICHE DE DOC: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                        </div>


                        <div class="col-sm-12">

                            <input type="file" name="affiche_movie" id="affiche_movie" />                                   


                        </div>
                    </div>                    

                    <div class="form-group"  style="padding-top:1%">
                        <div class="col-sm-12">
                            <label class="control-label" for="serveur_<?= $j; ?>" style="color:blue;font-size:16px">SERVEUR: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                        </div>

                        <div class="col-sm-12">
                            <select class="form-control" name="serveur_film"  id="serveur_film" >

                                <?php
                                $tr = '<option value="">Select-serveur</option>';

                                foreach ($liste_serveurs_vod as $serveur) {


                                    $tr.="<option value='" . $serveur['id_serveur'] . "' ";

                                    $tr.= ">" . $serveur['nom_serveur'] . '-' . $serveur['emplacement_serveur'] . "</option>";
                                }

                                echo $tr;
                                ?>

                            </select>

                        </div>
                    </div>
                    <div class="form-group"  style="padding-top:1%">
                        <div class="col-sm-12">
                            <label class="control-label" for="qualite_video_<?= $j; ?>" style="color:blue;font-size:16px">QUALITE VIDEO: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                        </div>

                        <div class="col-sm-12">
                            <select class="form-control" name="qualite_video"  id="qualite_video" >

                                <?php
                                $tr = '<option value="">Select-qualite</option>';

                                foreach ($listeQualiteVod as $qualite) {


                                    $tr.="<option value='" . $qualite['id_qualite'] . "' ";

                                    $tr.= ">" . $qualite['nom_qualite'] . "</option>";
                                }

                                echo $tr;
                                ?>

                            </select>

                        </div>
                    </div>
                    <div class="form-group"  style="padding-top:1%">
                        <div class="col-sm-12">
                            <label class="control-label" for="identifiant_<?= $j; ?>" style="color:blue;font-size:16px">Identifiant streaming: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                        </div>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="identifiant_streaming"  name="identifiant_streaming"  placeholder="Entrer identifiant streaming" value="" >

                        </div>
                    </div>              
                    <div class="form-group"  style="padding-top:1%">
                        <div class="col-sm-12">
                            <label class="control-label" for="url_<?= $j; ?>" style="color:blue;font-size:16px">URL: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                        </div>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="url"  name="url"   value="" >

                        </div>
                    </div> 
                    <div class="form-group"  style="padding-top:1%">
                        <div class="col-sm-12">
                            <label class="control-label" for="source_<?= $j; ?>" style="color:blue;font-size:16px">Source Vidéo: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                        </div>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="source_video"  name="source_video"  placeholder="Entrer source video" value="" >

                        </div>
                    </div> 


                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Fermer</button>                
                    <button type="submit" class="btn btn-primary" name="add_serveur"  value="add_serveur">Enregistrer la fiche </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!---------------------------------------------------------->
<?php if (isset($liste_films_en_ligne) && sizeof($liste_films_en_ligne) > 0) { ?>
    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-primary">

                <div class="panel-heading">LISTES DES FILMS  EN LIGNE</div>

                <div class="panel-body">


                    <table  id="liste_films_enregistre" name="liste_films_enregistre" class="table table-striped table-hover">

                        <thead>

                            <tr>
                                <th>JAQUETTE</th>

                                <th>NOM ORIGINALE</th>                       

                                <th class="sort-alpha">ACTION</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php
                            $tr = '';
                            $j = 1;

                            foreach ($liste_films_en_ligne as $value) {

                                $tr .= '<tr>';

                                $tr .= '<td><img src="' . $value['poster_path'] . '" class="img-rounded"  width="100" height="100"></td>';

                                $tr .= '<td style="padding-top:2%">' . $value ['titre_originale'] . '</td>';

                                $tr .= '<td style="padding-top:2%"><button  style="margin:5px"  data-toggle="modal" data-target="#myModal_edit_' . $j . '"  class="btn btn-danger btn-lg"  > Editer </button>';

                                $tr .= '<button  style="margin:5px"  data-toggle="modal" data-target="#myModal_consult_' . $j . '"  class="btn btn-primary btn-lg"  > Consulter </button>';

                                $tr .= '<button  style="margin:5px"  data-toggle="modal" data-target="#myModal_list_serveurs_' . $j . '"  class="btn btn-primary btn-lg"  > Consulter les serveurs </button>';


                                $tr .= '<button    data-toggle="modal" data-target="#myModal_add_link_serveur_' . $j . '"  class="btn btn-primary btn-lg"  > ADD LINK SERVEUR </button>';


                                $tr .= '<button data-toggle="modal" data-target="#myModal_fiche_TMDB_' . $j . '"  class="btn btn-info btn-lg"  > La fiche de film </button></td>';


                                $tr .= '</tr>';

                                $j++;
                            }

                            echo $tr;
                            ?>



                        </tbody>


                    </table>
                    <!----------------------   consultation fiche ----------------------------->


                </div>

            </div>

        </div>

    </div>
<?php } ?>


<?php
if (isset($liste_films_en_ligne) && sizeof($liste_films_en_ligne) > 0) {


    $j = 1;

    foreach ($liste_films_en_ligne as $value) {
        ?>

        <div id="myModal_list_serveurs_<?= $j; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel" style="color:blue">LA LISTE DES SERVEURS</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-30px">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">



                        <?php
                        $k = 1;
                        foreach ($value['list_serveur'] as $serveur) {
                            ?>

                            <h3 style="color:red">SERVEUR N° <?= $k ?></h3>

                            <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <th scope="row" style="color:blue">DATE CREATION :</th>
                                        <td><?= $serveur['date_created'] ?></td>

                                    </tr>
                                    <tr>
                                        <th scope="row"  style="color:blue">NOM SERVEUR :</th>
                                        <td><?= $serveur['nom_serveur'] ?></td>

                                    </tr>
                                    <tr>
                                        <th scope="row"  style="color:blue">IDENTIFIANT :</th>
                                        <td><?= $serveur['identifiant_streaming'] ?></td>

                                    </tr>
                                    <?php if ($serveur['url'] != '') { ?>
                                        <tr>
                                            <th scope="row"  style="color:blue">URL :</th>
                                            <td><?= $serveur['url'] ?></td>
                                        </tr>

                                    <?php } ?>
                                    <tr>
                                        <th scope="row"  style="color:blue">ACTIVATION :</th>
                                        <td><?= $serveur['activation'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"  style="color:blue">ACTION :</th>
                                        <td>
                                            <a href="<?= $url_espace_admin; ?>/controleurs/FilmsHindo/delete_links_serveur.php?id_link=<?= $serveur['id_link']; ?>"><button    class="btn btn-danger btn-md"  > Supprimer </button></a>
                                            <a target="_blank" href="<?= $url_espace_admin; ?>/index.php?module=Serveurs&action=debug_serveur&id_link=<?= $serveur['id_link']; ?>&identifiant_streaming=<?= $serveur['identifiant_streaming'] ?>&serveur_video=<?= $serveur['id_serveur'] ?>"><button    class="btn btn-primary btn-md"  > Checker le serveur </button></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>        


                            <?php
                            $k++;
                        }
                        ?>




                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Fermer</button>     

                    </div>

                </div>
            </div>
        </div>   

        <?php
        $j++;
    }
    ?>
<?php } ?>

<?php
$j = 1;
foreach ($liste_films_en_ligne as $film) {
    ?>
    <div id="myModal_add_link_serveur_<?= $j; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" id="form_add_link_<?= $j; ?>" name="form_add_link_<?= $j; ?>" method="POST" action="./controleurs/FilmsHindo/add_link_servers.php">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel" style="color:blue">AJOUTER UN SERVEUR </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-30px">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group"  style="padding-top:1%">
                            <div class="col-sm-12">
                                <label class="control-label" for="identifiant_<?= $j; ?>" style="color:blue;font-size:16px">Identifiant streaming: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                            </div>

                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="identifiant_streaming"  name="identifiant_streaming"  placeholder="Entrer identifiant streaming" value="" >

                            </div>
                        </div> 
                        <div class="form-group"  style="padding-top:1%">
                            <div class="col-sm-12">
                                <label class="control-label" for="serveur_<?= $j; ?>" style="color:blue;font-size:16px">SERVEUR: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                            </div>

                            <div class="col-sm-12">
                                <select class="form-control" name="serveur_film"  id="serveur_film" >

                                    <?php
                                    $tr = '<option value="">Select-serveur</option>';

                                    foreach ($liste_serveurs_vod as $serveur) {


                                        $tr.="<option value='" . $serveur['id_serveur'] . "' ";

                                        $tr.= ">" . $serveur['nom_serveur'] . '-' . $serveur['emplacement_serveur'] . "</option>";
                                    }

                                    echo $tr;
                                    ?>

                                </select>

                            </div>
                        </div>
                        <div class="form-group"  style="padding-top:1%">
                            <div class="col-sm-12">
                                <label class="control-label" for="qualite_video_<?= $j; ?>" style="color:blue;font-size:16px">QUALITE VIDEO: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                            </div>

                            <div class="col-sm-12">
                                <select class="form-control" name="qualite_video"  id="qualite_video" >

                                    <?php
                                    $tr = '<option value="">Select-qualite</option>';

                                    foreach ($listeQualiteVod as $qualite) {


                                        $tr.="<option value='" . $qualite['id_qualite'] . "' ";

                                        $tr.= ">" . $qualite['nom_qualite'] . "</option>";
                                    }

                                    echo $tr;
                                    ?>

                                </select>

                            </div>
                        </div>
                        <div class="form-group"  style="padding-top:1%">
                            <div class="col-sm-12">
                                <label class="control-label" for="url_<?= $j; ?>" style="color:blue;font-size:16px">URL: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                            </div>

                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="url"  name="url"   value="" >

                            </div>
                        </div> 


                        <input type="hidden"  name="id_fichier"  value="<?= $film['id_fichier']; ?>">

                        <input type="hidden"  name="action_module"  value="all_films_ligne">
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Fermer</button>                         
                        <button type="submit" class="btn btn-primary" name="button_update"  value="update_file">Enregistrer le link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php
    $j++;
}
?> 
<?php $j = 1; foreach ($liste_films_en_ligne as $film) { ?>

    <div id="myModal_consult_<?= $j; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">               
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel" style="color:blue">CONSULTATION LA FICHE</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-30px">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered">

                        <tbody>
                            <tr>
                                <th scope="row" style="color:blue">SOURCE :</th>
                                <td><a href="<?= $film['source']; ?>" target="_blank">Accéder</a></td>

                            </tr>

                        </tbody>

                    </table>




                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Fermer</button>                       

                </div>             
            </div>
        </div>
    </div>


    <?php $j++; } ?> 





