<?php

use App\Modal\Category;
use App\Modal\Color;
use App\Modal\Item;
use App\Modal\Type;

include_once '../../App/Modal/Item.php';
include_once '../navigation/nav.php';
include_once '../../App/Modal/Category.php';
include_once '../../App/Modal/Type.php';
include_once '../../App/Modal/Color.php';

new Color;
$colors = Color::all();

new Category;
$categories = Category::all();

new Type;
$types = Type::all();

new Item;
$items = Item::with(['types', 'colors', 'categories']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Catalog</title>

</head>
<style>
    .small {
        font-size: 12px !important;
    }
</style>

<body>
    <div class="row row-cols-4 px-5 mt-5">
        <?php foreach ($items as $key => $item) {
        ?>
            <div class="px-4">
                <div class="card border border-3">
                    <img class="card-img-top" width="465px" height="270px" src="<?= "../../App/Public/storage/" . $item['photo'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['name'] ?></h5>
                        <p class="card-text"><?= $item['detail'] ?></p>
                        <div class="row px-1 pt-2">
                            <div class="col p-1">
                                <div class="mx-auto rounded-circle" style="background-color: <?= $item['colors']['name'] ?>; width: 20px; height: 20px;"></div>
                            </div>
                            <div class="col-1">|</div>
                            <div class="col p-1 small text-center fw-bold">
                                <?= $item['categories']['name'] ?>
                            </div>
                            <div class="col-1">|</div>
                            <div class="col p-1 small text-center fw-bold">
                                <?= $item['types']['name'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between gap-3 pt-3">
                        <form>
                            <button type="button" class="btn btn-lg btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="fetchDetailData(<?= $item['id'] ?>)">
                                <i class="fa fa-info"></i>
                            </button>
                        </form>
                        <form action="../../App/Actions/item/delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit" title="Delete" class="btn btn-lg btn-outline-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div>
                            <img width="465px" height="270px" id='photo' src="http://we_code_shoe_ecommerce-master.test/App/Public/storage/1640185714.jpg" alt="" srcset="">
                        </div>
                        <hr>
                        <div class="row row-cols-2 mt-3">
                            <div>Item Name</div>
                            <div id="name"></div>
                        </div>
                        <hr>
                        <div class="row row-cols-2 mt-3">
                            <div>Item Color</div>
                            <div>
                                <div id="color" class="p-2 rounded-circle" style="width: 20px; height: 20px;"></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-cols-2 mt-3">
                            <div>Item Category</div>
                            <div>
                                <div id="category" class="rounded-circle" style="width: 150px; height: 20px;"></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-cols-2 mt-3">
                            <div>Item Type</div>
                            <div>
                                <div id="type" class="rounded-circle" style="width: 20px; height: 20px;"></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-cols-2 mt-3">
                            <div>Item Size</div>
                            <div>
                                <div id="size" class="rounded-circle" style="width: 20px; height: 20px;"></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-cols-2 mt-3">
                            <div>Item Quantity</div>
                            <div>
                                <div id="quantity" class="rounded-circle" style="width: 20px; height: 20px;"></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-cols-2 mt-3">
                            <div>Released Date</div>
                            <div>
                                <div id="released_date" class="rounded-circle" style="width: 200px; height: 20px;"></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-cols-2 mt-3">
                            <div>Item Detail</div>
                            <div>
                                <div id="detail" class="rounded-circle" style="width: 200px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Edit form -->
                    <div>
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
                                        <input type="text" id="edit_name" class="form-control sm" name="name">
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Released Date</label>
                                        <input type="date" id="edit_released_date" class="form-control sm" name="released_date">
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Item Price</label>
                                        <input type="text" id="edit_price" class="form-control sm" name="price">
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Size</label>
                                        <input type="number" id="edit_size" class="form-control sm" name="size">
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Quantity</label>
                                        <input type="number" id="edit_quantity" class="form-control sm" name="quantity">
                                    </div>
                                    <div class="mt-3 col-12">
                                        <label for="">Product Description</label>
                                        <textarea type="text" id="edit_description" class="form-control sm w-100 h-auto" name="detail"></textarea>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-warning">Edit</button>
            </div>
        </div>
    </div>
    </div>
</body>

<script>
    function fetchDetailData(id) {
        $.post({
            url: "../../App/Actions/item/detail.php",
            data: {
                id
            },
            success: function(data) {
                data = JSON.parse(data);
                $("#photo").attr('src', "../../App/Public/storage/" + data.photo);
                $("#name").html(data.name);
                $("#color").css('background-color', data.colors.name);
                $("#category").html(data.categories.name);
                $("#type").html(data.types.name);
                $("#size").html(data.size);
                $("#quantity").html(data.quantity);
                $("#released_date").html(data.released_date);
                $("#detail").html(data.detail);

                $("#edit_name").val(data.name);
                $("#edit_size").val(data.size);
                $("#edit_quantity").val(data.quantity);
                $("#edit_released_date").val(data.released_date);
                $("#edit_description").val(data.detail);
            }
        });
    }

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