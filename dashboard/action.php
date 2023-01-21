<?php
include("../connection.php");
session_start();
date_default_timezone_set("Asia/Jakarta");


$tgl = date('Y-m-d');
$time = date('H:i');
$employee_id = $_SESSION['employee_id'];

 if(isset($_POST['absen'])){
    $check_absensi = "SELECT tgl FROM kehadiran WHERE employee_id=$employee_id AND tgl='$tgl'";
    $check = $db->query($check_absensi);

    if($check->num_rows > 0){
        header("location:index.php?message=Anda sudah absen");
    }else{
        $sql = "INSERT INTO `kehadiran` (id,employee_id,tgl,clock_in, clock_out) 
        VALUES (NULL, $employee_id, '$tgl', '$time', NULL)";
        
        $result = $db->query($sql);
    
        if($result == TRUE){
            header("location:index.php?message=ABSEN berhasil dilakukan");
        }else{
            header("location:index.php?message=ABSENSI gagal!");
        }
    }

 }
?>