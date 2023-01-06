<?php 
  include "koneksi.php";

  //menerima data dari method GET
  $id = $_POST ['id_barang'];
  $nama = $_POST ['nama_barang'];
  $desk = $_POST ['deskripsi_barang'];
  $harga = $_POST ['harga_barang'];

  

  // proses menambah dalam databse
  $data = $koneksi->query ("UPDATE tbbarang SET nama_barang='$nama',deskripsi_barang='$desk',harga_barang='$harga' WHERE id_barang=$id");

  if($data){
    header ('location:barang_list.php');

  } else {
    echo "Tambah data gagal";
  }
 ?>