<?php

use App\Modal\Color;

include_once '../../App/Modal/Color.php';
include_once '../navigation/nav.php';

new Color;
$colors = Color::all();

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
    <div class="container pt-5">
        <h3>Color Create Form</h3>
        <div class="card p-3">
            <form action="../../App/Actions/color/create.php" method="POST">
                <div class="row">
                    <label class="form-lable col-2" for="">Choose Color to Create</label>
                    <div class="col-1">
                        <input class="form-control" name="name" type="color">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-outline-primary btn-sm">Add Color</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="p-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Color</th>
                        <th>#code</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($colors as $key => $color) { ?>
                        <tr>
                            <td><?= ++$key; ?></td>
                            <td>
                                <div class="p-3 px-5 col-2 border" style="background-color: <?= $color['name']; ?>;"></div>
                            </td>
                            <td><?= $color['name']; ?></td>
                            <td class="d-flex gap-3">
                                <div>
                                    <button class="btn btn-sm btn-outline-warning" href="edit.php?id=<?= $color['id'] ?>">Edit</button>
                                </div>
                                <form action="../../App/Actions/color/delete.php" method="post">
                                    <input type="hidden" name="id" value="<?= $color['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>