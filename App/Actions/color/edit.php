<?php

use App\Modal\Color;

include_once '../../Modal/Color.php';

    $id = $_POST['id'];
    $request = [
        "name" => $_POST['name']
    ];
    new Color;
    $response = Color::update($id,$request);
    Color::redirect('../../../admin-view/color'); 