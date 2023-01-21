<table border="1">
             <tr>
                <th>NO</th>
                <th>ID pegawai</th>
                <th>Nama lengkap</th>
                 <th>Role</th>
                 </tr>

<?php

include("../connection.php");

// $pegawai = mysqli_query($db, "SELECT * FROM user");
// while($row = mysqli_fetch_array($pegawai)){
//     echo"<tr>
//     <td>$no</td>
//                 <td>$row[employee_id]</td>
//                 <td>Nama lengkap</td>
//                  <td>Role</td>
//                  </tr>
//     </tr>";

//     $no++;
// }

$pegawai = "SELECT * FROM users";
$no=1;
$result = $db->query($pegawai);

while($row = mysqli_fetch_assoc($result)){
    echo"<tr>
         <td>$no</td>
                     <td>$row[employee_id]</td>
                     <td>$row[fullname]</td>
                      <td>$row[role]</td>
                      </tr>
         </tr>";

         $no++;


    
    // echo $row['fullname'];

}

?>

</table>