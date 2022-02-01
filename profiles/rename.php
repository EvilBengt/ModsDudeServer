<?php

$oldName = $filename = "profile/" . preg_replace("/[^a-zA-Z0-9_-]+/", "_", strtolower($_POST["oldName"]));
$newName = $filename = "profile/" . preg_replace("/[^a-zA-Z0-9_-]+/", "_", strtolower($_POST["newName"]));

if (file_exists($newName)) {
    http_response_code(409);
    exit();
}

rename($oldName, $newName);

http_response_code(201);
