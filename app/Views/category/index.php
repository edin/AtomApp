<?php $view->extend("layout"); ?>

<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
    <div class="lh-100">
        <h6 class="mb-0 text-white lh-100">Category</h6>
    </div>

    <div class="lh-100 float-right">
        <a href="/public/category/create" class="btn btn-sm btn-primary">Add</a>
    </div>
</div>
<table class="table table-sm">
    <thead class="thead-light">
        <tr>
            <th scope="col"></th>
            <th scope="col">Category</th>
            <th scope="col">IsActive</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($models as $model) : ?>
            <tr>
                <th scope="row"><?= $model->Id ?></th>
                <td><?= $model->Title ?></td>
                <td>
                    <span class="badge p-2 badge-success">Yes</span>
                    <span class="badge p-2 badge-light">No</span>
                </td>
                <td>
                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-default">Edit</button>
                        <button type="button" class="btn btn-sm btn-danger">Delete</button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $view->render("partial/pager", ["collection" => []]) ?>