<?php 
  include "koneksi.php";

  //menerima data dari method GET
  $id = $_POST ['id_pelanggan'];
  $nama = $_POST ['nama_pelanggan'];
  $no_hp = $_POST ['no_hp_pelanggan'];
  $alamat = $_POST ['alamat_pelanggan'];
  $jk = $_POST ['jk'];


  

  // proses menambah dalam databse
  $data = $koneksi->query ("UPDATE tbpelanggan SET nama_pelanggan='$nama',no_hp_pelanggan='$no_hp',alamat_pelanggan='$alamat',jk='$jk' WHERE id_pelanggan=$id");

  if($data){
    header ('location:pelanggan_list.php');

  } else {
    echo "Tambah data gagal";
  }
 ?>