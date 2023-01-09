<?php 
  include "koneksi.php";

  // <!-- Cek apakah sudah login -->
session_start();

if (!$_SESSION['id_admin']) {
  header('location:login.php');
  exit();
}

  //menerima data dari method GET
  $id = $_POST ['id_admin'];
  $nama = $_POST['nama_admin'];
  $psw = $_POST['password'];

  // proses menambah dalam databse
  $data = $koneksi->query ("UPDATE tbadmin SET nama_admin='$nama',password='$psw' WHERE id_admin=$id");

  if($data){
    header ('location:admin_list.php');

  } else {
    echo "Tambah data gagal";
  }
?>