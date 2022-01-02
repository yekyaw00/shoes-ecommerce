<?php

use App\Modal\Color;

include_once '../../Modal/Color.php';

    echo $_POST['name'];
    new Color;
    $response = Color::create($_POST);
    Color::redirect('../../../admin-view/color');