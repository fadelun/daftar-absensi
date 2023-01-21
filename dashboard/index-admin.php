<?php


echo "SAYA ADMIN!";

if(isset($_POST['logout'])){ 
  session_destroy();
  header("location:../index.php?message=selamat! anda telah keluar");
};


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
    <form action='' method='POST'>
      <button name='tambah_pegawai' type='submit'>tambah pegawai</button>
      <button name='data_absen' type='submit'>data absen pegawai</button>
      <button name="profile" type="submit">profile pegawai</button>


    </form>
    
    <div class="data-pegawai">
          <?php
      if(isset($_POST['tambah_pegawai'])){
        echo "tambah pegawai";
      }
      
      if(isset($_POST['data_absen'])){
        echo "data pegawai";
      }
      
      if(isset($_POST['profile'])){
        include("profile-pegawai.php");
      }
            
          ?>

<form action="" method="POST">
                <button name="logout" type="submit">logout</button>
            </form>
  </div>
</body>
</html>