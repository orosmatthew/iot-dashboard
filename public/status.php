<?php

header('Content-Type: application/json');

if (isset($_GET['device'])) {
    if (strcmp($_GET['device'], "light") == 0) {
        $path = realpath("state/led.json");
        $data = json_decode(file_get_contents($path));
        echo json_encode($data);
    }
    else if (strcmp($_GET['device'], "temp") == 0) {
        $path = realpath("state/temp.json");
        $data = json_decode(file_get_contents($path));
        echo json_encode($data);
    }
    else if (strcmp($_GET['device'], "lock") == 0) {
        $path = realpath("state/lock.json");
        $data = json_decode(file_get_contents($path));
        echo json_encode($data);
    }
}