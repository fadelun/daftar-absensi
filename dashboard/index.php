<?php
session_start();

if(!isset($_SESSION['status'] ) || $_SESSION['status'] != 'LOGIN'){
    header("location:../index.php?message=Silahkan Login dahulu");
};


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
    <title>DASHBOARD</title>
</head>
<body>
    <div>
        <section>
            <h3>Halo <?php echo $_SESSION['fullname']; ?></h3>
            <p>status pegawai : <?php echo $_SESSION['role']; ?></p>
            <br>
            <?php 
                 if (isset($_GET['message'])) {
                    echo $_GET['message'];
                  }
            ?>
          <!-- INI UNTUK CALL DATA ABSENSI -->
          <?php include("absensi.php") ?>
            <!-- =============  -->
            <br>
            <form action="" method="POST">
                <button name="logout" type="submit">logout</button>
            </form>
        </section>
    </div>
</body>
</html>