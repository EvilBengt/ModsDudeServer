<?php

/**
 * Based on example from:
 * https://code-boxx.com/upload-large-files-php/
 */

$filename = basename($_FILES["file"]["name"]);


$out = @fopen("uploading/{$filename}", isset($_POST["isFirstChunk"]) ? "wb" : "ab");

$in = @fopen($_FILES["file"]["tmp_name"], "rb");

while ($buff = fread($in, 4096)) {
    fwrite($out, $buff);
}

@fclose($in);
@fclose($out);
@unlink($_FILES["file"]["tmp_name"]);


if (isset($_POST["isLastChunk"])) {
    rename("uploading/{$filename}", "mod/{$filePath}");

    $index = json_decode(file_get_contents("index.json"), true);
    $index[$filename] = [
        "hash" => $_POST["hash"],
        "size" => $_POST["size"]
    ];

    $file = fopen("index.json", "w");
    fwrite($file, json_encode($index));
}
