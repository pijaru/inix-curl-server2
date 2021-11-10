<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-type: application/json");
//koneksi database
include "../database.php";
include "../jwt.php";

$req_header = apache_request_headers();
if (isset($req_header['Authorization'])) {
    $bearer = $req_header['Authorization'];
    // ekstrak tokennya
    $bearer_pisah = explode(' ', $bearer);
    // contoh = Bearer fiugaagwjkjda
    $token = $bearer_pisah[1]; // ambil tokennya
    // cocokan dengan yang di session
    //cek jwt
    validasi_jwt($token);

    session_start();
    $token_session = $_SESSION['token'];
    if ($token == $token_session) {
        //token valid, tidak perlu diapa-apakan
        echo json_encode([
            "status"   => "token valid",
            "username" => $_SESSION['username'],
        ]);
    } else {
        // tidak ada token
        exit(json_encode(["status" => "belum login"]));
    }
} else {
    // tidak ada token
    header("Content-type: application/json");
    exit(json_encode(["status" => "Belum Login"]));
}

//ambil data inventaris dari database
$query = "SELECT * FROM inventaris;";
$hasil = mysqli_query($koneksi, $query);

//koneksi ke array
$hasil_arr = mysqli_fetch_all($hasil);

//konversi ke JSON
$hasil_json = json_encode($hasil_arr);

//setting header content type
header("Content-type: application/json");

echo $hasil_json;
?>