<?php

use App\Modal\Type;
include_once '../../Modal/Type.php';

echo $_POST['name'];

new Type;
$response = Type::create($_POST);
Type::redirect('../../../admin-view/type/index.php');
