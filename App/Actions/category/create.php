<?php

use App\Modal\Category;
include_once '../../Modal/Category.php';

    echo $_POST['id'];
    new Category;
    $response = Category::create($_POST);
    Category::redirect('../../../admin-view/category');