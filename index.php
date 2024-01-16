<?php
date_default_timezone_set("Asia/Jakarta");
session_start();
require "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pendaftaran Beasiswa</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
</head>
<body>

    <!-- Cek Status Login -->
    <?php 
    if($_SESSION['status'] != "y"){
        header("Location:login.php");
    }
    ?>

    <!-- Tampilan Menu -->
    <nav class="navbar navbar-dark bg-primary border navbar-expand-sm fixed-top">
        <a class="navbar-brand" href="#">PENDAFTARAN BEASISWA</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home </a></li>
            <li class="nav-item active"><a class="nav-link" href="?page=pendaftaran"><i class="fas fa-address-book"></i> Pendaftaran </a></li>

            <?php if($_SESSION['level'] == "Admin"): ?>
               <li class="nav-item active"><a class="nav-link" href="?page=user"><i class="fas fa-user"></i> User </a></li>
               <li class="nav-item active"><a class="nav-link" href="?page=mahasiswa"><i class="fas fa-user-graduate"></i> Mahasiswa </a></li>
               <li class="nav-item active"><a class="nav-link" href="?page=perangkingan&jenis="><i class="fas fa-book-reader"></i> Perengkingan </a></li>
               <li class="nav-item active"><a class="nav-link" href="?page=acc"><i class="fas fa-awardfas fa-award"></i> Penerima </a></li>
            <?php endif ?>

           <li class="nav-item active"><a class="nav-link" href="?page=logout"><i class="fas fa-door-closed"></i> Logout </a></li>
       </ul>
   </nav>

   <div class="container" style="margin-top:100px;margin-bottom:100px">
    <?php

    // pengaturan menu
    $page = isset($_GET['page']) ? $_GET['page'] : "";
    $action = isset($_GET['action']) ? $_GET['action'] : "";

    if ($page==""){
        include "welcome.php";
    }elseif ($page=="mahasiswa"){
        if ($action==""){
            include "mahasiswa/tampil_mahasiswa.php";
        }elseif($action == "tambah"){
            include "mahasiswa/tambah_mahasiswa.php";
        }elseif($action == "update"){
            include "mahasiswa/update_mahasiswa.php";
        }
        else{
            include "mahasiswa/hapus_mahasiswa.php";
        }
    }elseif ($page=="pendaftaran"){
        if ($action==""){
            include "pendaftaran/tampil_pendaftaran.php";
        }elseif($action == "tambah"){
            include "pendaftaran/tambah_pendaftaran.php";
        }elseif($action == "update"){
            include "pendaftaran/update_pendaftaran.php";
        }elseif($action == "verif"){
            include "pendaftaran/verifikasi.php";
        }else{
            include "pendaftaran/hapus_pendaftaran.php";
        }
    }elseif ($page=="perangkingan"){
        if ($action==""){
            include "perangkingan/perangkingan.php";
        }elseif($action=="tambah"){
            include "perangkingan/tambah_acc.php";
        }
    }elseif ($page=="user"){
        if ($action==""){
            include "user/tampil_user.php";
        }elseif($action == "tambah"){
            include "user/tambah_user.php";
        }elseif($action == "update"){
            include "user/update_user.php";
        }
        else{
            include "user/hapus_user.php";
        }
    }elseif($page=="acc"){
        if ($action==""){
            include "acc/tampil_acc.php";
        }elseif ($action=="terima"){
            include "acc/data_penerima.php";
        }elseif ($action=="hapus"){
            include "acc/hapus_acc.php";
        }elseif ($action=="hapus_data"){
            include "acc/hapus_data_acc.php";
        }
    }else{
        if ($action==""){
            include "logout.php";
        }
    }
    ?>
</div>

<script src="assets/js/jquery-3.7.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/all.js"></script>
<script src="assets/js/datatables.min.js"></script>
<script>
   $(document).ready(function () {
       $('#myTable').dataTable();
   });
</script>

<script src="assets/js/chosen.jquery.min.js"></script>
<script>
 $(function() {
   $('.chosen').chosen();
});
</script>

</body>
</html>