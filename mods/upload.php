<?php

$filename = basename($_FILES["file"]["name"]);

move_uploaded_file($_FILES["file"]["tmp_name"], "mod/" . $filename);

$index = json_decode(file_get_contents("index.json"), true);
$index[$filename] = [
    "hash" => isset($_POST["hash"]) ? $_POST["hash"] : null,
    "size" => $_POST["size"]
];

$file = fopen("index.json", "w");
fwrite($file, json_encode($index));
