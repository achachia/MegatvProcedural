<head>    <!-- Meta-->    <meta charset="utf-8">    <meta http-equiv="X-UA-Compatible" content="IE=edge">    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">    <meta name="description" content="">    <meta name="keywords" content="">    <meta name="author" content="">    <title>MEGA-TV[VOD]</title>    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->    <!-- Bootstrap CSS-->    <link rel="stylesheet" href="<?= Host; ?>/gestion-admin/app/css/bootstrap.css">    <!-- Vendor CSS-->    <link rel="stylesheet" href="<?= Host; ?>/gestion-admin/vendor/animo/animate+animo.css">    <link rel="stylesheet" href="<?= Host; ?>/gestion-admin/vendor/csspinner/csspinner.min.css">    <link rel="stylesheet" href="<?= Host; ?>/gestion-admin/vendor/jqueryui/css/no-theme/jquery-ui.css">    <!-- Data Table styles-->    <link rel="stylesheet" href="<?= Host; ?>/gestion-admin/vendor/datatable/extensions/datatable-bootstrap/css/dataTables.bootstrap.css">    <link rel="stylesheet" href="<?= Host; ?>/gestion-admin/vendor/datatable/extensions/ColVis/css/dataTables.colVis.css">    <!-- END Page Custom CSS-->    <!-- App CSS-->    <link rel="stylesheet" href="<?= Host; ?>/gestion-admin/app/css/app.css">    <link rel="stylesheet" href="<?= Host; ?>/gestion-admin/vendor/fontawesome/css/font-awesome.css">    <!-- Modernizr JS Script-->    <script src="<?= Host; ?>/gestion-admin/vendor/modernizr/modernizr.js" type="application/javascript"></script>    <!-- FastClick for mobiles-->    <script src="<?= Host; ?>/gestion-admin/vendor/fastclick/fastclick.js" type="application/javascript"></script>    <script src="<?= Host; ?>/gestion-admin/vendor/jquery/jquery.min.js"></script>    <script src="<?= Host; ?>/gestion-admin/vendor/jqueryui/js/jquery-ui.min.js"></script>    <script src="<?= Host; ?>/gestion-admin/vendor/bootstrap/js/bootstrap.min.js"></script>    <script src="<?= Host; ?>/media/plugin_js/bootbox.min.js"></script>    <script src='<?= Host; ?>/gestion-admin/app/js/jquery-ui-timepicker-addon.js'></script>    <script src='<?= Host; ?>/gestion-admin/app/js/jquery-ui-sliderAccess.js'></script> <!--<link rel="stylesheet" href="<?= Host; ?>/gestion-admin/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css"><script src="<?= Host; ?>/gestion-admin/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script><script src="<?= Host; ?>/gestion-admin/app/js/app.js"></script>-->    <script type="text/javascript">        $(document).ready(function () {<?php if ($action == 'all_films_arabic') { ?>                $('#liste_films_enregistre tbody').on('click', 'button[value="add_link_serveur"]', function () {                    var id_fichier = $(this).attr('id');                    //alert(id_fichier+'avant');                    $("#id_fichier").val(id_fichier);                    // alert($("#id_fichier").val()+'apres');                });<?php } ?><?php if ($action == 'all_films_hindo') { ?>                $('#liste_films_enregistre tbody').on('click', 'button[value="add_link_serveur"]', function () {                    var id_fichier = $(this).attr('id');                    //alert(id_fichier+'avant');                    $("#id_fichier").val(id_fichier);                    // alert($("#id_fichier").val()+'apres');                });<?php } ?><?php if ($action == 'all_films') { ?>                $('#liste_films_enregistre tbody').on('click', 'button[value="add_link_serveur"]', function () {                    var id_fichier = $(this).attr('id');                    //alert(id_fichier+'avant');                    $("#id_fichier").val(id_fichier);                    // alert($("#id_fichier").val()+'apres');                });                $('#liste_films_enregistre tbody').on('click', 'button[value="edit_fiche"]', function () {                    var id_fichier = $(this).attr('id');                    tab = id_fichier.split("_");                    id = tab[1];                    $.ajax({                        url: "./getInfosMovie.php",                        type: "POST",                        data: {id_fichier: id},                        dataType: 'json',                        cache: false,                        success: function (data) {                            objet_message = data.message;                            objet_message.reponse = Boolean(objet_message.reponse);                            /******************************************/                            if (objet_message.reponse) {                                objet_json = objet_message.infos_movie;                                $("#edit_nv_nom_fichier").val(objet_json.nom_fichier_complet);                                $("#edit_titre_original").val(objet_json.titre_originale);                                $("#edit_nom_fichier_complet").val(objet_json.nom_fichier_complet);                                $("#edit_idtmd").val(objet_json.id_TMD);                                $("#edit_taille_fichier").val(objet_json.taille_fichier);                            } else {                                alert("erreur");                            }                            /******************************************/                        },                        error: function (jqXHR, error, errorThrown) {                            bootbox.alert({                                title: "<span class='glyphicon glyphicon-warning-sign'></span>Erreur interne ",                                message: "Il ya une erreur interne dans le traitement de la demande",                            });                        }                    });                });<?php } ?><?php if ($action == 'all_radio') { ?>                /***********************************************************************************/                dtInstance1 = $('#liste_radio_web').dataTable({                    'paging': true, // Table pagination                    'ordering': true, // Column ordering                     'info': true, // Bottom left status text                    // Text translation options                    // Note the required keywords between underscores (e.g _MENU_)                    oLanguage: {                        sSearch: 'Rechercher tous les colonnes:',                        sLengthMenu: '_MENU_ enregistrements par page',                        sInfo: 'Showing _START_ to _END_ of _TOTAL_ entrie',                        info: 'Afficher la page _PAGE_ of _PAGES_',                        zeroRecords: 'rien n\'a été trouvé - sorry',                        infoEmpty: 'Aucun enregistrement disponible',                        infoFiltered: '(filtré à partir de _MAX_ nombre total d\'enregistrements)'                    },                    sDom: 'C<"clear">lfrtip',                    colVis: {                        order: "alfa",                        "buttonText": "Afficher / Masquer les colonnes"                    }                });                var inputSearchClass = 'datatable_input_col_search';                var columnInputs = $('tfoot .' + inputSearchClass);                // On input keyup trigger filtering                columnInputs.keyup(function () {                    dtInstance1.fnFilter(this.value, columnInputs.index(this));                });<?php } ?><?php if ($action == 'all_serie_tv') { ?>                /***********************************************************************************/                dtInstance1 = $('#liste_serie_non_enregistre,#liste_serie_enregistre').dataTable({                    'paging': true, // Table pagination                    'ordering': true, // Column ordering                     'info': true, // Bottom left status text                    // Text translation options                    // Note the required keywords between underscores (e.g _MENU_)                    oLanguage: {                        sSearch: 'Rechercher tous les colonnes:',                        sLengthMenu: '_MENU_ enregistrements par page',                        sInfo: 'Showing _START_ to _END_ of _TOTAL_ entrie',                        info: 'Afficher la page _PAGE_ of _PAGES_',                        zeroRecords: 'rien n\'a été trouvé - sorry',                        infoEmpty: 'Aucun enregistrement disponible',                        infoFiltered: '(filtré à partir de _MAX_ nombre total d\'enregistrements)'                    },                    sDom: 'C<"clear">lfrtip',                    colVis: {                        order: "alfa",                        "buttonText": "Afficher / Masquer les colonnes"                    }                });                var inputSearchClass = 'datatable_input_col_search';                var columnInputs = $('tfoot .' + inputSearchClass);                // On input keyup trigger filtering                columnInputs.keyup(function () {                    dtInstance1.fnFilter(this.value, columnInputs.index(this));                });                /*************************************************************************/                dtInstance2 = $('#liste_episodes_saison_non_enregistre,#liste_episodes_saison_enregistre').dataTable({                    'paging': true, // Table pagination                    'ordering': true, // Column ordering                     'info': true, // Bottom left status text                    // Text translation options                    // Note the required keywords between underscores (e.g _MENU_)                    oLanguage: {                        sSearch: 'Rechercher tous les colonnes:',                        sLengthMenu: '_MENU_ enregistrements par page',                        sInfo: 'Showing _START_ to _END_ of _TOTAL_ entrie',                        info: 'Afficher la page _PAGE_ of _PAGES_',                        zeroRecords: 'rien n\'a été trouvé - sorry',                        infoEmpty: 'Aucun enregistrement disponible',                        infoFiltered: '(filtré à partir de _MAX_ nombre total d\'enregistrements)'                    },                    sDom: 'C<"clear">lfrtip',                    colVis: {                        order: "alfa",                        "buttonText": "Afficher / Masquer les colonnes"                    }                });                var inputSearchClass = 'datatable_input_col_search';                var columnInputs = $('tfoot .' + inputSearchClass);                // On input keyup trigger filtering                columnInputs.keyup(function () {                    dtInstance2.fnFilter(this.value, columnInputs.index(this));                });<?php } ?><?php if ($action == 'all_serie_tv_arabic') { ?>                /***********************************************************************************/                dtInstance1 = $('#liste_serie_enregistre,#liste_serie_non_enregistre,#liste_serie_enregistre,#liste_episodes_enregistre').dataTable({                    'paging': true, // Table pagination                    'ordering': true, // Column ordering                     'info': true, // Bottom left status text                    // Text translation options                    // Note the required keywords between underscores (e.g _MENU_)                    oLanguage: {                        sSearch: 'Rechercher tous les colonnes:',                        sLengthMenu: '_MENU_ enregistrements par page',                        sInfo: 'Showing _START_ to _END_ of _TOTAL_ entrie',                        info: 'Afficher la page _PAGE_ of _PAGES_',                        zeroRecords: 'rien n\'a été trouvé - sorry',                        infoEmpty: 'Aucun enregistrement disponible',                        infoFiltered: '(filtré à partir de _MAX_ nombre total d\'enregistrements)'                    },                    sDom: 'C<"clear">lfrtip',                    colVis: {                        order: "alfa",                        "buttonText": "Afficher / Masquer les colonnes"                    }                });                var inputSearchClass = 'datatable_input_col_search';                var columnInputs = $('tfoot .' + inputSearchClass);                // On input keyup trigger filtering                columnInputs.keyup(function () {                    dtInstance1.fnFilter(this.value, columnInputs.index(this));                });<?php } ?><?php if ($action == 'all_documentaire') { ?>                /***********************************************************************************/                dtInstance1 = $('#liste_doc_non_enregistre,#liste_doc_enregistre').dataTable({                    'paging': true, // Table pagination                    'ordering': true, // Column ordering                     'info': true, // Bottom left status text                    // Text translation options                    // Note the required keywords between underscores (e.g _MENU_)                    oLanguage: {                        sSearch: 'Rechercher tous les colonnes:',                        sLengthMenu: '_MENU_ enregistrements par page',                        sInfo: 'Showing _START_ to _END_ of _TOTAL_ entrie',                        info: 'Afficher la page _PAGE_ of _PAGES_',                        zeroRecords: 'rien n\'a été trouvé - sorry',                        infoEmpty: 'Aucun enregistrement disponible',                        infoFiltered: '(filtré à partir de _MAX_ nombre total d\'enregistrements)'                    },                    sDom: 'C<"clear">lfrtip',                    colVis: {                        order: "alfa",                        "buttonText": "Afficher / Masquer les colonnes"                    }                });                var inputSearchClass = 'datatable_input_col_search';                var columnInputs = $('tfoot .' + inputSearchClass);                // On input keyup trigger filtering                columnInputs.keyup(function () {                    dtInstance1.fnFilter(this.value, columnInputs.index(this));                });                /*************************************************************************/<?php } ?><?php if ($action == 'all_demandes_code' || $action == 'all_code_enregistre') { ?>                /***********************************************************************************/                dtInstance1 = $('#liste_codes_test_valides,#liste_demandes_attente,#liste_codes_enregistre').dataTable({                    'paging': true, // Table pagination                    'ordering': true, // Column ordering                     'info': true, // Bottom left status text                    // Text translation options                    // Note the required keywords between underscores (e.g _MENU_)                    oLanguage: {                        sSearch: 'Rechercher tous les colonnes:',                        sLengthMenu: '_MENU_ enregistrements par page',                        sInfo: 'Showing _START_ to _END_ of _TOTAL_ entrie',                        info: 'Afficher la page _PAGE_ of _PAGES_',                        zeroRecords: 'rien n\'a été trouvé - sorry',                        infoEmpty: 'Aucun enregistrement disponible',                        infoFiltered: '(filtré à partir de _MAX_ nombre total d\'enregistrements)'                    },                    sDom: 'C<"clear">lfrtip',                    colVis: {                        order: "alfa",                        "buttonText": "Afficher / Masquer les colonnes"                    }                });                var inputSearchClass = 'datatable_input_col_search';                var columnInputs = $('tfoot .' + inputSearchClass);                // On input keyup trigger filtering                columnInputs.keyup(function () {                    dtInstance1.fnFilter(this.value, columnInputs.index(this));                });                /*************************************************************************/<?php } ?>        });    </script></head>