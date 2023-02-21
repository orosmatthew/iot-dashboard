<?php

$led_state = json_decode(file_get_contents(realpath('state/led.json')), false)->state;


if (isset($_POST['led_toggle'])) {
    if (strcmp($led_state, "on") == 0) {
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

$led_state = json_decode(file_get_contents(realpath('state/led.json')), false)->state;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IoT Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="container" data-bs-theme="dark">
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-3">
        <a class="navbar-brand" href="#">IoT Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="control-col container mt-3 p-3" style="text-align:center">
                <form method="post">
                    <button id="light_btn" name="led_toggle" class="img-btn"><img draggable="false" id="light_img" src="/img/light-off.png" width="100%" /></button>
                </form>

                <h2 class="mt-2">Light</h2>
                <!-- <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                </div> -->
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="control-col container mt-3 p-3">

            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="control-col container mt-3 p-3">

            </div>
        </div>
    </div>
</body>

<style>
    .img-btn {
        background-color: rgba(0, 0, 0, 0);
        border-color: rgba(0, 0, 0, 0);
        transform: scale(1);
        transition: 0.3s;
    }

    .img-btn:hover {
        transform: scale(1.05);
    }

    .control-col {
        width: 100%;
        height: 400px;
        background-color: blue;
        border-radius: 8px;
        background-color: #2b3035;
        transition-duration: 0.3s;
    }
</style>

<script>
    let ledState = "<?php echo $led_state ?>";
    let lightImg = document.getElementById("light_img");

    function changeLed(on) {
        if (on) {
            ledState = "on";
            lightImg.src = "/img/light-on.png";
        } else {
            ledState = "off";
            lightImg.src = "/img/light-off.png";
        }
    }

    if (ledState == "on") {
        changeLed(true);
    } else {
        changeLed(false);
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>