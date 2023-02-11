<!DOCTYPE html>
<html lang="en">

<head>
  <!-- <meta charset="utf-8"> -->
  <meta charset="UTF-16">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= __('Admin | Misbah-ul-uloom')?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="./assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="./assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="./assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="./assets/plugins/summernote/summernote-bs4.min.css">
  <style>
    
    @font-face {
    font-family: jameelnoori;
    src: url('../fonts/Jameel Noori Nastaleeq Kasheeda.ttf');
    }
    <?php
      if($_SESSION['lang']==='ur'){
    ?>
    @font-face {
      font-family: nooriregular;
      src: url('../fonts/nooriregular.ttf');
    }
    body{
      font-family: 'nooriregular';
      font-size: large;
      font-weight: bold;
    }
    <?php 
      }
    ?>
    .ur_text{
        font-family: 'jameelnoori';
        font-size: larger;
        /* font-family: 'Courier New', Courier, monospace; */
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">