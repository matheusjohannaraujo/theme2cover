<?php

require_once "../vendor/autoload.php";

header("Content-Type: application/json; charset=utf-8");

$name = trim($_POST["name"] ?? "");

if ($name === "") {
    http_response_code(400);

    echo json_encode([
        "success" => false,
        "message" => "Informe um tema."
    ]);

    exit;
}

try {

    $image = \MJohann\Packlib\Theme2Cover::create($name);

    echo json_encode([
        "success" => true,
        "image" => $image
    ]);
} catch (Throwable $e) {

    http_response_code(500);

    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}
