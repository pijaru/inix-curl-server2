<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// ../inventaris/update.php

//koneksi databse
include "../database.php";

//ambil id dari paramater get
$id = $_GET["id"];

//ambil id dari parameter post
$nama_inventaris   = $_POST["nama"];
$jumlah_inventaris = $_POST["jumlah"];

//update di database
$query = "UPDATE inventaris SET nama_inventaris = '$nama_inventaris',
		 jumlah_inventaris = '$jumlah_inventaris' WHERE id_inventaris = '$id'; ";

//ekseksui
$hasil = mysqli_query($koneksi, $query);

//cek berhasil
header("Content-type: application/json");
if ($hasil) {
    echo json_encode(["status" => "berhasil"]);
} else {
    echo json_encode(["status" => "gagal"]);
}
?>