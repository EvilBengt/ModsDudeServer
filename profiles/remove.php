<?php

unlink("profile/" . preg_replace("/[^a-zA-Z0-9_-]+/", "_", strtolower($_POST["filename"])));
