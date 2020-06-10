<?php $view->extend("layout"); ?>

<form method="post" class="my-3 shadow-sm">
    <div class="d-flex justify-content-between p-3 my-3 align-items-center text-white-50 bg-purple rounded shadow-sm">
        <div class="title">
            <h6 class="mb-0 text-white lh-100">Category</h6>
        </div>
        <div class="actions">
            <a href="/public/category" class="btn btn-sm btn-primary">List</a>
        </div>
    </div>

    <?php if ($model) : ?>
        <div class="p-2 rounded">
            <div class="form-group">
                Please confirm that you want to delete <b><?= $model->Title ?></b> category.
            </div>
            <div class="mt-3 form-actions">
                <button type="submit" class="btn btn-danger">Delete</button>

            </div>
        </div>
    <?php else : ?>
        <div class="p-2 rounded">
            <div class="form-group">
                Item was not found
            </div>
            <div class="mt-3 form-actions">
                <a href="/public/category" class="btn btn-danger">Back</a>
            </div>
        </div>
    <?php endif; ?>
</form>