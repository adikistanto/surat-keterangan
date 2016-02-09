<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico" type="image/x-icon">
        <title>Desa Pladen</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap-theme.min.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/datepicker.css" type="text/css"/>

        <script src="<?php echo base_url() ?>assets/js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
        
    </head>
    <body>
        <!-- HEADER -->
        <div class="wrapper">
            <div id="header" class="header">
                
                    <div class="col-lg-1">
                        <img src="<?php echo base_url() ?>assets/images/logo_kudus.png"/>
                    </div>
                    <div class="col-lg-11" style="padding:0px">
                        <h3>Pemerintah Desa Pladen</h3>
                        <h5>Kecamatan Jekulo, Kabupaten Kudus</h5>
                    </div>
               
            </div>
            <!-- CONTENT -->
            <div id="content">
            <div id='menu' class="col-lg-2">
                <ul style="padding: 0px">
                    <li><a class="<?php echo active_link('proses'); ?>" href='<?php echo base_url('proses') ?>'><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;&nbsp;<b>Surat</b></a></li>
                    <li><a class="<?php echo active_link('laporan'); ?>"href='<?php echo base_url('laporan') ?>'><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>&nbsp;&nbsp;<b>Laporan</b></a></li>
                    <li><a class="<?php echo active_link('pengaturan'); ?>"href='<?php echo base_url('pengaturan') ?>'><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>&nbsp;&nbsp;<b>Pengaturan</b></a></li>
                </ul>
            </div>
            