<?php

use App\Modal\Color;

include '../../App/Modal/Color.php';
include '../navigation/nav.php';

$id = $_GET['id'];
$color = Color::find($id);
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
        <h3>Color Edit Form</h3>
        <div class="card p-3">
            <form action="../../App/Actions/color/edit.php" method="POST">
                <div class="row">
                    <label class="form-lable col-2" for="">Edit color</label>
                    <div class="col-1">
                        <input class="form-control" name="id" type="hidden" value="<?= $color['id'] ?>">
                        <input class="form-control" name="name" type="color" value="<?= $color['name'] ?>">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-outline-primary btn-sm" >Edit Color</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>