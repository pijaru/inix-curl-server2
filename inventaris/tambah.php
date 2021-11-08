<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// ../inventaris/tambah.php

// koneksi ke database
include "../database.php";

//ambil kiriman data dari API client
$nama_inventaris   = $_POST['nama'];
$jumlah_inventaris = $_POST['jumlah'];

//simpan ke database
$query = "INSERT INTO inventaris VALUES(null, '$nama_inventaris', $jumlah_inventaris)";
$hasil = mysqli_query($koneksi, $query);

//cek berhasil
echo "hasil =" . $hasil;
?>