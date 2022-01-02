<?php

use App\Modal\Type;

include_once '../../Modal/Type.php';

new Type;
Type::update($_POST['id'],['name' => $_POST['name']]);

Type::redirect('../../../admin-view/type/index.php');



