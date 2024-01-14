<style>
  body {
    background-image: url("assets/img/background.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
  }
  h1, h3 , h2 {
    text-shadow: 1px 0 #fff, -1px 0 #fff, 0 1px #fff, 0 -1px #fff,  1px 1px #fff, -1px -1px #fff, 1px -1px #fff, -1px 1px #fff; /* untuk membuat border putih dengan text-shadow */
    -webkit-text-stroke: 1px #fff; /* untuk membuat border putih dengan text-stroke */
    color: black; /* untuk mengubah warna teks menjadi hitam */
  }
</style>
<div style="text-align: center;">
  <img src="assets/img/logopoltek.png" alt="Gambar contoh" width="150" height="125">
</div>

<?php 
  if($_SESSION['level'] == "Admin"){?>
    <h1 align="center">SELAMAT DATANG</h1>
    <h3 align="center">SEMANGAT KERJANYA</h3>
    <h3 align="center">STAF 
    <h2 align="center">POLITEKNIK LAMANDAU</h3>

 <?php }else{ ?>
    <h1 align="center">SELAMAT DATANG</h1>
    <h3 align="center">CIEE Yang Mau Daftar</h3>
    <h3 align="center">Beasiswa di 
    <h2 align="center">POLITEKNIK LAMANDAU</h3>
 <?php } ?>
