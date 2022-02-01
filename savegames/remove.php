<?php

$filename = $_POST["name"];

unlink("savegame/" . preg_replace("/[^a-zA-Z0-9_-]+/", "_", strtolower($filename)));


$index = json_decode(file_get_contents("index.json"), true);
unset($index[$filename]);

$file = fopen("index.json", "w");
fwrite($file, json_encode($index));
