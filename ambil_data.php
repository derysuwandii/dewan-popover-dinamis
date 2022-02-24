<?php
  include 'koneksi.php';
  if(isset($_POST["id"]))  {
    $output = '';
    $id = $_POST["id"];
    $query = "SELECT * FROM tbl_karyawan WHERE id=?";
    $dewan1 = $db1->prepare($query);
    $dewan1->bind_param('i', $id);
    $dewan1->execute();
    $res1 = $dewan1->get_result();
    while ($row = $res1->fetch_assoc()) {
      $output = '  
        <p><img src="images/'.$row["foto"].'" class="img-responsive img-thumbnail" /></p>
        <p><b>Nama Lengkap : </b><br /> '.$row['nama_lengkap'].'</p>
        <p><b>Alamat : </b><br />'.$row['alamat'].'</p>
        <p><b>Jenis Kelamin : </b>'.$row['jenkel'].'</p>
        <p><b>Jabatan : </b>'.$row['jabatan'].'</p>
        <p><b>Umur : </b>'.$row['umur'].' tahun</p>
      ';  
    }  
    echo $output;  
  }  
?>  