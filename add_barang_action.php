<?php 
  include "koneksi.php";

  //menerima data dari method POST
  $nb = $_POST ['nama_barang'];
  $desb = $_POST ['deskripsi_barang'];
  $hb = $_POST ['harga_barang'];
  $fb = $_FILES ['foto_barang']['name'];
  

  
  // proses menambah dalam databse
  $data = $koneksi->query ("INSERT INTO 
    tbbarang (nama_barang, deskripsi_barang, harga_barang, foto_barang) VALUES ('$nb','$desb','$hb','$fb')");

  if($data){
    header ('location:barang_list.php');

  } else {
    echo "Tambah data gagal";
  }
 ?>