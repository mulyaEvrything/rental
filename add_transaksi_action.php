<?php
    include "koneksi.php";

    // mererima data dari method post
    $tanggal_sewa = $_POST['tanggal_sewa'];
    $tanggal_harus_kembali = $_POST['tanggal_harus_kembali'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_admin = $_POST['id_admin'];
    $jaminan = $_POST['jaminan'];

    // proses menambah dalam database
    $data = $koneksi->query("INSERT INTO 
    tbpenyewaan(tanggal_sewa, tanggal_harus_kembali, tanggal_kembali, id_pelanggan, id_admin, jaminan) VALUES(
        '$tanggal_sewa','$tanggal_harus_kembali','$tanggal_kembali',$id_pelanggan,$id_admin,'$jaminan')");

    // mengambil ID terakhir yang diinputkan
    $li = $koneksi->query('SELECT LAST_INSERT_ID() as lastid');

    $data_lastid = $li->fetch_assoc();

    // mengarahkan tampilan ke halaman detail transaksi
    if($data){
        header('location:detail_transaksi_form.php?id_penyewaan='.$data_lastid['lastid']);
    } else {
        header('location:transaksi_list.php');
    }
?>