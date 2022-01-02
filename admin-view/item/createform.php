<?php

use App\Modal\Color;
use App\Modal\Item;
use App\Modal\Category;
use App\Modal\Type;

include_once '../../App/Modal/category.php';
include_once '../navigation/nav.php';
include_once '../../App/Modal/Category.php';
include_once '../../App/Modal/Color.php';
include_once '../../App/Modal/Type.php';

new Color;
$colors = Color::all();

new Category;
$categories = Category::all();

new Type;
$types = Type::all();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOE</title>
</head>

<body>
    <div class="container p-5">
        <h3 class="text-center mb-3">Item Create Form</h3>
        <form class="w-100" action="../../App/Actions/item/create.php" method="POST" enctype="multipart/form-data">
            <div class="d-flex flex-column mx-auto col-6 justify-content-center">
                <div class="mt-3">
                    <img width="620px" height="400px" id="blah" src="#" alt="your image" />
                </div>
                <div class="row row-cols-2">
                    <div class="mt-3">
                        <label for="">Item Photo</label>
                        <input type="file" class="form-control sm" name="photo" onchange="loadFile(event)">
                    </div>
                    <div class="mt-3">
                        <label for="">Item Name</label>
                        <input type="text" class="form-control sm" name="name">
                    </div>
                    <div class="mt-3">
                        <label for="">Released Date</label>
                        <input type="date" class="form-control sm" name="released_date">
                    </div>
                    <div class="mt-3">
                        <label for="">Item Price</label>
                        <input type="text" class="form-control sm" name="price">
                    </div>
                    <div class="mt-3">
                        <label for="">Size</label>
                        <input type="number" class="form-control sm" name="size">
                    </div>
                    <div class="mt-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control sm" name="quantity">
                    </div>
                    <div class="mt-3 col-12">
                        <label for="">Product Description</label>
                        <textarea type="text" class="form-control sm w-100 h-auto" name="detail"></textarea>
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="">Category</label>
                        <select name="category_id" id="" class="form-control">
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="">Type</label>
                        <select name="type_id" id="" class="form-control">
                            <?php foreach ($types as $type) { ?>
                                <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="mt-3 col-12">
                    <label class="form-label" for="">Color</label>
                    <div class="d-flex gap-2">
                        <?php foreach ($colors as $color) { ?>
                            <div class="d-flex gap-2 relative">
                                <input checked type="radio" value="<?= $color['id'] ?>" name="color_id" class="form-check-input absolute" id="<?= $color['name'] ?>">
                                <label for="<?= $color['name'] ?>" class="p-3 absolute left-0 border border-secondary rounded-circle form-check-label" style="background-color: <?= $color['name'] ?>;"></label>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="mt-3 col-12">
                    <button class="mt-1 btn btn-outline-success btn-sm">Save</button>
                    <input type="reset" class="mt-1 btn btn-outline-danger btn-sm" value="Reset" onclick="removeImg()">
                </div>
            </div>
    </div>
    </form>
    </div>
</body>
<script>
    $('#blah').hide();
    var loadFile = function(event) {
        var output = document.getElementById('blah');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            $('#blah').show();
        }
    };

    function removeImg() {
        $('#blah').hide();
    }

</script>

</html>