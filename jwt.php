<?php

function buat_jwt($data) {
    // secretnya
    $secret = "polkesyojogja";

    // headernya
    $header = json_encode([
        'type' => 'JWT',
        'alg'  => 'HS256',
    ]);
    $base64header = base64_encode($header);

    // payloadnya
    $payload = json_encode([
        'username' => $data,
        'iat'      => date('Y-m-d H:i:s'),
    ]);
    $base64payload = base64_encode($payload);

    // signature
    $signature = $base64header . "." . $base64payload;

    // encode hasmac
    $signatureHashMac = hash_hmac('sha256', $signature, $secret);

    // token gabungan
    $token = $base64header . "." . $base64payload . "." . $signatureHashMac;
    return $token;
}

function validasi_jwt($jwt) {
    // secretnya
    $secret = "polkesyojogja";

    // explode header, payload, signature
    $jwt_array = explode('.', $jwt);

    // ambil header
    $header64 = $jwt_array[0];

    //ambil payload
    $payload64 = $jwt_array[1];

    //ambil signature
    $signatureHS_kiriman = $jwt_array[2];

    // buat signature baru dengan header+payload
    $signatureHS_baru = hash_hmac('sha256', $header64 . '.' . $payload64, $secret);

    // kemudian bandingkan dengan signature yang dikirim
    if ($signatureHS_kiriman === $signatureHS_baru) {
        // kalau valid
        echo json_encode(["status" => "JWT Valid"]);
    } else {
        // kalau tidak valid
        exit(json_encode(["status" => "JWT tidak valid"]));
    }
}

?>