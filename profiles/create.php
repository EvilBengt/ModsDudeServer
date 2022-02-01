<?php

$filename = preg_replace("/[^a-zA-Z0-9_-]+/", "_", strtolower($_POST["filename"]));

if (file_exists("profile/" . $filename)) {
    http_response_code(409);
    exit();
}

$file = fopen("profile/" . $filename, "w");

fwrite($file, json_encode([
    "mods" => []
]));
fclose($file);
http_response_code(201);
