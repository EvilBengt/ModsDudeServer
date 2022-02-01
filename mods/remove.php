<?php

$filename = $_POST["filename"];

unlink("mod/" . $filename);

$index = json_decode(file_get_contents("index.json"), true);
unset($index[$filename]);

$file = fopen("index.json", "w");
fwrite($file, json_encode($index));
