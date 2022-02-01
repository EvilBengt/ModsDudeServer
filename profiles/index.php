<?php

header('Content-Type: application/json');

$filenames = array_slice(scandir("profile", SCANDIR_SORT_ASCENDING), 2);

echo json_encode([
    "profiles" => $filenames
]);
