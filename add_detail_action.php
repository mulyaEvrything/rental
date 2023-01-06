<?php
    include "koneksi.php";

    // mererima data dari method post
    $id_penyewaan = $_POST['id_penyewaan'];
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    // proses menambah dalam database
    $data = $koneksi->query("INSERT INTO 
    tbdetail_penyewaan VALUES(
        $id_penyewaan,$id_barang,$jumlah,$harga)");

    // mengarahkan tampilan ke halaman detail transaksi
    if($data){
        header('location:detail_transaksi_form.php?id_penyewaan='.$id_penyewaan);
    } else {
        header('location:transaksi_list.php');
    }
?>