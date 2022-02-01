<?php

$responseBody = file_get_contents("php://input");
$json = json_decode($responseBody);
$filename = preg_replace("/[^a-zA-Z0-9_.-]+/", "_", strtolower($_GET["filename"]));

if ($json) {
    $file = fopen("profile/" . $filename, "w");
    fwrite($file, json_encode($json));
    fclose($file);
}
