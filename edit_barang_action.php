<?php
include "koneksi.php";

// <!-- Cek apakah sudah login -->
session_start();

if (!$_SESSION['id_admin']) {
  header('location:login.php');
  exit();
}

//menerima data dari method GET
$id = $_POST['id_barang'];
$nama = $_POST['nama_barang'];
$desk = $_POST['deskripsi_barang'];
$harga = $_POST['harga_barang'];

$fb = $_FILES['foto_barang']['name'];

$dir = "img/";
$tmpFile = $_FILES['foto_barang']['tmp_name'];

move_uploaded_file($tmpFile, $dir.$fb);



// proses menambah dalam databse
$data = $koneksi->query("UPDATE tbbarang SET nama_barang='$nama',deskripsi_barang='$desk',harga_barang='$harga',foto_barang='$fb' WHERE id_barang=$id");

if ($data) {
  header('location:barang_list.php');
} else {
  echo "Tambah data gagal";
}

?>
