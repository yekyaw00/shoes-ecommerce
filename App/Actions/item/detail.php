<?php

use App\Modal\Item;
include_once '../../Modal/Item.php';

    $id = $_POST['id'];
    new Item;
    $response = Item::findWith($id, ['colors', 'categories', 'types']);
    echo json_encode($response);