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
