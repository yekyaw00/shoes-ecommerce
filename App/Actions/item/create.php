<?php

use App\Modal\Item;

include_once '../../Modal/Item.php';

new Item;
$file_name = Item::upload($_FILES['photo']);
$_POST['photo'] = $file_name;

$response = Item::create($_POST);

if ($response === true)
    Item::redirect('../../../admin-view/item');
else
    echo $response;
