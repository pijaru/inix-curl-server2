<?php
//koneksi database
include "../database.php";

//ambil filter
$filter  = $_GET['jumlah'];
$filter2 = $_GET['jumlah_maks'];

//ambil di database sesuai filter
$query = "SELECT * FROM inventaris
		WHERE jumlah_inventaris > $filter AND jumlah_inventaris > $filter2";

$hasil = mysqli_query($koneksi, $query);

//konversi ke array, fetch
$hasil_arr = mysqli_fetch_all($hasil, MYSQLI_ASSOC);

header("Content-type: application/json");
echo json_encode($hasil_arr);

?>