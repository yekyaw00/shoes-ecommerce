<?php

use App\Modal\Color;

include_once '../../Modal/Color.php';

    $id = $_POST['id'];
    new Color;
    $response = Color::delete($id);
    Color::redirect('../../../admin-view/color');