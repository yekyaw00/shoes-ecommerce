<?php

use App\Modal\Item;

include_once '../../Modal/Item.php';

    $id = $_POST['id'];
    new Item;
    $response = Item::delete($id);
    Item::redirect('../../../admin-view/item'); 