<?php $view->extend("layout"); ?>

<div class="d-flex justify-content-between p-3 my-3 align-items-center text-white-50 bg-purple rounded shadow-sm">
    <div class="title">
        <h6 class="mb-0 text-white lh-100">Category</h6>
    </div>
    <div class="actions">
        <a href="/public/admin/category/create" class="btn btn-sm btn-primary">Add</a>
    </div>
</div>

<table class="table table-sm">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Category</th>
            <th scope="col" width="120px" class="text-center">Active</th>
            <th scope="col" width="160px" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($models as $model) : ?>
            <tr>
                <th scope="row" width="60px"><?= $model->Id ?></th>
                <td><?= $model->Title ?></td>
                <td class="text-center">
                    <?php if ($model->IsActive) : ?>
                        <span class="badge p-2 badge-success">Yes</span>
                    <?php else : ?>
                        <span class="badge p-2 badge-light">No</span>
                    <?php endif; ?>
                </td>
                <td class="text-right">
                    <a href="/public/admin/category/edit/<?= $model->Id ?>" class="btn btn-sm btn-default">Edit</a>
                    <a href="/public/admin/category/delete/<?= $model->Id ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
echo $view->render("partial/pager", ["collection" => []])
?>