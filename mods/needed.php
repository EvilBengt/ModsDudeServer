<?php

header('Content-Type: application/json');


$existingFilenames = array_slice(scandir("mod", SCANDIR_SORT_ASCENDING), 2);
$unneededMods = [];

foreach ($existingFilenames as $filename) {
    $unneededMods[$filename] = true;
}

$existingMods = [];

$index = json_decode(file_get_contents("index.json"), true);

for ($i = count($existingFilenames) - 1; $i >= 0; $i--) {
    $existingMods[$existingFilenames[$i]] = $index[$existingFilenames[$i]];
}


$profiles = array_slice(scandir("../profiles/profile", SCANDIR_SORT_ASCENDING), 2);
$neededMods = [];

for ($i=0; $i < count($profiles); $i++) {
    $modsInProfile = json_decode(file_get_contents("../profiles/profile/" . $profiles[$i]))->mods;
    foreach ($modsInProfile as $profileModFilename) {
        $neededMods[$profileModFilename] = true;
    }
}

$result = [];

foreach ($neededMods as $neededMod => $value) {
    $result[] = [
        "name" => $neededMod,
        "fileInfo" => array_key_exists($neededMod, $existingMods) ? $existingMods[$neededMod] : null
    ];
    unset($unneededMods[$neededMod]);
}


echo json_encode([
    "needed" => $result,
    "unneeded" => array_keys($unneededMods)
]);
