<?php

//api server 2
//siapkan respon/balasan berupa JSON

$balasan = [
    "pesan" => "berhasil akses server 2",
    "data"  => "data penduduk ...",
];

//bungkus ke dalam JSON
$balasan_json = json_encode($balasan);

echo $balasan_json;

?>