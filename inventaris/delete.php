<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// ../inventaris/delete.php

//koneksi databse
include "../database.php";

//ambil id dari paramater get
$id = $_GET["id"];

//update di database
$query = "DELETE FROM inventaris WHERE id_inventaris = '$id'; ";
$hasil = mysqli_query($koneksi, $query);

//cek berhasil
header("Content-type: application/json");
if ($hasil) {
    echo json_encode([
        "hapus" => "berhasil"]);
} else {
    echo json_encode([
        "hapus" => "gagal menghapus"]);
}

?>