<?php
include "koneksi.php";

// <!-- Cek apakah sudah login -->
session_start();

if (!$_SESSION['id_admin']) {
  header('location:login.php');
  exit();
}

//menerima data dari method POST
$id = $_GET['id_pelanggan'];




// proses menambah dalam databse
$data = $koneksi->query("DELETE FROM tbpelanggan WHERE id_pelanggan=$id");

if ($data) {
  header('location:pelanggan_list.php');
} else {
  echo "Tambah data gagal";
}
