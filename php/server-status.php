<?php

$url = "http://46.146.234.119:9876/stats/servers";

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "X-API-Key: 33n<2z33irgqw54dgnqw7r2djhck",
        "Accept: application/json"
    ],
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode([
        "error" => curl_error($ch)
    ]);
    exit;
}

curl_close($ch);

header('Content-Type: application/json');
echo $response;