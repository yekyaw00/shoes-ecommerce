<?php

use App\Modal\Type;

include_once '../../Modal/Type.php';

$id = $_POST['id'];
new Type;
$response = Type::delete($id);
Type::redirect('../../../admin-view/type');
