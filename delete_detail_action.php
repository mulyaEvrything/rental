<?php
    include "koneksi.php";

    // mererima data dari method GET
    $id_penyewaan = $_GET['id_penyewaan'];
    $id_barang = $_GET['id_barang'];

    // proses menghapus dalam database
    $data = $koneksi->query("DELETE FROM tbdetail_penyewaan
    WHERE id_penyewaan=$id_penyewaan AND id_barang=$id_barang");

    // mengarahkan tampilan kembali ke list
    if($data){
        header('location:detail_transaksi_form.php?id_penyewaan='.$id_penyewaan);
    } else {
        header('location:transaksi_list.php');
    }
?>