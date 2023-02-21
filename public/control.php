<?php
if (isset($_POST['light'])) {
    if (strcmp($_POST['light'], "off") == 0) {
        exec(realpath("../scripts/led.py") . " off");
        $led_data = ["state" => "off"];
        $file = fopen("state/led.json", "w");
        fwrite($file, json_encode($led_data));
        fclose($file);
    } else {
        exec(realpath("../scripts/led.py") . " on");
        $led_data = ["state" => "on"];
        $file = fopen("state/led.json", "w");
        fwrite($file, json_encode($led_data));
        fclose($file);
    }
}

if (isset($_POST['temp'])) {
    $output = shell_exec(realpath("../scripts/temp.py"));
    if (strcmp(rtrim($output), "error") !== 0) {
        $temp = explode(" ", rtrim($output))[0];
        $hum = explode(" ", rtrim($output))[1];
        $temp_data = ["temp" => $temp, "hum" => $hum];
        $file = fopen("state/temp.json", "w");
        fwrite($file, json_encode($temp_data));
        fclose($file);
    }
}
