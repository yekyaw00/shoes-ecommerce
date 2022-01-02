<?php

use App\Modal\Category;
include_once '../../Modal/Category.php';

    $id = $_POST['id'];
    new Category;
    $response = Category::delete($id);
    Category::redirect('../../../admin-view/category');