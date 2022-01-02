<?php

use App\Modal\Category;
include_once '../../Modal/Category.php';

    $id = $_POST['id'];
    $request = [ "name" => $_POST['name']];
    new Category;
    $response = Category::update($id,$request);
    Category::redirect('../../../admin-view/category');