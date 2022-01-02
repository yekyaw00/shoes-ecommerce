<?php

use App\Modal\Category;

include_once '../../App/Modal/Category.php';
include_once '../navigation/nav.php';

new Category;
$categories = Category::all();

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
    <div class="container pt-3">
        <h3>Category Create Form</h3>
        <div class="card">
            <form action="../../App/Actions/category/create.php" method="POST">
                <div class="row">
                    <label class="form-lable col-3" for="">Shoes Categories</label>
                    <div class="col-2">
                        <input class="form-control-sm" name="name" type="text" placeholder="Enter Category">
                    </div>
                    <div class="col-3">
                        <button class="mt-1 btn btn-outline-success btn-sm">Add Categories</button>
                    </div>
                </div>
            </form>
        </div>
        <div>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-4">#</th>
                            <th class="col-4">Category</th>
                            <th class="col-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $key => $category) { ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td id='name'>
                                    <span data-form='<?= 'form_' . $category['id'] ?>' class="" ondblclick="doubleClick(event)"><?= $category['name'] ?></span>
                                    <form class="d-none" id="<?= 'form_' . $category['id'] ?>" action=" ../../App/Actions/category/edit.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                        <input type="text" name="name" value="<?= $category['name'] ?>">
                                    </form>
                                </td>
                                <td class=" d-flex gap-3">
                                    <form action="../../App/Actions/category/delete.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    function doubleClick(e) {
        let id = e.target.dataset.form;
        $(`#${id}`).removeClass('d-none');
        $(e.target).addClass('d-none');
    }
</script>

</html>