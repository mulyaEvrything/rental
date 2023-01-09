<?php 
  include "koneksi.php";

  // <!-- Cek apakah sudah login -->
session_start();

if (!$_SESSION['id_admin']) {
  header('location:login.php');
  exit();
}

  //menerima data dari method GET
  $id = $_GET ['id_barang'];
  

  
  // proses menambah dalam databse
  $data = $koneksi->query ("DELETE FROM tbbarang WHERE id_barang=$id");

  if($data){
    header ('location:barang_list.php');

  } else {
    echo "Tambah data gagal";
  }

?>

