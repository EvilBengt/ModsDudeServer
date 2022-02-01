<?php

$index = json_decode(file_get_contents("index.json"), true);

echo json_encode([
    "savegames" => array_keys($index)
]);
