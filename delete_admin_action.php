<?php 
  include "koneksi.php";

  //menerima data dari method GET
  $id = $_GET ['id_admin'];

  // proses menambah dalam databse
  $data = $koneksi->query ("DELETE FROM tbadmin WHERE id_admin=$id");

  if($data){
    header ('location:admin_list.php');

  } else {
    echo "Tambah data gagal";
  }
 ?>