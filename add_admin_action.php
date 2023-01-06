<?php 
  include "koneksi.php";

  //menerima data dari method POST
  $nama = $_POST ['nama_admin'];
  $psw = $_POST ['password'];

  // proses menambah dalam databse
  $data = $koneksi->query ("INSERT INTO 
    tbadmin (nama_admin, password) VALUES ('$nama','$psw')");

  if($data){
    header ('location:admin_list.php');

  } else {
    echo "Tambah data gagal";
  }
 ?>