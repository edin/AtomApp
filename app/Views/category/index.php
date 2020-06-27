<?php $view->extend("layout"); ?>

<div class="d-flex justify-content-between p-3 my-3 align-items-center text-white-50 bg-purple rounded shadow-sm">
    <div class="title">
        <h6 class="mb-0 text-white lh-100">Category</h6>
    </div>
    <div class="actions">
        <form class="form-inline" method="GET">
            <div class="form-group mr-2">
                <input type="text" class="form-control form-control-sm" name="filter" placeholder="Search...">
            </div>
            <a href="/public/admin/category/create" class="btn btn-sm btn-primary">Add</a>
        </form>
    </div>
</div>

<table class="table table-sm">
    <thead class="thead-light">
        <tr>
            <th scope="col"></th>
            <th scope="col">
                <a href="?orderBy=Category">Category <i class="fa fa-fw fa-sort"></i></a>
            </th>
            <th scope="col" width="120px" class="text-center">Active</th>
            <th scope="col" width="160px" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($models as $model) : ?>
            <tr>
                <th scope="row" width="60px" class="text-center">
                    <?php if ($model->ImageUrl) : ?>
                        <img src="<?= $model->ImageUrl ?>" width="40px" />
                    <?php endif; ?>
                </th>
                <td>
                    <b><?= $model->Title ?></b><br />
                    <small><?= $model->Description ?></small>
                </td>
                <td class="text-center">
                    <?= $view->render("partial/cell-checked", ["isActive" => $model->IsActive]) ?>
                </td>
                <td class="text-right">
                    <a href="/public/admin/category/edit/<?= $model->Id ?>" class="btn btn-sm btn-default">Edit</a>
                    <a href="/public/admin/category/delete/<?= $model->Id ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $view->render("partial/pager", ["collection" => []]) ?>