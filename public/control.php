<?php

function write_state($data, $file) {
    $file = fopen($file, "w");
    fwrite($file, json_encode($data));
    fclose($file);
}

if (isset($_POST['light'])) {
    if (strcmp($_POST['light'], "off") == 0) {
        exec(realpath("../scripts/led.py") . " off");
        write_state(["state" => "off"], realpath("state/led.json"));
    } else {
        exec(realpath("../scripts/led.py") . " on");
        write_state(["state" => "on"], realpath("state/led.json"));
    }
}

if (isset($_POST['temp'])) {
    $output = shell_exec(realpath("../scripts/temp.py"));
    if (strcmp(rtrim($output), "error") !== 0) {
        $temp = explode(" ", rtrim($output))[0];
        $hum = explode(" ", rtrim($output))[1];
        write_state(["temp" => $temp, "hum" => $hum], realpath("state/temp.json"));
    }
}
