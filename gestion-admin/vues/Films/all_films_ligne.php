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
            <form class="form-horizontal" id="form_add_film_serveur" name="form_add_film_serveur" method="POST" action="./controleurs/Films/set_film_en_ligne.php">
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
                            <label class="control-label" for="section_film_<?= $j; ?>" style="color:blue;font-size:16px">SECTION: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                        </div>

                        <div class="col-sm-12">
                            <select class="form-control" name="section_film"  id="section_film" >

                                <?php
                                $tr = '<option value="">Select-section</option>';

                                foreach ($liste_genre_films as $value3) {


                                    $tr.="<option value='" . $value3['id_section'] . "' ";

                                    if ($value3['id_section'] == '2') {

                                        $tr.=' selected="selected" ';
                                    }
                                    $tr.= ">" . $value3['nom_section'] . "</option>";
                                }

                                echo $tr;
                                ?>

                            </select>

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
                            <label class="control-label" for="identifiant_<?= $j; ?>" style="color:blue;font-size:16px">Identifiant streaming: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                        </div>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="identifiant_streaming"  name="identifiant_streaming"  placeholder="Entrer identifiant streaming" value="" >

                        </div>
                    </div> 
                    <div class="form-group"  style="padding-top:1%">
                        <div class="col-sm-12">
                            <label class="control-label" for="idtmd_<?= $j; ?>" style="color:blue;font-size:16px">ID TMDB: <span style="color:red">(<i class="fa fa-asterisk" aria-hidden="true"></i>)</span></label>
                        </div>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="idtmd"  name="idtmd"   value="" >

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
                                
                                <th>IDENTIFIANT</th>

                                <th>SERVEUR DE STOCKAGE</th>

                                <th class="sort-alpha">ACTION</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php
                            $tr = '';
                            $j = 0;

                            foreach ($liste_films_en_ligne as $value) {              

                                $tr .= '<tr>';

                                $tr .= '<td><img src="' . $value['poster_path'] . '" class="img-rounded"  width="100" height="100"></td>';

                                $tr .= '<td style="padding-top:2%">' . $value ['titre_originale'] . '</td>';                           

                                $tr .= '<td style="padding-top:2%">' . $value ['identifiant_streaming'] . '</td>';

                                $tr .= '<td style="padding-top:2%">' . $value ['nom_serveur'] . '</td>';                           


                                $tr .= '<td style="padding-top:2%"><button  style="margin:5px"  data-toggle="modal" data-target="#myModal_edit_' . $j . '"  class="btn btn-primary btn-lg"  > Editer </button>';

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
