<?php

use App\Modal\Type;

include_once '../../App/Modal/type.php';
include_once '../navigation/nav.php';

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
    <div class="container pt-5">
        <h3>Type Create Form</h3>
        <div class="card p-3">
            <form action="../../App/Actions/type/create.php" method="POST">
                <div class="row">
                    <label class="form-lable col-3" for="">Enter Product's Target User Type</label>
                    <div class="col-2">
                        <input class="form-control-sm" name="name" type="text" placeholder="Enter Type">
                    </div>
                    <div class="col-3">
                        <button class="mt-1 btn btn-outline-success btn-sm">Add Type</button>
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
                            <th class="col-4">Type</th>
                            <th class="col-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($types as $key => $type) { ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td id='name'>
                                    <span data-form='<?= 'form_' . $type['id'] ?>' class="" ondblclick="doubleClick(event)"><?= $type['name'] ?></span>
                                    <form class="d-none" id="<?= 'form_' . $type['id'] ?>" action=" ../../App/Actions/type/edit.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $type['id'] ?>">
                                        <input type="text" name="name" value="<?= $type['name'] ?>">
                                    </form>
                                </td>
                                <td class=" d-flex gap-3">
                                    <form action="../../App/Actions/type/delete.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $type['id'] ?>">
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