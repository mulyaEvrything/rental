<?php
    // mengaktifkan session
    session_start();

    // memanggil koneksi database
    include 'koneksi.php';

    // mengambil data dari inputan method POST
    $id_admin = $_POST['id_admin'];
    $password = $_POST['password'];

    // pengecekan data di dalam database
    $q = $koneksi->query("SELECT * FROM tbadmin
        WHERE tbadmin.id_admin = $id_admin
        AND tbadmin.password = '$password'");

    // pengecekan jika ada data
    if(mysqli_num_rows($q) > 0){
        $_SESSION['id_admin'] = $id_admin;
        $_SESSION['password'] = $password;
        header('location:index.php');
        exit();
    } else {
        header('location:login.php');
        exit();
    }
?>


