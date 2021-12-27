<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?> | <?= $detail->nama_sekolah; ?></title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tell to not translate -->
    <meta name="google" content="notranslate">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/adminlte.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- ChartJS -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/chart.js/Chart.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- Nestable -->
    <link href="<?=base_url('vendor/nestable/jquery.nestable.css');?>" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/'); ?>img/logo/logo-only.png" type="image/png">
    
    <!-- Costum CSS Location -->
    
    <?php
        if (!empty($costum_css)) {
            $this->view($costum_css);
        }
    ?>

    
</head>