<?php

$filename = preg_replace("/[^a-zA-Z0-9_-]+/", "_", strtolower($_POST["name"]));

move_uploaded_file($_FILES["file"]["tmp_name"], "savegame/" . $filename);

$index = json_decode(file_get_contents("index.json"), true);
$index[$filename] = [
    "checkedOut" => null
];

$file = fopen("index.json", "w");
fwrite($file, json_encode($index));
