<?php

$filename = preg_replace("/[^a-zA-Z0-9_-]+/", "_", strtolower($_POST["name"]));

$index = json_decode(file_get_contents("index.json"), true);
$index[$filename] = [
    "checkedOut" => [
        "username" => $_SERVER["REMOTE_USER"],
        "timestamp" => time()
    ]
];

$file = fopen("index.json", "w");
fwrite($file, json_encode($index));
