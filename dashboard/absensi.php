<table border="1">
             <tr>
                <th>Tanggal</th>
                <th>Jam masuk</th>
                <th>Jam keluar</th>
                 <th>perform</th>
            </tr>

<?php
    
    include("../connection.php");
    date_default_timezone_set("Asia/Jakarta");

    $tgl = date('Y-m-d');
    $time = date('H:i');
    $employee_id = $_SESSION['employee_id'];

    // sql syntax
    $sql = "SELECT * FROM kehadiran WHERE employee_id=$employee_id";
    $result = $db->query($sql);

  while($row = $result->fetch_assoc()){
      echo "<tr>";
      echo "<td>" .$row['tgl']. "</td>";
      echo "<td>" .$row['clock_in']. "</td>";
    if(empty($row['clock_out']) && !empty($row['clock_in']) && $tgl == $row['tgl']){
        echo "<td>
        <form action='' method='POST' onsubmit='return alert(`Terima kasih sudah bekerja hari ini semoga harimu menyenangkan`) '>
                <button name='keluar' type='submit'>keluar</button>
            </form>
        </td>";
    }else{

        echo "<td>" .$row['clock_out']. "</td>";
    }

      echo "<td>🍔</td>";
      echo "</tr>";

  }
  

?>
            </table>
            <form action="action.php" method="POST">
                <button name="absen" type="submit">ABSEN</button>
            </form>

<?php
if(isset($_POST['keluar'])){
    // sql syntax
    $update = "UPDATE kehadiran SET clock_out='$time' WHERE employee_id=$employee_id AND tgl='$tgl' ";

    $clock_out = $db->query($update);
    if($clock_out === TRUE){
        session_start();
        session_destroy();
        header("location:../index.php");
    }

}

?>

