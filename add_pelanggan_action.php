<?php 
  include "koneksi.php";

  //menerima data dari method POST
  $nama_pelanggan = $_POST ['nama_pelanggan'];
  $alamat_pelanggan = $_POST ['alamat_pelanggan'];
  $jk = $_POST ['jk'];
  $no_hp_pelanggan = $_POST ['no_hp_pelanggan'];
  
  

  
  // proses menambah dalam databse
  $data = $koneksi->query ("INSERT INTO 
    tbpelanggan (nama_pelanggan, alamat_pelanggan, jk, no_hp_pelanggan) VALUES ('$nama_pelanggan','$alamat_pelanggan','$jk','$no_hp_pelanggan')");

  if($data){
    header ('location:pelanggan_list.php');

  } else {
    echo "Tambah data gagal";
  }
 ?>