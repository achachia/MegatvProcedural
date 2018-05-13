<?php/*  fichier config */if (isset($_GET['module']) && $_GET['module'] == 'Iptv') {    include './connection/config_iptv.php';} else {    include './connection/config_vod.php';}if (isset($environnement) && $environnement == 'DEBUG') {    error_reporting(E_ALL);} else {    error_reporting(0);}session_start();session_regenerate_id();$drapeau = TRUE;if (!isset($_GET['module']) && !isset($_GET['action'])) {    $module = 'home';    $action = 'home';} else {    $module = $_GET['module'];    $action = $_GET['action'];}if (!isset($_SESSION ['user_admin'] ['code_user'])) {    $lien = $url_espace_client . "/login.php";    $drapeau = FALSE;} else {    if ($action == 'deconnection') {        $_SESSION ['user_admin'] ['code_user'] = '';        session_destroy();        $lien = $url_espace_client . "/login.php";        $drapeau = FALSE;    }}if (!$drapeau) {    header("Location: $lien");    exit();}/*  fichier fonctions */include './librairie/fonctions.php';$nb_chaines_iptv_active=NbChainesIptvActive();$nb_chaines_radio_web=NbChainesRadioWeb();$nbr_films = getNbr_films();$nbr_cartoon = getNbr_cartoon();$nbr_serie_tv = getNbr_serie_tv();$nb_doc_fr = getNbr_DocFr();$nb_films_hindo = getNbr_FilmsHindo();$nb_films_arabic = getNbr_FilmsArabic();$data_films = getDataFilms();$data_cartoon = getDataCartoon();$data_serie_tv = getDataSerieTv();$data_doc_fr = getDataDocTvFr();$data_films_arabic = getDataFilmsArabic();$data_films_hindo = getDataFilmsHindo();?><!DOCTYPE html><!--[if lt IE 7]> <html class="ie ie6 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]--><!--[if IE 7]>    <html class="ie ie7 lt-ie9 lt-ie8"        lang="en"> <![endif]--><!--[if IE 8]>    <html class="ie ie8 lt-ie9"               lang="en"> <![endif]--><!--[if IE 9]>    <html class="ie ie9"                      lang="en"> <![endif]--><!--[if !IE]><!--><html lang="fr" class="no-ie">     <!--<![endif]-->    <?php /* Header */ include './templates/header.php'; ?>    <body>         <!-- START Main wrapper-->        <section class="wrapper">            <?php /* Section Nav */ include './templates/nav.php'; ?>            <?php /* Section Side bar-left */ include './templates/sidebar_left.php'; ?>            <?php /* Section contenu */ include './section_contenu.php'; ?>            <?php /* Section Side bar-right */    //include './templates/sidebar_right.php';     ?>        </section>        <!-- END Main wrapper-->        <!-- START Scripts-->        <!-- Main vendor Scripts-->        <!-- Plugins-->        <script src="<?= Host; ?>/gestion-admin/vendor/chosen/chosen.jquery.min.js"></script>        <script src="<?= Host; ?>/gestion-admin/vendor/slider/js/bootstrap-slider.js"></script>        <script src="<?= Host; ?>/gestion-admin/vendor/filestyle/bootstrap-filestyle.min.js"></script>        <!-- Animo-->        <script src="<?= Host; ?>/gestion-admin/vendor/animo/animo.min.js"></script>        <!-- Sparklines-->        <script src="<?= Host; ?>/gestion-admin/vendor/sparklines/jquery.sparkline.min.js"></script><!--        <!-- Slimscroll-->        <script src="<?= Host; ?>/gestion-admin/vendor/slimscroll/jquery.slimscroll.min.js"></script>        <script src="<?= Host; ?>/gestion-admin/vendor/datatable/media/js/jquery.dataTables.min.js"></script>        <script src="<?= Host; ?>/gestion-admin/vendor/datatable/extensions/datatable-bootstrap/js/dataTables.bootstrap.js"></script>        <script src="<?= Host; ?>/gestion-admin/vendor/datatable/extensions/datatable-bootstrap/js/dataTables.bootstrapPagination.js"></script>        <script src="<?= Host; ?>/gestion-admin/vendor/datatable/extensions/ColVis/js/dataTables.colVis.min.js"></script>          <!-- App Main-->        <script src="<?= Host; ?>/gestion-admin/app/js/app.js"></script>        <!-- END Scripts-->    </body></html>