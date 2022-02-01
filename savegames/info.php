<?php

$index = json_decode(file_get_contents("index.json"), true);

echo json_encode($index[$_GET["name"]]);
